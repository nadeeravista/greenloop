<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/auth",
     *     summary="Authenticated user endpoint",
     *     description="Returns an authenticated user",
     *     tags={"Auth"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Authenticated"),
     *             @OA\Property(property="user", type="object", example={
     *                 "id": 1,
     *                 "name": "John Doe",
     *                 "email": "john.doe@example.com"
     *             })
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            'message' => 'Authenticated'
        ], 200);
    }


    /**
     * @OA\Get(
     *     path="auth/generate-qr-code",
     *     summary="Generate QR Code endpoint",
     *     description="Generates a QR Code",
     *     tags={"QR Code"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="QR Code generated")
     *         )
     *     )
     * )
     */
    public function generateQRCode(UserService $userService)
    {
        // $qrCode = $userService->generateQRCode();

        return response()->json([
            'message' => 'QR Code generated',
            'qr_code' => 'https://www.google.com'
        ], 200);
    }
}
