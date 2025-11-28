<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\UserController;

Route::get('/health', HealthController::class);
Route::get('/auth', UserController::class)->middleware('auth:sanctum');
