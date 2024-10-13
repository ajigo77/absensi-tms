<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izinkaryawans extends Model
{
    use HasFactory;

    protected $table = 'izinkaryawans';

    protected $fillable = [
        'jenis_izin',
        'nama_karyawan',
        'divisi',
        'jabatan',
        'tanggal_izin',
        'jam_pulang_awal',
        'alasan',
    ];
}
