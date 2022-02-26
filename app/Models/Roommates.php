<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roommates extends Model
{
    use HasFactory;
    protected $fillable = [
        'roommate_name',
        'roommate_age',
        'roommate_rent_price',
        'roommate_description',
        'roommate_features',
        'gender',
        'contact_number',
        'city',
        'ward',
        'area',
        'tole',
        'roommate_image'
    ];
}
