<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_owner',
        'enquirer',
        'for_room'
    ];

    public function messages(){
        return $this->hasMany(ChatMessage::class);
    }

    public function adOwner(){
        return $this->hasOne(User::class, 'id', 'ad_owner');
    }

    public function adEnquirer(){
        return $this->hasOne(User::class, 'id', 'enquirer');
    }

    public function forRoom(){
        return $this->hasOne(Rooms::class, 'id', 'for_room');
    }


}
