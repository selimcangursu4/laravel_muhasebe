<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'login'])->name('user.login');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

Route::prefix('/settings')->group(function () {

    // Ayalar -> Genel Ayar
    Route::get('/view', [SettingsController::class, 'view'])->name('settings.view');

    // Ayalar -> Kullanıcılar
    Route::get('/users', [UserController::class, 'index'])->name('settings.users');
    Route::get('/users/view', [UserController::class, 'view'])->name('settings.users.view');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/fetch', [UserController::class, 'fetch'])->name('users.fetch');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::post('/users/is-active', [UserController::class, 'is_active'])->name('users.is-active');
    Route::post('/users/password/update', [UserController::class, 'password_update'])->name('users.update.password');

    // Ayarlar -> Giriş Kayıtları

    // Ayarlar > Şirket Bilgileri

    // Ayarlar -> Departman Yönetimi

    // Ayarlar -> Vergi Hesaplama

});


// Müşteriler Route
Route::prefix('/customers')->group(function(){

    Route::get('/view',[CustomerController::class,'index'])->name('customers.view');

});
