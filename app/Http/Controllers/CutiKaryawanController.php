<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cutikaryawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Jabatan;
use App\Models\Devisi;

class CutiKaryawanController extends Controller
{
    public function showTabelCutiDashboard(){
        $formcuti = Cutikaryawan::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard-cuti', compact('formcuti'));
    }

    public function cutiKaryawan()
    {
        $jabatan = Jabatan::all();
        $divisi = Devisi::all();
        return view('Test.form-cuti', compact('jabatan', 'divisi'));
    }
    public function post_cuti_karyawan(Request $request)
    {
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

    public function searchNotifCuti(Request $request)
    {
        $notificationCuti = Cutikaryawan::all();

        $filters = $request->only(['approved', 'dari_tanggal', 'sampai_tanggal', 'created_at']);

        $query = Cutikaryawan::query();

        if (!empty($filters['approved'])) {
            $query->where('approved', $filters['approved']);
        }

        if (!empty($filters['dari_tanggal'])) {
            $query->whereDate('dari_tanggal', $filters['dari_tanggal']);
        }

        if (!empty($filters['sampai_tanggal'])) {
            $query->whereDate('sampai_tanggal', $filters['sampai_tanggal']);
        }

        if (!empty($filters['created_at'])) {
            $query->whereDate('created_at', $filters['created_at']);
        }

        $notificationCuti = $query->where('user_id', Auth::user()->id_user)->orderBy('created_at', 'desc')->paginate(5);

        return view('Test.notif-form-cuti', compact('notificationCuti'));
    }

    // Add this method to fetch cuti data for the table
    public function showCutiTable() {
        $cutis = Cutikaryawan::orderBy('created_at', 'desc')->paginate(5);
        return view('components.tables.cuti-table', compact('cutis'));
    }
}
