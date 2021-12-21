<?php

namespace App\Http\Controllers\MainCoordinator\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainCoordinatorResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('auth:main_coordinator', ['except' => ['login']]);

        $this->authService = $authService;
    }

    public function login(): JsonResponse
    {
        return $this->authService->login('main_coordinator');
    }


    public function logout(): JsonResponse
    {
        return $this->authService->logout();
    }

    public function refresh(): JsonResponse
    {
        return $this->authService->refresh();
    }

    public function getAuthUser(): MainCoordinatorResource
    {
        return $this->authService->getAuthUser();
    }

    public function saveValidId(Request $request): JsonResponse
    {
        $request->validate(['valid_id' => 'nullable|image|mimes:png,jpg,jpeg']);

        $file = $request->file('valid_id');

        $user = auth()->guard('api')->user();

        $fileName = $file->getClientOriginalName();

        $path = "public/valid ids/$user->id/";

        $file->storeAs($path, $fileName);

        $user->update(['valid_id' => $path.$fileName]);

        return response()->json(['status' => 'File saved']);
    }
}
