<?php

namespace App\Http\Controllers\MainCoordinator;

use App\Http\Controllers\Controller;
use App\Models\Region;
use function response;

class RegionsController extends Controller
{
    public function fetchRegions(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['cities' => Region::all(['id', 'region'])]);
    }
}
