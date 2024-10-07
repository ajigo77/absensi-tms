<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Alokases; // Assuming Alokases is the model for location
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan gambar
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');

            // Simpan ke tabel images
            $image = new Image();
            $image->image_path = $imagePath;
            $image->save(); // Simpan hanya gambar

            // Simpan lokasi ke tabel alokases
            $alokasi = new Alokases(); // Pastikan Anda menggunakan model yang benar
            $alokasi->latitude = $request->latitude;
            $alokasi->longitude = $request->longitude;
            $alokasi->image_id = $image->id; // Jika Anda ingin mengaitkan lokasi dengan gambar
            $alokasi->save();

            return response()->json(['success' => 'Image and location uploaded successfully.']);
        }

        return response()->json(['error' => 'Image upload failed.'], 500);
    }

    public function send_location(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan lokasi
        Alokases::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json(['success' => 'Location saved successfully.']);
    }
}
