<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectoryRequest;
use App\Http\Requests\UpdateDirectoryRequest;
use Illuminate\Http\Request;
use App\Http\Resources\DirectoryResource;
use Illuminate\Support\Facades\Gate;
use App\Models\Directory;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = Gate::inspect('viewAny', Directory::class);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $user_license = $request->user()->user_license;

        if (!$user_license)
            return response()->json(['error' => __('No posee licencia')], 403);

        return DirectoryResource::collection($user_license->directories()->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectoryRequest $request)
    {
        $response = Gate::inspect('create', Directory::class);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $user_license = $request->user()->user_license;

        if (!$user_license)
            return response()->json(['error' => __('No posee licencia')], 403);

        $directory = $user_license->directories()->create($request->all());

        return DirectoryResource::collection($user_license->directories()->paginate(25));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Directory $directory)
    {
        $response = Gate::inspect('view', $directory);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        return new DirectoryResource($directory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectoryRequest $request, Directory $directory)
    {
        $response = Gate::inspect('update', $directory);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $user_license = $request->user()->user_license;

        if (!$user_license)
            return response()->json(['error' => __('No posee licencia')], 403);

        $directory->update($request->all());

        return DirectoryResource::collection($user_license->directories()->paginate(25));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request  $request, Directory $directory)
    {
        $response = Gate::inspect('update', $directory);

        if (!$response->allowed()) {
            return response()->json(['error' => __('This action is unauthorized')], 403);
        }

        $user_license = $request->user()->user_license;

        if (!$user_license)
            return response()->json(['error' => __('No posee licencia')], 403);

        $directory->delete();

        return DirectoryResource::collection($user_license->directories()->paginate(25));
    }
}
