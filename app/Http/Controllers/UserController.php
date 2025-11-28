<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/auth",
     *     summary="Authenticated user endpoint",
     *     description="Returns an authenticated user",
     *     tags={"Auth"},
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
    public function __invoke()
    {
        return response()->json([
            'message' => 'Authenticated'
        ], 200);
    }
}
