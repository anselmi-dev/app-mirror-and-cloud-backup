<?php

use App\Http\Controllers\Api\LicenseController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Licenses\{
    Index, EditLicense, ShowLicense, CreateLicense,
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
        Route::get('create', CreateLicense::class)->name('create');
        Route::get('{license}', ShowLicense::class)->name('show');
        Route::get('{license}/edit', EditLicense::class)->name('edit');
    });

    Route::get('test-event2', function () {

        \App\Events\NotificationTest::dispatch('hello world');

        event(new \App\Events\NotificationTest('hello world'));

        return true;
    });
});

Route::resource('license', LicenseController::class);
