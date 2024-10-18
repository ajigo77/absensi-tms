<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';

    protected $fillable = ['user_id', 'type', 'shift_id', 'foto', 'lattitude', 'longtitude', 'status', 'member_id'];

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

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member');
    }
}
