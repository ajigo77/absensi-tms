<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Izinkaryawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_izin',
        'nama_karyawan',
        'divisi',
        'jabatan', 
        'tanggal_izin',
        'jam_pulang_awal',
        'alasan',
        'approved', // Tambahkan kolom approved
        'signature', // Tambahkan kolom signature
    ];
}
