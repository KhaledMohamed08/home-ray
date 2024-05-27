<?php

namespace Database\Seeders;

use App\Models\User;
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
            'first_name' => 'Khaled',
            'last_name' => 'Mohamed',
            'phone' => '01093833112',
            'address' => 'Cairo, Nasr City',
            'email' => 'khaledmohamed0796@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            // 'remember_token' => Str::random(10),
            'gender' => 'male',
            'age' => 30,
            'role' => 'patient'
        ]);

        User::factory(30)->create();
    }
}
