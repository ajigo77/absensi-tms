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
use Carbon\Carbon;
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

        $user = auth()->user(); // atau $user = User::find($request->user_id);

        // Ambil waktu created_at dari database
        $createdTime = Carbon::parse($user->created_at); // Ambil field created_at dari database
        $limitTime = Carbon::createFromTime(8, 5, 0); // Tentukan batas waktu 08:05

        if ($createdTime->greaterThan($limitTime)) {
            $status = 'Terlambat';
        } else {
            $status = 'Tepat waktu';
        }

        $absen = new Absen();
        $absen->user_id = 2;
        $absen->type = 'masuk kerja';
        $absen->shift_id = 1;
        $absen->foto = isset($imageName) ? $imageName : null; // Menyimpan nama file gambar
        $absen->lattitude = $request->lattitude;
        $absen->longtitude = $request->longtitude;
        $absen->status = 'Tepat waktu';
        $absen->save();

        if ($absen->save()) {
            return redirect()->route('shift')->with('success', 'Absen berhasil disimpan!');
        } else {
            dd('Error during saving');
        }
    }

    public function index()
    {
        $users = User::with('Jabatan', 'Devisi', 'Member')->latest()->paginate(5);
        return view('Test.test', compact('users'));
    }
}
