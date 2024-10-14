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
        'id_user',
        'member_id',
        'password',
        'divisi_id',
        'jabatan_id',
        'status',
        'name', // Add 'name' if not already present
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

//soal cari relasi ini 😈
    public function Member(){

    }
//relasi kan bahwa uswr hanya meiliki 1 Devisi
    public function Devisi(){
        return $this->belongsTo(Devisi::class);
    }
//relasi kan bahwa user hanya memiliki 1 Jabatan
    public function Jabatan(){
        return $this->belongsTo(Jabatan::class ,'jabatan_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
