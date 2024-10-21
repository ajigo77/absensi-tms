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
        'dari_tanggal',
        'alasan',
        'sampai_tanggal',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
