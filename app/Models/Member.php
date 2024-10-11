<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $tabel = 'members';

    protected $primaryKey= "id_member";

    // protected $fillable = [
    //     'id_member'
    // ];

    //soal cari relasi ini 😈
    public function User(){
        return $this->hasMany(User::class, 'member_id','id_member');
    }
}
