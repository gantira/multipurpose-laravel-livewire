<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'time',
        'status',
        'note',
    ];

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'SCHEDULED' => 'primary',
            'CLOSED' => 'success',
        ];

        return $badges[$this->status];
    }
}
