<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutikaryawan extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'cutikaryawans';

    protected $fillable = [
        'nama_karyawan',
        'divisi',
        'jabatan',
        'tanggal_cuti',
        'alasan'
=======
    protected $fillable = [
        'nama_karyawan', // Nama Karyawan
        'divisi', // Divisi
        'jabatan', // Jabatan
        'tanggal_cuti', // Tanggal Cuti
        'alasan', // Alasan
        'approved', // Status Persetujuan
    ];

    protected $casts = [
        'tanggal_cuti' => 'date', // Tanggal Cuti
>>>>>>> Senj
    ];
}
