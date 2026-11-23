<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\UserController;

// Halaman utama
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk pengguna yang belum login
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

});

// Route untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Data Customer
    Route::resource('customers', CustomerController::class);

    // Data Kamar
    Route::resource('kamars', KamarController::class);

    // Data Fasilitas
    Route::resource('fasilitas', FasilitasController::class);

    // Data User
    Route::resource('users', UserController::class);

});
