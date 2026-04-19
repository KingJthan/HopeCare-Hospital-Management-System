<?php

namespace Tests\Feature;

use App\Mail\SendOtpMail;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PatientRegistrationTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_registration_assigns_token_immediately(): void
    {
        Mail::fake();

        $response = $this->post(route('register.store'), [
            'name' => 'Grace Patient',
            'email' => 'grace.patient@example.com',
            'gender' => 'Female',
            'age' => 31,
            'phone' => '555-0101',
            'address' => 'Newark',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $response->assertRedirect(route('verify.notice'));

        $patient = Patient::where('name', 'Grace Patient')->firstOrFail();

        $this->assertSame('F001', $patient->token_number);
        Mail::assertSent(SendOtpMail::class);
    }
}
