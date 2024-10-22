<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutikaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_karyawan', // Nama Karyawan
        'divisi', // Divisi
        'jabatan', // Jabatan
        'dari_tanggal', // Changed from 'tanggal_cuti' to 'dari_tanggal'
        'sampai_tanggal', // Added 'sampai_tanggal'
        'alasan', // Alasan
        'approved', // Status Persetujuan
    ];

    protected $casts = [
       'dari_tanggal' => 'date', // Tanggal Cuti
        'sampai_tanggal' => 'date', // Added for 'sampai_tanggal'
    ];
}
