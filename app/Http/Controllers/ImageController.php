<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Alokases;
class ImageController extends Controller
{
    public function send_image(Request $request)
    {
        // Validasi bahwa file gambar telah diupload
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // Simpan gambar ke folder 'public/uploads'
        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        // Jika Anda ingin menyimpan path ke database:
        Image::create(['image_path' => $imageName]); // Sesuaikan model dan field database

        return response()->json(['success' => 'Image uploaded successfully', 'path' => $imageName]);
    }

    public function send_location(Request $request)
    {

        // Simpan lokasi
        Alokases::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
    }
}
