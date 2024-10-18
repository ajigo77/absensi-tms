<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class, 'name', 'name');
    }
}
