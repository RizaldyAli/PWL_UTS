<?php

namespace  App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/perusahaan', PerusahaanController::class)->parameter('perusahaan', 'id');
});