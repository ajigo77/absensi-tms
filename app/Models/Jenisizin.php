<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisizin extends Model
{
    use HasFactory;

    protected $table = 'jenis_izin';

    protected $primaryKey = 'id';

    // public function Izinkaryawan(){
    //     return $this->hasMany(Izinkaryawans::class,'id_jenis_izin','id');
    // }
}
