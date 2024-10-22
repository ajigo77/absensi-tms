<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'member_id',
        'password',
        'jabatan_id',
        'status',
        'name',
        'divisi_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Relasi ke Devisi
    public function devisi()
    {
        return $this->belongsTo(Devisi::class, 'divisi_id', 'id_divisi');
    }

    // Relasi ke Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id_jabatan');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member');
    }

    public function getUserName(): string
    {
        $member = $this->member;
        return $member ? $member->nama : 'Default User';
    }

    public function hasPermission($permission)
    {
        $userPermissions = $this->permissions()->pluck('permissions')->flatten()->toArray();
        return in_array($permission, $userPermissions);
    }

    // Menyatakan bahwa member_id akan digunakan sebagai field login
    public function getAuthIdentifierName()
    {
        return 'member_id';
    }

    // Relasi ke Absens
    public function absens()
    {
        return $this->hasMany(Absen::class, 'user_id', 'id_user');
    }

    // Relasi ke CutiKaryawan
    public function cutiKaryawan()
    {
        return $this->hasMany(Cutikaryawan::class, 'user_id', 'id_user');
    }
}