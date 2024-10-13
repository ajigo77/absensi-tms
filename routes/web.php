<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Dashboard\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PostAbsensiController;

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
    return view('Pages.HeroSection');
})->name('hero');

Route::get('/absen', [AbsenController::class,'getDataAbsen']);

Route::post('/post-absensi', [AbsenController::class, 'postAbsen'])->name('post.absen');

Route::get('/absen/stats', [AbsenController::class, 'getStats']);

Route::get('/form-izin-karyawan', [AbsenController::class, 'izinKaryawan'])->name('izin.karyawan');
Route::post('/proses-form-izin', [AbsenController::class, 'post_izin_karyawan'])->name('post.izin');

Route::get('/form-cuti-karyawan', [AbsenController::class, 'cutiKaryawan'])->name('cuti.karyawan');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('offices', OfficeController::class);
Route::resource('shifts', ShiftController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('leaves', LeaveController::class);

require __DIR__ . '/Auth/auth.php';
require __DIR__ . '/Uploaded/upload.php';
