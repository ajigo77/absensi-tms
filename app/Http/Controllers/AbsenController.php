<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jabatan;
use App\Models\Devisi;
use App\Models\Izinkaryawans;
use App\Models\Jenisizin;
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
        // Proses data dari canvas (base64 ke file)
        if ($request->has('webcam')) {
            $imageData = $request->input('webcam');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageName = 'my-photo-' . time() . '-' . Str::random(6) . '.png'; // Membuat nama file
            File::put(public_path('webcam/') . $imageName, base64_decode($imageData));
        }

        $absen = new Absen();
        $absen->user_id = 2;
        $absen->type = 'masuk kerja';
        $absen->shift_id = 1;
        $absen->foto = isset($imageName) ? $imageName : null; // Menyimpan nama file gambar
        $absen->lattitude = $request->lattitude;
        $absen->longtitude = $request->longtitude;
        $absen->status = 'terlambat';
        $absen->save();

        // Absen::create([
        //     'user_id' => 1,
        //     'type' => 'masuk kerja',
        //     'shift_id' => 2,
        //     'foto' => isset($imageName) ? $imageName : null,
        //     'lattitude' => $request->lattitude,
        //     'longtitude' => $request->longtitude,
        //     'status' => 'masuk on time',
        // ]);

        return redirect()->route('shift')->with('success', 'Absen berhasil di simpan!');
    }

    public function izinKaryawan()
    {
        $jabatan = Jabatan::all();
        $divisi = Devisi::all();
        $jenis_izin = Jenisizin::all();
        return view('Pengajuanizin.izinkaryawan', compact('jabatan', 'divisi','jenis_izin'));
    }
    public function post_izin_karyawan(Request $request)
    {
        dd($request->all());
        $customMessageValidate = [
            'jenis_izin.required' => 'Tidak boleh kosong',
            'nama_karyawan.required' => 'Tidak boleh kosong',
            'nama_karyawan.regex' => 'Tidak boleh angka atau simbol khusus',
            'divisi.required' => 'Tidak boleh kosong',
            'jabatan.required' => 'Tidak boleh kosong',
            'tanggal_izin.required' => 'Tidak boleh kosong',
            'tanggal_izin.date' => 'Bukan format tanggal',
            'jam_pulang_izin.required' => 'Tidak boleh kosong',
            'jam_pulang_izin.date_format' => 'Bukan format tanggal',
            'alasan.required' => 'Tidak boleh kosong',
            'alasan.max' => 'Maximal 50 karakter',
        ];

        $request->validate([
            'jenis_izin' => 'required',
            'nama_karyawan' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'divisi' => 'required|exists:divisis,id_divisi',
            'jabatan' => 'required|exists:jabatans,id_jabatan',
            'tanggal_izin' => 'required|date',
            'jam_pulang_izin' => 'required|date_format:H:i', // Memastikan format jam menit (misalnya 14:30)
            'alasan' => 'required|string|max:50',
        ], $customMessageValidate);

        Izinkaryawans::create([
            'jenis_izin' => $request->jenis_izin,
            'nama_karyawan' => strip_tags($request->input('nama_karyawan')),
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'tanggal_izin' => $request->tanggal_izin,
            'jam_pulang_awal' => $request->jam_pulang, // Memastikan format jam menit (misalnya 14:30)
            'alasan' => strip_tags($request->input('alasan')),
        ]);

        // $data_karyawan['jenis_izin'] = $request->jenis_izin;
        // $data_karyawan['nama_karyawan'] = strip_tags($request->input('nama_karyawan'));
        // $data_karyawan['divisi'] = $request->divisi;
        // $data_karyawan['jabatan'] = $request->jabatan;
        // $data_karyawan['tanggal_izin'] = $request->tanggal_izin;
        // $data_karyawan['jam_pulang_izin'] = $request->jam_pulang;
        // $data_karyawan['alasan'] = strip_tags($request->input('alasan'));

        // Izinkaryawans::create($data_karyawan);

        return redirect()->route('shift')->with("success","Form Berhasil di sampaikan");
    }
    public function cutiKaryawan()
    {
        $jabatan = Jabatan::all();
        $divisi = Devisi::all();
        return view('Pengajuanizin.cutikaryawan', compact('jabatan', 'divisi'));
    }

}
