<?php

namespace Tests\Feature;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NowServingQueueTest extends TestCase
{
    use RefreshDatabase;

    public function test_queue_token_and_doctor_can_be_updated_from_now_serving(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        $doctor = User::factory()->create([
            'role' => 'doctor',
            'email_verified_at' => now(),
        ]);
        $patient = Patient::create([
            'name' => 'Queue Patient',
            'gender' => 'Female',
            'age' => 29,
            'phone' => '555-0199',
            'address' => 'Newark',
            'token_number' => 'F001',
        ]);

        $response = $this->actingAs($admin)->patch(route('patients.updateQueue', $patient), [
            'token_number' => '12',
            'assigned_doctor_id' => $doctor->id,
        ]);

        $response->assertRedirect(route('patients.nowServing'));

        $this->assertDatabaseHas('patients', [
            'id' => $patient->id,
            'token_number' => 'F012',
            'assigned_doctor_id' => $doctor->id,
        ]);
    }
}
