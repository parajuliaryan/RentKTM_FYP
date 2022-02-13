<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable=[
        'room_description',
        'room_type',
        'room_price',
        'contact_number',
        'city',
        'ward',
        'area',
        'tole',
        
    ];
}
