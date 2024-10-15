<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Image as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Image extends Model
{
    /**
     * JIE INI APA MASA ADA API TOKEN
     * Sama authenticable
     *  Sama notfilable
     *  Berarti INi bisa Login
     *
     */
    use HasApiTokens, HasFactory, Notifiable;

    protected $tabel = 'images';
    protected $fillable = ['image_path'];  // Sesuaikan nama kolomnya
}
