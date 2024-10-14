<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office',
        'wfa',
        'shift_start',
        'shift_end',
    ];

    protected $casts = [
        'wfa' => 'boolean',
        'shift_start' => 'datetime',
        'shift_end' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getShiftStartAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('h:i A');
    }

    public function setShiftStartAttribute($value)
    {
        $this->attributes['shift_start'] = Carbon::createFromFormat('h:i A', $value)->format('H:i:s');
    }

    public function getShiftEndAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('h:i A');
    }

    public function setShiftEndAttribute($value)
    {
        $this->attributes['shift_end'] = Carbon::createFromFormat('h:i A', $value)->format('H:i:s');
    }
}
