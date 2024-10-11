<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Dashboard\DashboardController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;

Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dash'])->name('admin.dashboard');
});

// Shift
Route::get('/shift', function () {
    return view('Card.shift');
})->name('shift');
// Leaflet
Route::get('/webcamp', function () {
    return view('Leaflet.webcam');
})->name('absensi.karyawan');

// Login
Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
// Register
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');

Route::post('/proses-login', [LoginUserController::class, 'proses_login'])->name('proses.login');
Route::post('/proses-register', [RegisterUserController::class, 'proses_register'])->name('proses.register');

// Logout
Route::get('/logout', [LoginUserController::class, 'logout'])->name('auth.logout');
