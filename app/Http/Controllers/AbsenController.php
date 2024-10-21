<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Shift;
use App\Models\Member;
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
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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

        // Ambil data shift dari tabel shifts berdasarkan shift_id dari request
        $shift = Shift::find($request->shift);

        // Ambil waktu saat ini

        $status = 'masuk on time';

        // Logika untuk menentukan status Mendapatkan waktu shift di kolom waktu di tabel shift dan membandingkan menitnya
        if($shift){
            $waktuSaatIni = Carbon::now();
            $waktuShiftTerlambat = Carbon::parse($shift->waktu); // Mengubah waktu shift ke Carbon untuk manipulasi

            $menitHariIni = $waktuSaatIni->format('H:i'); // Ambil jam dan menit waktu sekarang

            $menitShift = $waktuShiftTerlambat->format('H:i'); // Ambil jam dan menit dari waktu shift
        }

        // Logika untuk menentukan status
        if ($menitHariIni > $menitShift) {
            $status = 'terlambat'; // Jika waktu absen lebih dari waktu shift (menit berbeda)
        } else {
            $status = 'masuk on time'; // Jika menit sama atau lebih awal
        }

        $absen = new Absen();
        $absen->user_id = Auth::user()->id_user;
        $absen->type = $request->type;
        $absen->shift_id = $request->shift;
        $absen->foto = isset($imageName) ? $imageName : null; // Menyimpan nama file gambar
        $absen->lattitude = $request->lattitude;
        $absen->longtitude = $request->longtitude;
        $absen->status = $status;
        $absen->save();

        return redirect()->route('absen');
    }

    public function index()
    {
        $users = User::with('Jabatan', 'Devisi', 'Member')->latest()->paginate(5);
        return view('Test.test', compact('users'));
    }

    public function absen(Request $request)
    {
        // Ambil data absen dengan relasi member
        $absens = Absen::with('user.Member')
        ->where('user_id', Auth::user()->id_user)->orderBy('created_at', 'desc');

        // Jika ada query pencarian, terapkan filter
        if ($request->get('search')) {
            $absens = $absens->where(function ($query) use ($request) {
                $query
                    ->where('type', 'LIKE', '%' . $request->get('search') . '%')
                    ->orWhere('status', 'LIKE', '%' . $request->get('search') . '%')
                    ->orWhereHas('user.Member', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->get('search') . '%');
                    });
            });
        }

        // Paginate hasil yang sudah difilter
        $absens = $absens->paginate(5);

        return view('Test.absen', compact('absens', 'request'));
    }

    public function webcamp($id, $type)
    {
        $shift = Shift::find($id);

        // Mencari data absen hari ini dengan user_id
        $absenToday = Absen::where('user_id', Auth::user()->id_user)
            ->whereDate('created_at', now())
            ->first();

        // Jika sudah ada absen hari ini dengan shift yang berbeda
        if ($absenToday && $absenToday->shift_id != $id) {
            return redirect()->route('card.shift')->with('info', 'Anda tidak boleh absen di shift yang berbeda pada hari yang sama.');
        }

        // Mencari data absen dengan type dan user_id
        $isAbsen = Absen::where('type', $type)
            ->where('user_id', auth()->user()->id_user)
            ->whereDate('created_at', now())
            ->first();

        // Menentukan pesan berdasarkan tipe absen
        $message = $type == 'masuk' ? 'Masuk' : 'Pulang';

        // Jika sudah ada absen untuk tipe tersebut (masuk/keluar)
        if ($isAbsen) {
            return redirect()
                ->route('card.shift')
                ->with('info', 'Anda sudah absen ' . $message . ' hari ini.');
        }

        return view('Test.webcam', compact('shift', 'type'));
    }
}
