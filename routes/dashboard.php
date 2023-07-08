<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [DashboardController::class, 'login'])->name('dashboard.login');

Route::prefix('/')->as('dashboard.')->middleware(['auth', 'auth.hasDashboard'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
});
