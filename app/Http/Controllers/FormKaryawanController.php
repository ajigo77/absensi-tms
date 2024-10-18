<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Devisi;
use App\Models\Jenisizin;
use App\Models\Izinkaryawans;
use App\Models\Cutikaryawan;

class FormKaryawanController extends Controller
{
    public function izinKaryawan()
    {
        $jabatan = Jabatan::all();
        $divisi = Devisi::all();
        $jenis_izin = Jenisizin::all();
        return view('Test.form-izin', compact('jabatan', 'divisi', 'jenis_izin'));
    }
    public function post_izin_karyawan(Request $request)
    {
        $customMessageValidate = [
            'jenis_izin.required' => 'Tidak boleh kosong',
            'nama_karyawan.required' => 'Tidak boleh kosong',
            'nama_karyawan.regex' => 'Tidak boleh angka atau simbol khusus',
            'divisi.required' => 'Tidak boleh kosong',
            'jabatan.required' => 'Tidak boleh kosong',
            'tanggal_izin.required' => 'Tidak boleh kosong',
            'tanggal_izin.date' => 'Bukan format tanggal',
            'jam_pulang_awal.required' => 'Tidak boleh kosong',
            'jam_pulang_awal.date_format' => 'Bukan format tanggal',
            'alasan.required' => 'Tidak boleh kosong',
            'alasan.max' => 'Maximal 50 karakter',
        ];

        $request->validate(
            [
                'jenis_izin' => 'required',
                'nama_karyawan' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'divisi' => 'required|exists:divisis,nama',
                'jabatan' => 'required|exists:jabatans,nama',
                'tanggal_izin' => 'required|date',
                'jam_pulang_awal' => 'required|date_format:H:i', // Memastikan format jam menit (misalnya 14:30)
                'alasan' => 'required|string|max:50',
            ],
            $customMessageValidate,
        );

        $izin = Izinkaryawans::create([
            'jenis_izin' => $request->jenis_izin,
            'nama_karyawan' => strip_tags($request->input('nama_karyawan')),
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'tanggal_izin' => $request->tanggal_izin,
            'jam_pulang_awal' => $request->jam_pulang_awal, // Memastikan format jam menit (misalnya 14:30)
            'alasan' => strip_tags($request->input('alasan')),
        ]);

        if($izin){
            return redirect()->route('shift')->with('success', 'Form Pengajuan Izin Berhasil di sampaikan');
        } else {
            return redirect()->route('izin.karyawan')->with('error', 'Ada kesalahan dalam pengajuan izin Anda. Coba periksa kembali data yang dimasukkan dan kirim ulang');
        }
    }

    public function cutiKaryawan()
    {
        $jabatan = Jabatan::all();
        $divisi = Devisi::all();
        return view('Test.form-cuti', compact('jabatan', 'divisi'));
    }

    public function post_cuti_karyawan(Request $request){
        $validateCustomMessage = [
            'nama_karyawan.required' => 'Tidak boleh kosong',
            'divisi.required' => 'Tidak boleh kosong',
            'jabatan.required' => 'Tidak boleh kosong',
            'tanggal_cuti.required' => 'Tidak boleh kosong',
            'alasan.required' => 'Tidak boleh kosong',
            'alasan.max' => 'Maximal 50 karakter',
        ];

        $request->validate([
            'nama_karyawan' => 'required',
            'divisi' => 'required|exists:divisis,nama',
            'jabatan' => 'required|exists:jabatans,nama',
            'tanggal_cuti' => 'required|date',
            'alasan' => 'required|max:50',
        ], $validateCustomMessage);

        $cuti = Cutikaryawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'tanggal_cuti' => $request->tanggal_cuti,
            'alasan' => $request->alasan,
        ]);

        if($cuti){
            return redirect()->route('shift')->with('success', 'Form pengajuan cuti berhasil di sampaikan');
        } else {
            return redirect()->route('cuti.karyawan')->with('error', 'Ada kesalahan dalam pengajuan cuti Anda. Coba periksa kembali data yang dimasukkan dan kirim ulang');
        }
    }

    public function notifIzinView(){
        return view('Test.notif-form-izin');
    }
    public function notifCutiView(){
        return view('Test.notif-form-cuti');
    }
}
