<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role', 'permissions'];

    // Define constants for roles
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';

    public function user()
    {
        return $this->belongsTo(User::class); // Adjust this if necessary
    }

    // Method to check if a role has a specific permission
    public function hasPermission($permission)
    {
        $permissions = json_decode($this->permissions, true);
        return in_array($permission, $permissions);
    }
}
