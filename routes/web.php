<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Pages\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');

// shift
Route::get('/shift', function () {
    return view('Card.shift');
});

// webcam
Route::get('webcam', function () {
    return view('Absensi.webcam');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dash']);

// izin
Route::get('/izinkaryawan', function () {
    return view('Pengajuanizin.izinkaryawan');
});

Route::get('/izincuti', function () {
    return view('Pengajuanizin.izincuti');
});
