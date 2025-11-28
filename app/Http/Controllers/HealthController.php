<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     * @OA\Get(
     *     path="/health",
     *     summary="Health check endpoint",
     *     description="Returns API health status",
     *     tags={"Health"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="OK")
     *         )
     *     )
     * )
     */
    public function __invoke()
    {
        return response()->json([
            'message' => 'OK'
        ], 200);
    }
}
