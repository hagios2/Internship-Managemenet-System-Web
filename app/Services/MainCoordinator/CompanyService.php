<?php

namespace App\Services\MainCoordinator;

use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\MainCoordinator\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyService
{
    public function index(): AnonymousResourceCollection
    {
        return CompanyResource::collection(Company::query()->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyFormRequest $request): JsonResponse
    {
        $company = Company::create($request->validated());

        return response()->json(['message' => 'success', 'company' => new CompanyResource($company) ], 201);
    }

    /**
     * Update the specified resource in storagee
     */
    public function update(CompanyFormRequest $request, Company $company): JsonResponse
    {
        $company->update($request->validated());

        return response()->json(['message' => 'success', 'company' => new CompanyResource($company) ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(Company $company): JsonResponse
    {
        $company->delete();

        return response()->json(['message' => 'success']);
    }
}
