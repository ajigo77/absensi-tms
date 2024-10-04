<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Dashboard\DashboardController;


Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
    //shift
    Route::get('/shift', function () {
        return view('Card.shift');
    })->name('shift');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dash'])->name('dashboard');
});

