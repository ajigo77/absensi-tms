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
    protected $fillable = [
        'member_id',
        'password',
        'jabatan_id',
<<<<<<< HEAD
        'divisi_id',
=======
        'status',
        'name', // Add 'name' if not already present
>>>>>>> Senj
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Menyatakan bahwa id_member akan digunakan sebagai field login
    public function getAuthIdentifierName()
    {
        return 'id_member';
    }
    //soal cari relasi ini 😈
    public function Member(){
        return $this->belongsTo(Member::class, 'member_id','id_member');
    }
    //relasi kan bahwa user hanya meiliki 1 Divisi
    public function Devisi(){
        return $this->belongsTo(Devisi::class,'divisi_id','id_divisi');
    }
    //relasi kan bahwa user hanya memiliki 1 Jabatan
    public function Jabatan(){
        return $this->belongsTo(Jabatan::class ,'jabatan_id','id_jabatan');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
