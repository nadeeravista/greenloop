<?php

use Illuminate\Support\Facades\Artisan;
use App\Services\UserService;

Artisan::command('token:generate', function () {
    $userService = new UserService();

    $token = $userService->generateToken();

    $this->info('Token generated successfully: ' . $token);
});
