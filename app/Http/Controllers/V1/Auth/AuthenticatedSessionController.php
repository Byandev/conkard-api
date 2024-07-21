<?php

namespace Conkard\Http\Controllers\V1\Auth;

use Conkard\Http\Controllers\Controller;
use Conkard\Http\Requests\Auth\LoginRequest;
use Conkard\Http\Resources\UserResource;
use Conkard\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = User::where('email', $request->input('email'))->first();

        $token = $user->createToken($request->header('user-agent', config('app.name')));

        return $this->respondWithToken($token->plainTextToken, UserResource::make($user));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
