<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts'; // Table name
    protected $primaryKey = 'id'; // Primary key (ensure this matches your database)

    protected $fillable = ['name', 'start_time', 'end_time', 'created_at', 'updated_at']; // Adjusted fillable fields

    // protected $casts = [
    //     'start_time' => 'datetime',
    //     'end_time' => 'datetime',
    // ];

    public function setStartTimeAttribute($value)
    {
        if (is_array($value) && isset($value['hour']) && isset($value['ampm'])) {
            $this->attributes['start_time'] = Carbon::createFromFormat(
                'h A',
                $value['hour'] . ' ' . $value['ampm']
            )->format('H:i:s');
        } elseif (is_string($value)) {
            $this->attributes['start_time'] = $value;
        }
    }

    public function setEndTimeAttribute($value)
    {
        if (is_array($value) && isset($value['hour']) && isset($value['ampm'])) {
            $this->attributes['end_time'] = Carbon::createFromFormat(
                'h A',
                $value['hour'] . ' ' . $value['ampm']
            )->format('H:i:s');
        } elseif (is_string($value)) {
            $this->attributes['end_time'] = $value;
        }
    }

    // Relationship to the Absen model
    public function absens()
    {
        return $this->hasMany(Absen::class, 'shift_id');
    }
}
