<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(fn() => authRoutes());

function authRoutes()
{
    Route::controller(ActivityController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/activities', 'index')->name('activity.overview');
        Route::post('/activity/{activity}/register', 'register')->name('activity.register');
        Route::get('/activity/create', 'create')->name('activity.create');
        Route::post('/activity', 'store')->name('activity.store');
        Route::get('/activity/{activity}/edit', 'edit')->name('activity.edit');
        Route::patch('/activity/{activity}/edit', 'update')->name('activity.update');
        Route::post('/activity/{activity}/delete', 'destroy')->name('activity.delete');
        Route::get('/activity/{activity}', 'show')->name('activity.show');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.overview');
        Route::put('/admin/toggle/{user}', 'update')->name('admin.toggle');
    });
}
