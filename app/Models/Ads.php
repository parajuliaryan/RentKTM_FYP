<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable=[
        'ad_type',
        'user_id',
        'room_id',
        'roommate_id'
    ];
}
