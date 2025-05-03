<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scroll_number',
        'status',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
