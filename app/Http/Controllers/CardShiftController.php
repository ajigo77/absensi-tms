<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CardShiftController extends Controller
{
    public function cardView()
    {
        // Ambil semua data cards dari database
        $cards = Shift::all();

        // Dapatkan waktu saat ini
        $waktuSaatIni = Carbon::now();

        // Lakukan perulangan untuk setiap card untuk mengecek status absensi
        foreach ($cards as $card) {

            $awalWaktu = Carbon::parse($card->start_time)->format('H:i');
            $akhirWaktu = Carbon::parse($card->end_time)->format('H:i');

            // Jika waktu sekarang sebelum start_time, belum bisa absen
            if ($waktuSaatIni->lt($awalWaktu)) {
                $card->belum_absen = true;
                $card->bisa_absen = false;
            }
            // Jika waktu sekarang berada dalam rentang start_time dan end_time, bisa absen
            elseif ($waktuSaatIni->between($awalWaktu, $akhirWaktu)) {
                $card->belum_absen = false;
                $card->bisa_absen = true;
            }
            // Jika waktu sekarang sudah melewati end_time, tidak bisa absen lagi
            else {
                $card->belum_absen = false;
                $card->bisa_absen = false;
            }
        }

        return view('Test.shift', ['cards' => $cards]);
    }
}
