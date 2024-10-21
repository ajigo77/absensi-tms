<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;


    protected $primaryKey= "id_member";
    protected $table = 'members'; // Corrected 'tabel' to 'table'

    protected $fillable = [
        'nama', // Ensure this is included
        // other fields...
    ];

    //soal cari relasi ini 😈
    public function User(){

    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_member', 'id'); // If a member can have multiple users
    }
}
