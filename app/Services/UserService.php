<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function generateToken()
    {
        $user = User::first();

        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
    }
}
