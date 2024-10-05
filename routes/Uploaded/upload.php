<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::post('/upload', [ImageController::class, 'send_image'])->name('image.upload');
Route::post('/upload', [ImageController::class, 'send_location'])->name('image.upload');

