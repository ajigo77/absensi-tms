<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

//secara default laravel menggunakan id jadi harus ganti ke yang sesua dengan di database

    protected $primaryKey = 'id_jabatan';

    protected $tabel = 'jabatans';


    protected $fillable=[

    ];

//relasi kan bahwa Jabatan memiliki banyak user
    public function User(){
        return $this->hasMany(User::class);
    }

}
