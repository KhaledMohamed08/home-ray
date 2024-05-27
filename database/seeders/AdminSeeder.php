<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = [
            'name' => 'Super Admin',
            'phone' => '01010101010',
            'email' => 'superadmin@homelab.com',
            'password' => '123456',
            'role' => 'super_admin',
        ];

        Admin::create($super_admin);

        for ($i = 0; $i < 5; $i++) {
            Admin::create([
                'name' => 'Admin ' . $i,
                'phone' => '0102030405' . $i,
                'email' => 'admin' . $i . '@example.com',
                'password' => '123456',
                'role' => 'admin',
            ]);
        }
    }
}
