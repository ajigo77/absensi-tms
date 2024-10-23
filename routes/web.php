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
use App\Filament\Resources\AttendanceResource;
use App\Http\Controllers\ViewController;
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

// Route::middleware(['auth'])->group(function () {
//     AttendanceResource::routes();
// });

Route::get('/api/absen/stats', [AbsenController::class, 'getStats']);

Route::get('/absen/{id}', [AbsenController::class, 'show'])->name('absen.show');

Route::get('/view/{id}', [ViewController::class, 'show'])->name('view.show');

Route::get('/shift', [ShiftController::class, 'index'])->name('dash.shift');

Route::get('/shifts/create', [ShiftController::class, 'create'])->name('shifts.create'); // Tambahkan rute untuk membuat shift
Route::post('/shifts', [ShiftController::class, 'store'])->name('shifts.store'); // Tambahkan rute untuk menyimpan shift
Route::delete('/shifts/{id}', [ShiftController::class, 'destroy'])->name('shifts.destroy');

Route::group(['middleware' => ['auth', 'permission:view_dashboard']], function () {
    // Your routes here
});
require __DIR__ . '\Auth\auth.php';
require __DIR__ . '\Uploaded\upload.php';


