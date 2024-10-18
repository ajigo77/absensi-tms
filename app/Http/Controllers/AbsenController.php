<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Member;
use App\Models\Jabatan;
use App\Models\Devisi;
use App\Models\Izinkaryawans;
use App\Models\Jenisizin;
use App\Models\User;
use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // Untuk mengambil user yang sedang login
use Carbon\Carbon;
=======
use Carbon\Carbon;

>>>>>>> Senj
class AbsenController extends Controller
{
    public function getStats(): JsonResponse
    {
        $today = Carbon::today();

        $stats = [
            'masuk' => Absen::whereDate('created_at', $today)->where('status', 'masuk')->count(),
            'terlambat' => Absen::whereDate('created_at', $today)->where('status', 'terlambat')->count(),
            'lembur' => Absen::whereDate('created_at', $today)->where('status', 'lembur')->count(),
            'tidak_masuk' => Absen::whereDate('created_at', $today)->where('status', 'tidak masuk')->count(),
        ];

        return response()->json($stats);
    }

    public function show($id)
    {
        $absen = Absen::findOrFail($id);
        return view('view.show', compact('absen')); // Adjust the view name as necessary
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

        // Ambil waktu saat ini
        $waktuSaatIni = Carbon::now();

        // Tentukan batas waktu (08:05:00)
        $batasWaktu = Carbon::createFromTime(8, 5);

        // Logika untuk menentukan status
        if ($waktuSaatIni->lessThanOrEqualTo($batasWaktu)) {
            // Jika waktu absensi sebelum atau sama dengan batas waktu
            $status = 'masuk on time';
        } else {
            // Jika waktu absensi setelah batas waktu
            $status = 'terlambat';
        }

        $absen = new Absen();
        $absen->user_id = auth()->user()->id_user;
        $absen->type = 'masuk kerja';
        $absen->shift_id = 1;
        $absen->foto = isset($imageName) ? $imageName : null; // Menyimpan nama file gambar
        $absen->lattitude = $request->lattitude;
        $absen->longtitude = $request->longtitude;
        $absen->status = $status;
        $absen->member_id = 1;
        $absen->save();

        return response()->json(['success' => 'Absen berhasil.']);
    }

    public function index()
    {
        $users = User::with('Jabatan', 'Devisi', 'Member')->latest()->paginate(5);
        return view('Test.test', compact('users'));
    }

    // public function absen(Request $request){

    //     $absens = Absen::orderBy('created_at','desc')->paginate(5);
    //     $absens = new Absen();
    //     $absens = Absen::with('member')->get();

    //     if($request->get('search')){
    //         $absens = $absens->where('type','LIKE','%' . $request->get('search') . '%')
    //         ->orWhere('status','LIKE','%' . $request->get('search') . '%');
    //     }
    //     $absens = $absens->paginate(5);
    //     return view('Test.absen', compact('absens','request'));
    // }

    public function absen(Request $request)
    {
        // Ambil data absen dengan relasi member
        $absens = Absen::with('member')->orderBy('created_at', 'desc');

        // Jika ada query pencarian, terapkan filter
        if ($request->get('search')) {
            $absens = $absens->where(
                function ($query) use ($request) {
                    $query->where('type', 'LIKE', '%' . $request->get('search') . '%')
                        ->orWhere('status', 'LIKE', '%' . $request->get('search') . '%')
                        ->orWhereHas('member', function ($q) use ($request) {
                            $q->where('nama', 'LIKE', '%' . $request->get('search') . '%');
                });
            });
        }

        // Paginate hasil yang sudah difilter
        $absens = $absens->paginate(5);

        return view('Test.absen', compact('absens', 'request'));
    }

    public function webcamp()
    {
        return view('Test.webcam');
    }
}
