<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Brandon',
            'username' => 'baron',
            'email' => 'baron@gmail.com',
            'password' => Hash::make('baronForger'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory(5)->create();
    }
}
