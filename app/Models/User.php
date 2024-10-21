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

    protected $table = 'users';
    protected $primaryKey = 'id_user';
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


//soal cari relasi ini 😈
//relasi kan bahwa uswr hanya meiliki 1 Devisi
    public function devisi()
    {
        return $this->belongsTo(Devisi::class);
    }
//relasi kan bahwa user hanya memiliki 1 Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function user()
       {
           return $this->belongsTo(User::class, 'id_member', 'id'); // Sesuaikan dengan kolom yang relevan
       }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member'); // Pastikan 'member_id' dan 'id_member' sesuai
    }

    public function getUserName(): string
    {
        // Ambil nama dari relasi member
        $member = $this->member; // Mengambil relasi member
        return $member ? $member->nama : 'Default User'; // Mengembalikan nama atau nilai default
    }

    public function hasPermission($permission)
    {
        // Get the user's permissions
        $userPermissions = $this->permissions()->pluck('permissions')->flatten()->toArray();
        return in_array($permission, $userPermissions);
    }
}
