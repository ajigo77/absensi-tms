<?php

use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::resource('shifts', ShiftController::class);
