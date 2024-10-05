<?php

use App\Http\Controllers\ImageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LoginUserController::class, 'login'])->name('auth.login');
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');

Route::post('/proses-login', [LoginUserController::class, 'proses_login'])->name('proses.login');
Route::post('/proses-register', [RegisterUserController::class, 'proses_register'])->name('proses.register');

// Logout
Route::get('/logout', [LoginUserController::class, 'logout'])->name('auth.logout');

// Leaflet
Route::get('/simple-map', function () {
    return view('Leaflet.simple-map');
})->name('simple.map');

Route::get('/dashboard', [DashboardController::class, 'dash']);
Route::get('/webcamp', function () {
    return view('Leaflet.webcam');
})->name('absensi.karyawan');

require __DIR__ . '/Uploaded/upload.php';
require __DIR__ . '/Auth/auth.php';
