@extends('layouts.app')

@section('title', 'Login — Wanderly')

@section('content')
<div class="auth-page">
    <div class="auth-illustration">
        <div class="auth-illustration-inner">
            <div class="auth-floating el-1">✈️</div>
            <div class="auth-floating el-2">🌍</div>
            <div class="auth-floating el-3">🎈</div>
            <div class="auth-blob auth-blob-1"></div>
            <div class="auth-blob auth-blob-2"></div>
            <div class="auth-quote">
                <blockquote>"Not all those who wander are lost."</blockquote>
                <cite>— J.R.R. Tolkien</cite>
            </div>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-card">
            <div class="auth-header">
                <a href="{{ route('home') }}" class="auth-logo">
                    <span class="logo-icon">✈</span>
                    <span class="logo-text">Wanderly</span>
                </a>
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Sign in to continue your journey</p>
            </div>

            @include('components.errors')

            <form action="{{ route('login') }}" method="POST" class="auth-form" id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope"></i> Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        autocomplete="email"
                        required
                        autofocus
                    >
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i> Password
                    </label>
                    <div class="input-with-action">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="input-action-btn" onclick="togglePassword('password')">
                            <i class="bi bi-eye" id="password-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row-inline">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkmark"></span>
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn-auth-submit" id="loginBtn">
                    <span class="btn-text">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Sign In
                    </span>
                    <span class="btn-loading" style="display:none;">
                        <i class="bi bi-arrow-repeat spin"></i> Signing in...
                    </span>
                </button>
            </form>

            @include('components.firebase-google-auth')

            <div class="auth-footer">
                <p>New to Wanderly? <a href="{{ route('register') }}" class="auth-link">Create an account</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    const eye = document.getElementById(id + '-eye');
    if (input.type === 'password') {
        input.type = 'text';
        eye.className = 'bi bi-eye-slash';
    } else {
        input.type = 'password';
        eye.className = 'bi bi-eye';
    }
}

document.getElementById('loginForm').addEventListener('submit', function() {
    const btn = document.getElementById('loginBtn');
    btn.querySelector('.btn-text').style.display = 'none';
    btn.querySelector('.btn-loading').style.display = 'inline-flex';
    btn.disabled = true;
});
</script>
@endpush
