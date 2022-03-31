<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'image_url',
        'room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
