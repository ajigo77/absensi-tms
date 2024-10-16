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
        'member_id',
        'type',
        'shift_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true; // Jika Anda menggunakan timestamps

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id'); // Assuming you have a Shift model
    }
}
