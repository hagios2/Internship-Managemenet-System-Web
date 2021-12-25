<?php

namespace App\Services\MainCoordinator;

use App\Http\Requests\CoordinatorFormRequest;
use App\Http\Resources\CoordinatorResource;
use App\Http\Resources\MainCoordinator\SingleCoordinatorResource;
use App\Mail\CoordinatorRegistrationMail;
use App\Models\Cordinator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CoordinatorService
{
    public function index(): AnonymousResourceCollection
    {
        return CoordinatorResource::collection(Cordinator::query()->latest()->get());
    }

    public function fetchCoordinator(Cordinator $coordinator): SingleCoordinatorResource
    {
        return new SingleCoordinatorResource($coordinator);
    }

    public function store(CoordinatorFormRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $attributes = $request->validated();

            $password = Str::random(8);

            $attributes['password'] = Hash::make($password);

            $attributes['staff_id'] = $request->filled('staff_id') ? $attributes['staff_id'] : 'STF'.rand(10000, 999999);

            Log::info(json_encode($attributes));

            $attributes['must_change_password'] = true;

            $coordinator = Cordinator::create($attributes);

            Mail::to($coordinator)->queue(new CoordinatorRegistrationMail($coordinator, $password));

            DB::commit();

            return response()->json(['message' => 'success', 'coordinator' => new CoordinatorResource($coordinator) ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Something went wrong']);
        }
    }

    public function update(CoordinatorFormRequest $request, Cordinator $coordinator): JsonResponse
    {
        $coordinator->update($request->validated());

        return response()->json(['message' => 'success', 'company' => new CoordinatorResource($coordinator) ]);
    }

    public function destroy(Cordinator $coordinator): JsonResponse
    {
        $coordinator->delete();

        return response()->json(['message' => 'success']);
    }

    public function blockCoordinator(Cordinator $coordinator): JsonResponse
    {
        if ($coordinator->is_active) {
            $coordinator->update(['is_active' => false]);

            return response()->json(['message' => 'blocked']);
        }

        return response()->json(['message' => 'admin already blocked']);
    }


    public function unBlockCoordinator(Cordinator $coordinator): JsonResponse
    {
        if (!$coordinator->is_active) {
            $coordinator->update(['is_active' => true]);

            return response()->json(['message' => 'unblocked']);
        }

        return response()->json(['message' => 'admin is already active']);
    }
}
