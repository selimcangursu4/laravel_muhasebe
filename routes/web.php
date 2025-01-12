<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

Route::get('/settings/view',[SettingsController::class, 'view']);
Route::get('/settings/users/view',[UserController::class, 'view']);
Route::post('/settings/users/store',[UserController::class, 'store'])->name('users.store');
