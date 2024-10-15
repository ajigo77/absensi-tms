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
        return $this->belongsTo(User::class, 'user_id'); // Adjust 'member_id' to the actual foreign key if different
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id'); // Assuming you have a Shift model
    }
}
