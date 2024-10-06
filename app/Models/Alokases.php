<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alokases extends Model
{
    use HasFactory;

    protected $tabel = 'lokasi';
    protected $fillable = ['latitude', 'longitude'];
}
