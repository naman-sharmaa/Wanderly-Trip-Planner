<?php

namespace App\Services;

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class FirebaseAuthService
{
    /**
     * Verify a Firebase ID token and return its claims.
     *
     * @throws \RuntimeException
     */
    public function verifyIdToken(string $idToken): array
    {
        $projectId = config('firebase.project_id');

        if (! $projectId) {
            throw new RuntimeException('Firebase project ID is not configured.');
        }

        $jwks = Cache::remember(
            'firebase.jwks',
            now()->addHours((int) config('firebase.jwks_cache_hours', 12)),
            function () {
                $response = Http::timeout(10)->get(config('firebase.jwks_url'));

                if (! $response->successful()) {
                    throw new RuntimeException('Unable to download Firebase public keys.');
                }

                return $response->json();
            }
        );

        if (! is_array($jwks) || empty($jwks['keys'])) {
            throw new RuntimeException('Firebase public keys are invalid.');
        }

        $decoded = JWT::decode($idToken, JWK::parseKeySet($jwks));
        $claims = json_decode(json_encode($decoded), true) ?: [];

        $expectedIssuer = "https://securetoken.google.com/{$projectId}";

        if (($claims['aud'] ?? null) !== $projectId) {
            throw new RuntimeException('Firebase token audience is invalid.');
        }

        if (($claims['iss'] ?? null) !== $expectedIssuer) {
            throw new RuntimeException('Firebase token issuer is invalid.');
        }

        if (empty($claims['sub'])) {
            throw new RuntimeException('Firebase token is missing the user identifier.');
        }

        return $claims;
    }
}
