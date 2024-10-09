<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';
    protected $primaryKey = 'id_absen'; // Pastikan ini sesuai dengan nama kolom di database

    // Tambahkan metode untuk mengambil data
    public static function getStats()
    {
        return [
            'masuk' => self::where('type', 'masuk')->count(),
            'terlambat' => self::where('type', 'terlambat')->count(),
            'lembur' => self::where('type', 'lembur')->count(),
            'tidak_masuk' => self::where('type', 'tidak masuk')->count(),
        ];
    }
}
