<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_category',
        'registration_fee',
        'id_card',
        'monthly_fee',
    ];
}
