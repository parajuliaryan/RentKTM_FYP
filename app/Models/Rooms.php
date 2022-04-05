<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable=[
        'room_title',
        'room_description',
        'room_type',
        'room_price',
        'student_price',
        'contact_number',
        'city',
        'ward',
        'area',
        'tole',
    ];

    public function image(){
        return $this->hasMany(RoomImages::class, 'room_id');
    }

    public function ads(){
        return $this->belongsTo(Ads::class);
    }

    public function Review(){
        return $this->hasMany(RatingReview::class,'room_id');
    }
}
