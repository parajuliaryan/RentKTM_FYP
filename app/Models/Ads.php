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
        'roommate_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    public function roommate(){
        return $this->belongsTo(Roommates::class);
    }
}
