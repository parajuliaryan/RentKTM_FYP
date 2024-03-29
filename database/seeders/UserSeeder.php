<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_type' => 'admin',
            'first_name' => 'Super',
            'last_name'=>'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);
    }
}
