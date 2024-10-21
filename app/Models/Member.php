<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $tabel = 'members';

    protected $primaryKey = 'id_member';

    protected $fillable = ['id_member'];

    //soal cari relasi ini 😈
    public function User()
    {
        return $this->hasOne(User::class, 'member_id', 'id_member');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'member_id', 'id_member');
    }
}
