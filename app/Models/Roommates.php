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
        'gender',
        'contact_number',
        'city',
        'ward',
        'area',
        'tole',
        'roommate_image'
    ];

    public function features(){
        $this->hasMany(RoommateFeatures::class, 'roommate_id');
    }
}
