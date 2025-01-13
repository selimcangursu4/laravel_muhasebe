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
Route::post('/settings/users/fetch',[UserController::class, 'fetch'])->name('users.fetch');
Route::get('/settings/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
Route::post('/settings/users/update',[UserController::class, 'update'])->name('users.update');
Route::post('/settings/users/delete',[UserController::class, 'delete'])->name('users.delete');
Route::post('/settings/users/is-active',[UserController::class, 'is_active'])->name('users.is-active');
Route::post('/settings/users/password/update',[UserController::class, 'password_update'])->name('users.update.password');
