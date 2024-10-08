<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Alokases;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function send_image_and_location(Request $request)
    {
        // Validasi bahwa file gambar telah diupload
        // Simpan gambar ke folder 'public/uploads'
        // $image = $request->file('image');
        // $imageName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('uploads'), $imageName);

        // Simpan lokasi
        // Alokases::create([
        //     'latitude' => $request->latitude,
        //     'longitude' => $request->longitude,
        // ]);

        // Image::create([
        //     'image_path' =>$imageName
        // ]);
        // if ($request->hasFile('image')) {

        //     return response()->json(['success' => 'Data berhasil di absen', 'path' => $imageName]);
        // } else {
        //     return response()->json(['error' => 'Tidak ada gambar'], 400);
        // }
        dd($request->all());
        dd($request->file('image'));
    }
}
