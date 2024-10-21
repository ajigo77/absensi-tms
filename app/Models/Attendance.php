<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'absens'; // Nama tabel di database

    protected $primaryKey = 'id_absen'; // Mengatur primary key

    protected $fillable = [
        'nama',
        'member_id',
        'user_id',
        'type',
        'shift_id',
        'foto',
        'lattitude',
        'longtitude',
        'status',
    ];

    public $timestamps = true; // Jika Anda menggunakan timestamps

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id'); // Assuming you have a Shift model
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member'); // Ensure 'member_id' is correct
    }
}
