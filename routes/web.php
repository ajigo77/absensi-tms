<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Dashboard\DashboardController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CardShiftController;
use App\Http\Controllers\FormKaryawanController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostAbsensiController;
use App\Models\Absen;

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

Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');

Route::post('/proses-login', [LoginUserController::class, 'proses_login'])->name('proses.login');
Route::post('/proses-register', [RegisterUserController::class, 'proses_register'])->name('proses.register');

// Logout
Route::post('/logout', [LoginUserController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Route::get('/izinkaryawan', function () {
//     return view('Pengajuanizin.izinkaryawan');
// });

// Route::get('/izincuti', function () {
//     return view('Pengajuanizin.izincuti');
// });

// Route::get('/history', function () {
//     return view('History.history');
// });


// // Leaflet
// Route::get('/webcamp', function () {
//     return view('Leaflet.webcam');
// })->name('absensi.karyawan');


Route::get('/absen', [AbsenController::class, 'getDataAbsen']);
Route::get('/absen/stats', [AbsenController::class, 'getStats']);

// Route::get('/test', [AbsenController::class, 'index']);
// Route::post('/post-absensi', [AbsenController::class, 'postAbsen'])->name('post.absen');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('offices', OfficeController::class);
Route::resource('shifts', ShiftController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('leaves', LeaveController::class);

require __DIR__ . '\Auth\auth.php';
require __DIR__ . '\Uploaded\upload.php';
