<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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