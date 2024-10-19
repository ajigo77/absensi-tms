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
        'dari_tanggal',
        'sampai_tanggal',
        'jam_pulang_awal',
        'alasan',
        'sampai_tanggal',
        'approved',
    ];

    // public function JenisIzin(){
    //     $this->belongsTo(Jenisizin::class, 'id_jenis_izin', 'id');
    // }

    // public function Divisi(){
    //     $this->belongsTo(Devisi::class, 'divisi_id', 'id_divisi');
    // }

    // public function Jabatan(){
    //     $this->belongsTo(Jabatan::class, 'jabatan_id', 'id_jabatan');
    // }
}
