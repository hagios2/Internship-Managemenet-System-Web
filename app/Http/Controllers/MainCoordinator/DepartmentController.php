<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Services\MainCoordinator\DepartmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DepartmentController extends Controller
{
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->middleware('auth:main_coordinator');

        $this->departmentService = $departmentService;
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->departmentService->index();
    }

    public function store(Request $request): JsonResponse
    {
        return $this->departmentService->store($request);
    }

    public function update(Request $request, Department $department): JsonResponse
    {
        return $this->departmentService->update($request, $department);
    }

    public function destroy(Department $department): JsonResponse
    {
        return $this->departmentService->destroy($department);
    }
}
