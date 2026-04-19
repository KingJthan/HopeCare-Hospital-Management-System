@extends('public.layout')

@section('title', 'Care Pathways | HopeCare Hospital')

@section('content')
    <section class="page-hero">
        <div class="container page-hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="eyebrow">Patient journey</div>
                    <h1 class="page-title text-white mb-4">Clear pathways from arrival to follow-up.</h1>
                    <p class="lead-copy mb-0">
                        HopeCare is structured around simple, role-based journeys that help staff work faster and help patients
                        understand what happens next.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-card" style="min-height: 360px;">
                        <img src="{{ asset('images/walk-way.jpg') }}" alt="HopeCare patient walkway">
                        <div class="hero-card-caption">
                            <h5 class="fw-bold mb-2">From queue to care</h5>
                            <p class="mb-0">Every stage is connected through secure digital access.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="path-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/reception.jpg') }}" alt="Patient arrival at reception">
                        </div>
                        <div class="card-content">
                            <span class="number-step">1</span>
                            <h5 class="card-title">Patient arrives</h5>
                            <p class="card-copy mb-0">
                                Reception registers the patient and confirms contact information for hospital records.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="path-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/nurse-smile.jpg') }}" alt="Nurse guiding patient flow">
                        </div>
                        <div class="card-content">
                            <span class="number-step">2</span>
                            <h5 class="card-title">Token is assigned</h5>
                            <p class="card-copy mb-0">
                                Staff generate a service token so the patient can be handled in an orderly queue.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="path-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/talk-to-doctor.jpg') }}" alt="Treatment consultation">
                        </div>
                        <div class="card-content">
                            <span class="number-step">3</span>
                            <h5 class="card-title">Treatment is recorded</h5>
                            <p class="card-copy mb-0">
                                Doctors connect the patient with medication, dosage, notes, and visit dates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="path-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/your-report.jpg') }}" alt="Patient report follow up">
                        </div>
                        <div class="card-content">
                            <span class="number-step">4</span>
                            <h5 class="card-title">Patient follows up</h5>
                            <p class="card-copy mb-0">
                                Patients log in securely to view their own treatment and token information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-band">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/clean.jpg') }}" alt="Clean reception pathway">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Reception pathway</div>
                            <h4 class="card-title">Front desk efficiency</h4>
                            <p class="card-copy mb-0">
                                Receptionists can focus on registration, token handling, and queue visibility without entering clinical-only workflows.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/doctors.jpg') }}" alt="Doctor pathway">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Doctor pathway</div>
                            <h4 class="card-title">Clinical clarity</h4>
                            <p class="card-copy mb-0">
                                Doctors see the tools they need for treatment and medication coordination, with less noise from unrelated tasks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/baby-patient.jpg') }}" alt="Patient pathway">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Patient pathway</div>
                            <h4 class="card-title">Secure self-service</h4>
                            <p class="card-copy mb-0">
                                Patients enter their own portal after email verification and only access personal information linked to their account.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('staff.register') }}" class="btn btn-hc-primary me-sm-2 mb-2">Register Staff</a>
                <a href="{{ route('login.patient') }}" class="btn btn-hc-outline mb-2">Patient Portal</a>
            </div>
        </div>
    </section>
@endsection
