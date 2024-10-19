<?php

use App\Http\Controllers\CardShiftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Dashboard\DashboardController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\FormKaryawanController;
use Illuminate\Support\Facades\Auth;

// Middleware
// Route::middleware(['auth'])->group(function () {
//     // Maka Semua route di sini harus login dulu
//     Route::get('/index', [MainPageController::class, 'index'])->name('index');
//     Route::get('/list-absen', [AbsenController::class, 'absen'])->name('absen');
//     Route::get('/card-shift-absen', [CardShiftController::class, 'cardView'])->name('card.shift');

//     // Form untuk kebutuhan karyawan
//     Route::get('/form-cuti-karyawan', [FormKaryawanController::class, 'cutiKaryawan'])->name('cuti.karyawan');
//     Route::post('/form-cuti-karyawan', [FormKaryawanController::class, 'post_cuti_karyawan'])->name('post.cuti');

//     Route::get('/form-izin-karyawan', [FormKaryawanController::class, 'izinKaryawan'])->name('izin.karyawan');
//     Route::post('/form-izin-karyawan', [FormKaryawanController::class, 'post_izin_karyawan'])->name('post.izin');

//     // Webcamp
//     Route::get('/webcamp-absen', [AbsenController::class, 'webcamp'])->name('webcamp.absen');

//     // Notif izin dan cuti karyawan
//     Route::get('/notif-cuti', [FormKaryawanController::class, 'notifCutiView'])->name('notif.cuti');
//     Route::get('/notif-izin', [FormKaryawanController::class, 'notifIzinView'])->name('notif.izin');
// });
Route::get('/index', [MainPageController::class, 'index'])->name('index');
Route::get('/list-absen', [AbsenController::class, 'absen'])->name('absen');
Route::get('/card-shift-absen', [CardShiftController::class, 'cardView'])->name('card.shift');

// Form untuk kebutuhan karyawan
Route::get('/form-cuti-karyawan', [FormKaryawanController::class, 'cutiKaryawan'])->name('cuti.karyawan');
Route::post('/form-cuti-karyawan', [FormKaryawanController::class, 'post_cuti_karyawan'])->name('post.cuti');

Route::get('/form-izin-karyawan', [FormKaryawanController::class, 'izinKaryawan'])->name('izin.karyawan');
Route::post('/form-izin-karyawan', [FormKaryawanController::class, 'post_izin_karyawan'])->name('post.izin');

// Webcamp
Route::get('/webcamp-absen', [AbsenController::class, 'webcamp'])->name('webcamp.absen');

// Notif izin dan cuti karyawan
Route::get('/notif-cuti', [FormKaryawanController::class, 'notifCutiView'])->name('notif.cuti');
Route::get('/notif-izin', [FormKaryawanController::class, 'serachNotifIzin'])->name('notif.izin');

// Search form izin dan cuti karyawan
Route::post('/serach-list-izin', [FormKaryawanController::class, 'serachNotifIzin'])->name('post.search.izin');

// Route::middleware(['guest'])->group(function () {
//     // Semua route di sini untuk user yang belum terautentikasi atau masih menjadi tamu
//     // Login
//     Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
//     Route::post('/login', [LoginUserController::class, 'proses_login'])->name('proses.login');

//     // Register
//     Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');
//     Route::post('/register', [RegisterUserController::class, 'proses_register'])->name('proses.register');
// });

Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
Route::post('/login', [LoginUserController::class, 'proses_login'])->name('proses.login');

// Register
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');
Route::post('/register', [RegisterUserController::class, 'proses_register'])->name('proses.register');

// Dashboard
// Route::get('/dashboard', [DashboardController::class, 'dash'])->name('admin.dashboard');

// Leaflet
// Route::get('/webcamp', function () {
//     return view('Leaflet.webcam');
// })->name('absensi.karyawan');

// Logout
Route::post('/logout', [LoginUserController::class, 'logout'])->name('auth.logout')->middleware('auth');

