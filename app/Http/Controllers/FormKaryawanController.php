<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Devisi;
use App\Models\Jenisizin;
use App\Models\Izinkaryawans;
use App\Models\Cutikaryawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        // dd($request->all());
        $customMessageValidate = [
            'jenis_izin.required' => 'Tidak boleh kosong',
            'nama_karyawan.required' => 'Tidak boleh kosong',
            'nama_karyawan.regex' => 'Tidak boleh angka atau simbol khusus',
            'divisi.required' => 'Tidak boleh kosong',
            'jabatan.required' => 'Tidak boleh kosong',
            'dari_tanggal.required' => 'Tidak boleh kosong',
            'dari_tanggal.date' => 'Bukan format tanggal',
            'sampai_tanggal.required' => 'Tidak boleh kosong',
            'sampai_tanggal.date' => 'Bukan format tanggal',
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
                'dari_tanggal' => 'required|date',
                'sampai_tanggal' => 'required|date',
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
            'dari_tanggal' => $request->dari_tanggal,
            'sampai_tanggal' => $request->sampai_tanggal,
            'jam_pulang_awal' => $request->jam_pulang_awal, // Memastikan format jam menit (misalnya 14:30)
            'alasan' => strip_tags($request->input('alasan')),
            'user_id' => $request->user_id
        ]);

        if ($izin) {
            return redirect()->route('notif.izin')->with('success', 'Form pengajuan izin berhasil di sampaikan');
        } else {
            return redirect()->route('izin.karyawan')->with('error', 'Ada kesalahan dalam pengajuan izin Anda. Coba periksa kembali data yang dimasukkan dan kirim ulang');
        }
    }

    public function cutiKaryawan()
    {
        return view('Test.form-cuti');
    }

    public function post_cuti_karyawan(Request $request)
    {
        // dd($request->all());
        $validateCustomMessage = [
            'nama_karyawan.required' => 'Tidak boleh kosong',
            'divisi.required' => 'Tidak boleh kosong',
            'jabatan.required' => 'Tidak boleh kosong',
            'dari_tanggal.required' => 'Tidak boleh kosong',
            'dari_tanggal.date' => 'Bukan format tanggal',
            'sampai_tanggal.required' => 'Tidak boleh kosong',
            'sampai_tanggal.date' => 'Bukan format tanggal',
            'alasan.required' => 'Tidak boleh kosong',
            'alasan.max' => 'Maximal 50 karakter',
        ];

        $request->validate(
            [
                'nama_karyawan' => 'required',
                'divisi' => 'required|exists:divisis,nama',
                'jabatan' => 'required|exists:jabatans,nama',
                'dari_tanggal' => 'required|date',
                'sampai_tanggal' => 'required|date',
                'alasan' => 'required|max:50',
            ],
            $validateCustomMessage,
        );

        $cuti = Cutikaryawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'dari_tanggal' => $request->dari_tanggal,
            'alasan' => $request->alasan,
            'sampai_tanggal' => $request->sampai_tanggal,
            'user_id' => $request->user_id,
        ]);

        if ($cuti) {
            return redirect()->route('notif.cuti')->with('success', 'Form pengajuan cuti berhasil di sampaikan');
        } else {
            return redirect()->route('cuti.karyawan')->with('error', 'Ada kesalahan dalam pengajuan cuti Anda. Coba periksa kembali data yang dimasukkan dan kirim ulang');
        }
    }

    public function serachNotifIzin(Request $request)
    {
        // Mengambil data dari model Izinkaryawans
        $notificationIzin = Izinkaryawans::all();

        // Mengambil data dari model Jenisizin
        $jenis_izin_karyawan = Jenisizin::all();

        // Ambil semua input dari form
        $filters = $request->only(['type', 'approved', 'dari_tanggal', 'sampai_tanggal', 'created_at']);

        // Mulai query
        $query = IzinKaryawans::query();

        // // Filter berdasarkan tipe izin
        // if (!empty($filters['type'])) {
        //     $query->where('jenis_izin', $filters['type']);
        // }

        // Filter berdasarkan status
        if (!empty($filters['approved'])) {
            $query->where('approved', $filters['approved']);
        }

        // // Filter berdasarkan nama karyawan
        // if (!empty($filters['nama_karyawan'])) {
        //     $query->where('nama_karyawan', 'LIKE', '%' . $filters['nama_karyawan'] . '%');
        // }

        // Filter berdasarkan dari tanggal
        if (!empty($filters['dari_tanggal'])) {
            $query->where('dari_tanggal',[$filters['dari_tanggal']]);
        }

        // Filter berdasarkan sampai tanggal
        if (!empty($filters['sampai_tanggal'])) {
            $query->where('sampai_tanggal',[$filters['sampai_tanggal']]);
        }

        // Filter berdasarkan hari ini
        if (!empty($filters['created_at'])) {
            $query->where('created_at',[$filters['created_at']]);
        }

        // // Filter berdasarkan jam pulang awal
        // if (!empty($filters['jam_pulang_awal'])) {
        //     $query->where('jam_pulang_awal', $filters['jam_pulang_awal']);
        // }

         // Ambil hasil query
        $notificationIzin = $query->where('user_id', Auth::user()->id_user)->orderBy('created_at','desc')->paginate(5);

        return view('Test.notif-form-izin', compact('notificationIzin', 'jenis_izin_karyawan'));
    }

    public function searchNotifCuti(Request $request)
    {
        // // Mengambil semua data jabatan dari tabel jabatan
        // $jabatan = Jabatan::all();

        // // Mengambil semua data divisi dari tabel devisi
        // $divisi = Devisi::all();

        // Mengambil data dari model Izinkaryawans
        $notificationCuti = Cutikaryawan::all();

        // Ambil semua input dari form
        $filters = $request->only(['approved', 'dari_tanggal', 'sampai_tanggal','created_at']);

        // Mulai query
        $query = Cutikaryawan::query();

        // Filter berdasarkan status
        if (!empty($filters['approved'])) {
            $query->where('approved', $filters['approved']);
        }

        // // Filter berdasarkan nama karyawan
        // if (!empty($filters['nama_karyawan'])) {
        //     $query->where('nama_karyawan', 'LIKE', '%' . $filters['nama_karyawan'] . '%');
        // }

        // Filter berdasarkan dari tanggal
        if (!empty($filters['dari_tanggal'])) {
            $query->whereDate('dari_tanggal',$filters['dari_tanggal']);
        }

        // Filter berdasarkan sampai tanggal
        if (!empty($filters['sampai_tanggal'])) {
            $query->whereDate('sampai_tanggal',$filters['sampai_tanggal']);
        }

        // // Filter berdasarkan sampai jabatan
        // if (!empty($filters['jabatan'])) {
        //     $query->where('jabatan',[$filters['jabatan']]);
        // }

        // // Filter berdasarkan sampai jabatan
        // if (!empty($filters['divisi'])) {
        //     $query->where('divisi',[$filters['divisi']]);
        // }

        // Filter berdasarkan sampai tanggal sekarang
        if (!empty($filters['created_at'])) {
            $query->whereDate('created_at',$filters['created_at']);
        }

         // Ambil hasil query
         $notificationCuti = $query->where('user_id',Auth::user()->id_user)->orderBy('created_at','desc')->paginate(5);

        return view('Test.notif-form-cuti', compact('notificationCuti'));
    }
}
