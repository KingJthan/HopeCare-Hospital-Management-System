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

    public function test_patient_registration_assigns_token_immediately_for_multiple_patients(): void
    {
        Mail::fake();

        $firstResponse = $this->post(route('register.store'), [
            'name' => 'Grace Patient',
            'email' => 'grace.patient@example.com',
            'gender' => 'Female',
            'age' => 31,
            'phone' => '555-0101',
            'address' => 'Newark',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $firstResponse->assertRedirect(route('verify.notice'));

        $secondResponse = $this->post(route('register.store'), [
            'name' => 'Daniel Patient',
            'email' => 'daniel.patient@example.com',
            'gender' => 'Male',
            'age' => 42,
            'phone' => '555-0102',
            'address' => 'Irvington',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $secondResponse->assertRedirect(route('verify.notice'));

        $firstPatient = Patient::where('name', 'Grace Patient')->firstOrFail();
        $secondPatient = Patient::where('name', 'Daniel Patient')->firstOrFail();

        $this->assertSame('F001', $firstPatient->token_number);
        $this->assertSame('F002', $secondPatient->token_number);
        Mail::assertSent(SendOtpMail::class, 2);
    }
}
