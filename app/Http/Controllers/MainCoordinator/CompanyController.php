<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\MainCoordinator\SingleCompanyResource;
use App\Models\Company;
use App\Services\MainCoordinator\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->middleware('auth:main_coordinator');

        $this->companyService = $companyService;
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->companyService->index();
    }

    public function fetchCompany(Company $company): SingleCompanyResource
    {
        return $this->companyService->fetchCompany($company);
    }

    public function store(CompanyFormRequest $request): JsonResponse
    {
        return $this->companyService->store($request);
    }

    public function update(CompanyFormRequest $request, Company $company): JsonResponse
    {
        return $this->companyService->update($request, $company);
    }

    public function destroy(Company $company): JsonResponse
    {
        return $this->companyService->destroy($company);
    }

    public function fetchCompanies(): JsonResponse
    {
        return $this->companyService->fetchCompanies();
    }
}
