<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;

Route::post('/upload', [AbsenController::class, 'postAbsen'])->name('image.upload');

