<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // Untuk mengambil user yang sedang login

class AbsenController extends Controller
{
    public function getStats(): JsonResponse
    {
        return response()->json(Absen::getStats());
    }

    public function postAbsen(Request $request)
    {
        // dd($request->all());
        // Proses data dari canvas (base64 ke file)
        if ($request->has('webcam')) {
            $imageData = $request->input('webcam');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageName = 'my-photo-' . time() . '-' . Str::random(6) . '.png'; // Membuat nama file
            File::put(public_path('webcam/') . $imageName, base64_decode($imageData));
        }

        // $absen = new Absen();
        // $absen->user_id = 2;
        // $absen->type = 'masuk kerja';
        // $absen->shift_id = 1;
        // $absen->foto = isset($imageName) ? $imageName : null; // Menyimpan nama file gambar
        // $absen->lattitude = $request->lattitude;
        // $absen->longtitude = $request->longtitude;
        // $absen->status = 'hadir';
        // $absen->save();

        $absen = Absen::create([
            'user_id' => 1,
            'type' => 'masuk kerja',
            'shift_id' => 2,
            'foto' => isset($imageName) ? $imageName : null,
            'lattitude' => $request->lattitude,
            'longtitude' => $request->longtitude,
            'status' => 'masuk on time',
        ]);

        if($absen){
            // Jika berhasil, redirect dengan pesan sukses
            return redirect()->route('shift')->with('success', 'Absen berhasil di simpan!');
        } else {
            // Jika gagal, redirect dengan pesan error
            return redirect()->route('absensi.karyawan')->with('error', 'Gagal menyimpan data!');
        }

        // return response()->json(['success' => 'Absen berhasil.']);
    }
}
