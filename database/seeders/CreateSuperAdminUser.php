<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSuperAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gatot Kaca',
            'email' => 'gatot@pcr.ac.id',
            'password' => Hash::make('gatotkaca'),
            'role' => 'Super Administrator',
        ]);

        User::create([
            'name' => 'Iza',
            'email' => 'iza@pcr.ac.id',
            'password' => Hash::make('iza123'),
            'role' => 'Administrator',
        ]);
    }
}
