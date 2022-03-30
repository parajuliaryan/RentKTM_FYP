<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'room_type' => '1BHK',
        ]);
        RoomType::create([
            'room_type' => '2BHK',
        ]);
        RoomType::create([
            'room_type' => '3BHK',
        ]);
        RoomType::create([
            'room_type' => 'House',
        ]);
        RoomType::create([
            'room_type' => 'Apartment',
        ]);
    }
}
