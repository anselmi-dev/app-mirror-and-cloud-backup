<?php

use App\Http\Controllers\Api\LicenseController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Licenses\{
    Index, Edit, Show, Create,
};

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

    Route::get('/', Index::class)->name('dashboard');

    Route::get('/dashboard', Index::class);

    Route::name('licenses.')->prefix('licenses')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::get('{license}', Show::class)->name('show');
        Route::get('{license}/edit', Edit::class)->name('edit');
    });
});

Route::resource('license', LicenseController::class);
