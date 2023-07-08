<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [DashboardController::class, 'login'])->name('dashboard.login');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
