<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutikaryawan extends Model
{
    use HasFactory;

    protected $table = 'cutikaryawans';

    protected $fillable = [
        'nama_karyawan',
        'divisi',
        'jabatan',
        'tanggal_cuti',
        'alasan'
    ];
}
