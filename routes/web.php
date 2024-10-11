<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Pages\Dashboard\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Filament\Resources\AttendanceResource;
use App\Http\Controllers\ViewController;

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

Route::get('/absen/stats', [AbsenController::class, 'getStats']);

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('offices', OfficeController::class);
Route::resource('shifts', ShiftController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('leaves', LeaveController::class);

// Route::middleware(['auth'])->group(function () {
//     AttendanceResource::routes();
// });

Route::get('/api/absen/stats', [AbsenController::class, 'getStats']);

Route::get('/absen/{id}', [AbsenController::class, 'show'])->name('absen.show');

Route::get('/view/{id}', [ViewController::class, 'show'])->name('view.show');
