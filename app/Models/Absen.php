<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';
    protected $primaryKey = 'id_absen'; // Ensure this matches the column name in the database

    // Method to get attendance statistics
    public static function getStats()
    {
        $today = Carbon::today();

        return [
            'masuk' => self::whereDate('created_at', $today)->where('status', 'on time')->count(), // Adjusted to match your status
            'terlambat' => self::whereDate('created_at', $today)->where('status', 'terlambat')->count(),
            'lembur' => self::whereDate('created_at', $today)->where('status', 'lembur')->count(),
            'tidak_masuk' => self::whereDate('created_at', $today)->where('status', 'tidak masuk')->count(),
        ];
    }
}
