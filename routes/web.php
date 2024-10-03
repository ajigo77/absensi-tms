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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [LoginUserController::class, 'login'])->name('auth.login');
Route::get('/register', [RegisterUserController::class, 'register'])->name('auth.register');

Route::post('/proses-login', [LoginUserController::class, 'proses_login'])->name('proses.login');

//shift
Route::get('/shift', function () {
    return view('Card.shift');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dash'])->name('dashboard');
