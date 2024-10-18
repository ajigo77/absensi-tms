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

<<<<<<< HEAD
    protected $fillable = ['user_id', 'type', 'shift_id', 'foto', 'lattitude', 'longtitude', 'status', 'member_id'];

    // Tambahkan metode untuk mengambil data
=======
    // Relasi ke model Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id'); // Ensure 'shift_id' is correct
    }

    // Method to get attendance statistics
>>>>>>> Senj
    public static function getStats()
    {
        $today = Carbon::today();

        return [
            'on_time' => self::whereDate('created_at', $today)->where('status', 'on time')->count(), // On time count
            'terlambat' => self::whereDate('created_at', $today)->where('status', 'terlambat')->count(), // Late count
            'masuk' => self::whereDate('created_at', $today)->where('type', 'masuk kerja')->count(), // Present count
            'tidak_masuk' => self::whereDate('created_at', $today)->where('type', 'tidak masuk')->count(), // Absent count
            'izin' => self::whereDate('created_at', $today)->where('status', 'Izin')->count(),
            'sakit' => self::whereDate('created_at', $today)->where('status', 'Sakit')->count(),
            'cuti' => self::whereDate('created_at', $today)->where('status', 'Cuti')->count(),
        ];
    }

<<<<<<< HEAD
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member');
=======
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Ensure 'user_id' is correct
>>>>>>> Senj
    }
}
