<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'maker1',
            'email' => 'maker@test.com',
            'password' => Hash::make('password'),
            'role' => 'maker',
            'credit' => 100,
            'verification' => true,
        ]);

        User::create([
            'username' => 'koper1',
            'email' => 'koper@test.com',
            'password' => Hash::make('password'),
            'role' => 'koper',
            'credit' => 500,
            'verification' => false,
        ]);
    }
}
