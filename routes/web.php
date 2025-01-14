<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('user.login');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

Route::prefix('/settings')->middleware('auth')->group(function () {

    // Ayalar -> Genel Ayar
    Route::get('/view', [SettingsController::class, 'view'])->name('settings.view');

    // Ayalar -> Kullanıcılar
    Route::prefix('/users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('settings.users');
        Route::get('/view', [UserController::class, 'view'])->name('settings.users.view');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/fetch', [UserController::class, 'fetch'])->name('users.fetch');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/delete', [UserController::class, 'delete'])->name('users.delete');
        Route::post('/is-active', [UserController::class, 'is_active'])->name('users.is-active');
        Route::post('/password/update', [UserController::class, 'password_update'])->name('users.update.password');
    });

    // Ayarlar -> Giriş Kayıtları

    // Ayarlar > Şirket Bilgileri

    // Ayarlar -> Departman Yönetimi



});


// Müşteriler Route
Route::prefix('/customers')->group(function(){

    Route::get('/view',[CustomerController::class,'index'])->name('customers.view');
    Route::post('/fetch',[CustomerController::class,'fetch'])->name('customers.fetch');


});
