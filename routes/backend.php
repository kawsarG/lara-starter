<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;




 Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
 Route::resource('roles',RoleController::class);
 Route::resource('users',UsersController::class);