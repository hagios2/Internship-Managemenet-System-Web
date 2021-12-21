<?php

namespace App\Services;

use App\Http\Resources\MainCoordinatorResource;

class AuthService
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(?string $guard=null): \Illuminate\Http\JsonResponse
    {
        $credentials = request(['email', 'password']);

//        $credentials['isActive'] = true;

        if ($guard) {
            if (! $token = auth()->guard($guard)->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } else {
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.

     */
    public function getAuthUser(): MainCoordinatorResource
    {
        return new MainCoordinatorResource(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): \Illuminate\Http\JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 3600,
            'statusCode' => 200
        ]);
    }
}
