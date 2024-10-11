<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    use HasFactory;

    protected $table = 'divisis';

    protected $primaryKey = 'id_divisi';

    // protected $fillable = [

    // ];

    //relasi kan bahwa devisi memiliki banyak user
    public function User(){
        // return $this->belongsTo(User::class);
        return $this->hasMany(User::class, 'divisi_id', 'id_divisi');
    }

}
