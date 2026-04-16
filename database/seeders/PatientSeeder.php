<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::insert([
            ['name' => 'John Carter', 'gender' => 'Male', 'age' => 34, 'phone' => '555-1201', 'address' => 'Newark'],
            ['name' => 'Mary Johnson', 'gender' => 'Female', 'age' => 29, 'phone' => '555-1202', 'address' => 'East Orange'],
            ['name' => 'Daniel Smith', 'gender' => 'Male', 'age' => 41, 'phone' => '555-1203', 'address' => 'Irvington'],
            ['name' => 'Linda Brown', 'gender' => 'Female', 'age' => 37, 'phone' => '555-1204', 'address' => 'Orange'],
            ['name' => 'James Wilson', 'gender' => 'Male', 'age' => 50, 'phone' => '555-1205', 'address' => 'Newark'],
        ]);
    }
}