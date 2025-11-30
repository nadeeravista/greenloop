<?php

namespace App\Services;

use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserService
{
    public function generateToken()
    {
        $user = app(User::class)::first();

        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
    }

    /**
     * @param User $user
     * @return string QR code data
     */
    public function generateQRCode(string $email): string
    {
        $data = $email;

        return QrCode::size(200)
            ->generate($data);
    }
}
