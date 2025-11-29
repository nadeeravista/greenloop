<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\UserController;

Route::get('/health', HealthController::class);

Route::middleware('auth:sanctum')->group(function () {
    // Standard REST resource routes (add methods to controller as needed)
    Route::apiResource('auth', UserController::class)->only(['index']);

    // Custom routes - add more custom routes here as needed
    Route::get('/auth/generate-qr-code', [UserController::class, 'generateQRCode']);
});
