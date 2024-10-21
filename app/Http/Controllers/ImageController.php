<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Alokases;
use App\Models\Absen;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function send_image_and_location(Request $request)
    {
        // Simpan lokasi
        // $absen = Absen::create([
        //     // 'user_id' => auth()->user(),     jika sudah menggunakan middleware
        //     'user_id' => 1,
        //     'shift_id' => 2,
        //     'lattitude' => $request->latitude,
        //     'longtitude' => $request->longitude,
        // ]);

        // if($absen){
        //     // Jika berhasil, redirect dengan pesan sukses
        //     return redirect()->route('shift')->with('success', 'Data berhasil di simpan!');
        // } else {
        //     // Jika gagal, redirect dengan pesan error
        //     return redirect()->route('absensi.karyawan')->with('error', 'Gagal menyimpan data!');
        // }
    }
}
