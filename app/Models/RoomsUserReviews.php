<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsUserReviews extends Model
{
    use HasFactory;
    protected $fillable=[
        'room_id',
        'review_id',
        'user_id'
    ];
}
