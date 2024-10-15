<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::post('/upload', [ImageController::class, 'send_image_and_location'])->name('image.upload');

