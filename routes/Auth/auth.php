<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Pages\Dashboard\DashboardController;


// Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
// });

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dash'])->name('admin.dashboard');
// Shift
Route::get('/user/shift', function () {
    return view('Card.shift');
})->name('user.shift');

