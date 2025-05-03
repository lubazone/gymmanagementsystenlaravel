<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'vendor',
        'amount',
        'phone',
        'address',
        'date',
        'quantity',
        'reminder',
        'reminderfirst',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
