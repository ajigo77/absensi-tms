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

    // Relasi ke model Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id','id'); // Ensure 'shift_id' is correct
    }

    // Method to get attendance statistics
    protected $fillable = ['user_id', 'type', 'shift_id', 'foto', 'lattitude', 'longtitude', 'status'];

    // Tambahkan metode untuk mengambil data
    public static function getStats()
    {
        $today = Carbon::today();

        return [
            'on_time' => self::whereDate('created_at', $today)->where('status', 'masuk on time')->count(), // Corrected status
            'terlambat' => self::whereDate('created_at', $today)->where('status', 'terlambat')->count(),
            'masuk' => self::whereDate('created_at', $today)->where('type', 'masuk')->count(),
            'tidak_masuk' => self::whereDate('created_at', $today)->where('type', 'tidak masuk')->count(),
            'izin' => self::whereDate('created_at', $today)->where('status', 'ijin')->count(),
            'sakit' => self::whereDate('created_at', $today)->where('status', 'sakit')->count(),
            'cuti' => self::whereDate('created_at', $today)->where('status', 'cuti')->count(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user'); // Ensure 'user_id' is correct
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member'); // Pastikan 'member_id' sesuai
    }

    // Define the relationship if needed
    public function absens()
    {
        return $this->belongsTo(Absen::class, 'user_id'); // Adjust 'foreign_key' as necessary
    }

    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'member_id', 'id_member');
    // }

//     public function user()
//     {
//         return $this->belongsTo(User::class, 'user_id', 'id_user');
//     }

}
