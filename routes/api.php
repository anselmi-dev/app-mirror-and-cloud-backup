<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DirectoryController;
use App\Http\Controllers\Api\LicenseController;

Route::get('/user', function (Request $request) {
    return $request->user()->with('license');
})->middleware('auth:sanctum');

Route::group([], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::middleware([
    // 'web',
    'auth:sanctum',
    config('jetstream.auth_session')
])->group(function () {
    Route::resource('license', LicenseController::class);
    Route::get('license/{license}/validation', [LicenseController::class, 'validation']);
    Route::resource('directories', DirectoryController::class);
});
