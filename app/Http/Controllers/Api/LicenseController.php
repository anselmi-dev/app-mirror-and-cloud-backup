<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\License;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use Illuminate\Http\Request;
use App\Http\Resources\LicenseResource;
use Illuminate\Support\Facades\Gate;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = Gate::inspect('viewAny', License::class);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        return LicenseResource::collection(License::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLicenseRequest $request)
    {
        $response = Gate::inspect('store', License::class);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $license = License::create($request->all());

        return new LicenseResource($license);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, License $license)
    {
        $response = Gate::inspect('view', $license);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        return new LicenseResource($license);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenseRequest $request, License $license)
    {
        $response = Gate::inspect('update', $license);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        return new LicenseResource($license);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        $response = Gate::inspect('destroy', $license);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $license->delete();

        return new LicenseResource($license);
    }
}
