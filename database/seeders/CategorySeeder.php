<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Antibiotics', 'description' => 'Treat bacterial infections'],
            ['name' => 'Painkillers', 'description' => 'Relieve pain'],
            ['name' => 'Vitamins', 'description' => 'Nutritional supplements'],
            ['name' => 'Antimalarials', 'description' => 'Treat malaria'],
        ]);
    }
}