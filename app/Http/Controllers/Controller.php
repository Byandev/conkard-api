<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function respondWithToken(string $token, $user, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'user' => $user,
            ],
        ], $statusCode)->header('Authorization', $token);
    }
}
