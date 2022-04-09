<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoommateFeatures extends Model
{
    use HasFactory;
    protected $fillable = [
        'roommate_id',
        'feature',
    ];

    public function roommate(){
       return $this->belongsTo(Roommates::class);
    }
}
