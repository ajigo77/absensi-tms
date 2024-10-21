<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';

    protected $fillable = ['user_id', 'type', 'shift_id', 'foto', 'lattitude', 'longtitude', 'status'];

    // Relasi ke model Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id'); // Ensure 'shift_id' is correct
    }

    // Method to get attendance statistics
    public static function getStats()
    {
        $today = Carbon::today();

        return [
            'masuk' => self::where('type', 'masuk')->count(),
            'terlambat' => self::where('type', 'terlambat')->count(),
            'lembur' => self::where('type', 'lembur')->count(),
            'tidak_masuk' => self::where('type', 'tidak masuk')->count(),
        ];
    }

    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'member_id', 'id_member');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

}
