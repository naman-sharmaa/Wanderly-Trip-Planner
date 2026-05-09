<?php

// Vercel Serverless Function Entry Point
// This routes all requests to the Laravel application

$app_root = dirname(__DIR__);

// Set up the environment
if (file_exists($app_root . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable($app_root);
    $dotenv->load();
}

// Bootstrap Laravel
require_once $app_root . '/bootstrap/app.php';

$app = require_once $app_root . '/bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
