<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Nur Aisyah',
            'email' => 'nraisyahh05@gmail.com',
            'role' => 'Super Administrator',
            'profil' => 'default.png', // tambahkan ini
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
