<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordinatorFormRequest;
use App\Http\Resources\MainCoordinator\SingleCoordinatorResource;
use App\Models\Cordinator;
use App\Services\MainCoordinator\CoordinatorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CoordinatorController extends Controller
{
    private CoordinatorService $coordinatorService;

    public function __construct(CoordinatorService $coordinatorService)
    {
        $this->middleware('auth:main_coordinator');

        $this->coordinatorService = $coordinatorService;
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->coordinatorService->index();
    }

    public function fetchCompany(Cordinator $coordinator): SingleCoordinatorResource
    {
        return $this->coordinatorService->fetchCoordinator($coordinator);
    }

    public function store(CoordinatorFormRequest $request): JsonResponse
    {
        return $this->coordinatorService->store($request);
    }

    public function update(CoordinatorFormRequest $request, Cordinator $coordinator): JsonResponse
    {
        return $this->coordinatorService->update($request, $coordinator);
    }

    public function destroy(Cordinator $coordinator): JsonResponse
    {
        return $this->coordinatorService->destroy($coordinator);
    }
}
