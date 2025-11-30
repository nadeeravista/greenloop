<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

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
     *             @OA\Property(
     *                 property="user",
     *                 type="object",
     *                 example={
     *                     "id": 1,
     *                     "name": "John Doe",
     *                     "email": "john.doe@example.com"
     *                 }
     *             )
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        return response()->json([
            'message' => 'Authenticated',
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email
            ]
        ], 200);
    }


    /**
     * @OA\Get(
     *     path="/auth/generate-qr-code",
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
    public function generateQRCode(Request $request, UserService $userService)
    {
        $qrCode = $userService->generateQRCode($request->user()->email);

        return response()->json([
            'message' => 'QR Code generated',
            'content' => $qrCode
        ], 200);
    }
}
