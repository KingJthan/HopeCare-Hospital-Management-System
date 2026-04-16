<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drug;
use App\Models\Category;

class DrugSeeder extends Seeder
{
    public function run(): void
    {
        $antibiotics = Category::where('name', 'Antibiotics')->first()->id;
        $painkillers = Category::where('name', 'Painkillers')->first()->id;
        $vitamins = Category::where('name', 'Vitamins')->first()->id;

        Drug::insert([
            ['name' => 'Amoxicillin', 'category_id' => $antibiotics, 'price' => 12.50, 'stock' => 100],
            ['name' => 'Ciprofloxacin', 'category_id' => $antibiotics, 'price' => 15.00, 'stock' => 80],
            ['name' => 'Paracetamol', 'category_id' => $painkillers, 'price' => 5.00, 'stock' => 200],
            ['name' => 'Ibuprofen', 'category_id' => $painkillers, 'price' => 7.50, 'stock' => 150],
            ['name' => 'Vitamin C', 'category_id' => $vitamins, 'price' => 8.00, 'stock' => 120],
        ]);
    }
}