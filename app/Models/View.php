<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $table = 'absens'; // Specify the correct table name
    protected $primaryKey = 'id_absen'; // Specify the primary key

    protected $fillable = [
        'user_id',
        'type',
        'shift_id',
        'foto',
        'latitude',
        'longitude',
        'status',
    ];
}
