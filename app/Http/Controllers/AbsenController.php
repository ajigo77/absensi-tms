<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

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
        return view('absen.show', compact('absen')); // Adjust the view name as necessary
    }
}
