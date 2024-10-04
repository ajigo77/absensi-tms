<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeController extends Controller
{
    public function waktu(Request $request)
    {
        // Ambil user yang sedang login atau bisa menggunakan id dari request jika perlu
        $user = auth()->user(); // atau $user = User::find($request->user_id);

        // Ambil waktu created_at dari database
        $createdTime = Carbon::parse($user->created_at); // Ambil field created_at dari database
        $limitTime = Carbon::createFromTime(8, 5, 0); // Tentukan batas waktu 08:05

        // Cek apakah created_at lebih dari jam 08:05
        if ($createdTime->greaterThan($limitTime)) {
            $status = 'Terlambat';
        } else {
            $status = 'Tepat waktu';
        }

        return view('dashboard', compact('status'));
    }
}
