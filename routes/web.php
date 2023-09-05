<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::controller(ActivityController::class)->group(function () {
    Route::get('/overview', 'index')->name('overview');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(ActivityController::class)->group(function () {
    Route::get('/overview', 'index')->name('overview');
    Route::get('/overview/{id}', 'show')->name('activity');
    Route::post('/overview/{id}/submit/', 'submit')->name('submit');
});
