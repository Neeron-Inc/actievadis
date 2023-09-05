<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('welcome');
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
    Route::get('/activities', 'index')->name('activity.overview');
    Route::get('/activity/{id}', 'show')->name('activity.show');
    Route::post('/activity/{activity}/register', 'register')->name('activity.register');
});
