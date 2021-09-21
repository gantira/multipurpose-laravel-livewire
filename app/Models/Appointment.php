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
        'date' => 'datetime'
    ];
}
