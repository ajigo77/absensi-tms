<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;


    protected $primaryKey= "id_member";
    protected $tabel = 'members';

    //soal cari relasi ini 😈
    public function User(){

    }
}
