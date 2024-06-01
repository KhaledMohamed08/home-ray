<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $category = Category::where('name', 'nursing')->first();
            Service::create([
                'name' => $category->name  . ' ' . $i + 1,
                'price' => rand(100, 999),
                'category_id' => $category->id,
            ]);
        }
        
        for ($i = 0; $i < 5; $i++) {
            $category = Category::where('name', 'radiology')->first();
            Service::create([
                'name' => $category->name . ' ' . $i + 1,
                'price' => rand(100, 999),
                'category_id' => $category->id,
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            $category = Category::where('name', 'analysis')->first();
            Service::create([
                'name' => $category->name  . ' ' . $i + 1,
                'price' => rand(100, 999),
                'category_id' => $category->id,
            ]);
        }
    }
}
