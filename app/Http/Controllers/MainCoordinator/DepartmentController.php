<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:main_coordinator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return DepartmentResource::collection(Department::query()->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $department = Department::create($request->validate(['department' => 'required|string|unique:departments']));

        return response()->json(['message' => 'success', 'department' => new DepartmentResource($department) ]);
    }

    /**
     * Update the specified resource in storagee
     */
    public function update(Request $request, Department $department): JsonResponse
    {
        $validatedData = $request->validate(['department' => ['required', 'string', Rule::unique('departments')->ignore($department->id)]]);

        $department->update($validatedData);

        return response()->json(['message' => 'success', 'department' => new DepartmentResource($department) ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(Department $department): JsonResponse
    {
        $department->delete();

        return response()->json(['message' => 'success']);
    }
}
