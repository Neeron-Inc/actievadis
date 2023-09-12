<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

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
    Route::get('/activity/create', 'create')->name('activities.create');
    Route::post('/activity', 'store')->name('activities.store');
    // edit route and delete route
    Route::get('/activity/{activity}/edit', 'edit')->name('activity.edit');
    Route::post('/activity/{activity}/edit', 'update')->name('activity.update');
    Route::post('/activity/{activity}/delete', 'destroy')->name('activity.destroy');
});
