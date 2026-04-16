<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;
use App\Models\Patient;
use App\Models\Drug;

class TreatmentSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();
        $drugs = Drug::all();

        if ($patients->count() == 0 || $drugs->count() == 0) {
            return;
        }

        Treatment::insert([
            [
                'patient_id' => $patients[0]->id,
                'drug_id' => $drugs[0]->id,
                'dosage' => '2 times daily',
                'date' => now(),
                'notes' => 'Take after meals',
            ],
            [
                'patient_id' => $patients[1]->id,
                'drug_id' => $drugs[2]->id,
                'dosage' => '1 tablet daily',
                'date' => now(),
                'notes' => 'For headache',
            ],
            [
                'patient_id' => $patients[2]->id,
                'drug_id' => $drugs[1]->id,
                'dosage' => '3 times daily',
                'date' => now(),
                'notes' => 'Complete full dose',
            ],
        ]);
    }
}