<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $tabel = 'users';
    protected $primaryKey = 'id_user'; // Jika primary key adalah id_user
    protected $fillable = [
        'member_id',
        'password',
        'jabatan_id',
        'divisi_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    // Menyatakan bahwa member_id akan digunakan sebagai field login
    public function getAuthIdentifierName()
    {
        return 'member_id';
    }
    //soal cari relasi ini 😈
    public function Member(){
        return $this->belongsTo(Member::class, 'member_id','id_member');
    }
    //relasi kan bahwa user hanya meiliki 1 Divisi
    public function Devisi(){
        return $this->belongsTo(Devisi::class,'divisi_id','id_divisi');
    }
    public function Absens(){
        return $this->hasMany(Absen::class ,'user_id','id_user');
    }
    //relasi kan bahwa user hanya memiliki 1 Jabatan
    public function Jabatan(){
        return $this->belongsTo(Jabatan::class ,'jabatan_id','id_jabatan');
    }

    // Relasi ke model cutikaryawan
    public function CutiKaryawan(){
       return $this->hasMany(Cutikaryawan::class, 'user_id', 'id_user');
    }
}
