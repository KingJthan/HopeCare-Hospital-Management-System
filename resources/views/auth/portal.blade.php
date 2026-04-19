@extends('public.layout')

@section('title', 'HopeCare Hospital | Modern Digital Care')

@section('content')
    <section class="hero-shell">
        <div class="container hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="eyebrow">Hospital management reimagined</div>
                    <h1 class="display-title text-white mb-4">Modern care with secure digital access.</h1>
                    <p class="lead-copy mb-4">
                        HopeCare Hospital brings patients, doctors, reception teams, and administrators into one polished
                        digital workflow for better coordination, safer access, and faster service.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 mb-5">
                        <a href="{{ route('login.patient') }}" class="btn btn-hc-gold">Enter Patient Portal</a>
                        <a href="{{ route('staff.register') }}" class="btn btn-hc-primary">Register Staff Account</a>
                        <a href="{{ route('location') }}" class="btn btn-hc-outline">Get Directions</a>
                    </div>

                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <div class="metric-card">
                                <div class="metric-number">24/7</div>
                                <div class="metric-label">Emergency access</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="metric-card">
                                <div class="metric-number">Home</div>
                                <div class="metric-label">Care support</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="metric-card">
                                <div class="metric-number">Fast</div>
                                <div class="metric-label">Token workflow</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image-card">
                        <img src="{{ asset('images/hope.jpg') }}" alt="HopeCare hospital team">
                        <div class="hero-card-caption">
                            <h5 class="fw-bold mb-2">International-quality digital care</h5>
                            <p class="mb-0">
                                A clean, secure experience for every hospital role from first contact to treatment follow-up.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="photo-band">
                <div class="photo-band-card">
                    <img src="{{ asset('images/baby-patient.jpg') }}" alt="Baby patient care">
                    <div class="photo-band-label">Family-centered patient care</div>
                </div>
                <div class="photo-band-card">
                    <img src="{{ asset('images/reception.jpg') }}" alt="Hospital reception">
                    <div class="photo-band-label">Premium front desk experience</div>
                </div>
                <div class="photo-band-card">
                    <img src="{{ asset('images/talk-to-doctor.jpg') }}" alt="Doctor consultation">
                    <div class="photo-band-label">Doctor consultation pathways</div>
                </div>
                <div class="photo-band-card">
                    <img src="{{ asset('images/your-report.jpg') }}" alt="Patient report review">
                    <div class="photo-band-label">Clear digital reports</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-end g-4 mb-4">
                <div class="col-lg-7">
                    <div class="eyebrow">Core services</div>
                    <h2 class="section-title">Designed for the realities of hospital work.</h2>
                </div>
                <div class="col-lg-5">
                    <p class="lead-copy mb-0">
                        From emergency access to treatment records, HopeCare helps teams stay organized while patients receive
                        clear, private digital support.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/ambulence-team.jpg') }}" alt="Ambulance response team">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Emergency</div>
                            <h5 class="card-title">Rapid front desk support</h5>
                            <p class="card-copy mb-0">Support urgent intake, token handling, and patient flow with a focused digital process.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/doctors.jpg') }}" alt="Doctors supporting care">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Clinical</div>
                            <h5 class="card-title">Treatment management</h5>
                            <p class="card-copy mb-0">Doctors can manage treatment entries with patient and medication details in one place.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/ehr.jpg') }}" alt="Electronic health record">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Records</div>
                            <h5 class="card-title">Medication coordination</h5>
                            <p class="card-copy mb-0">Organize drug records, categories, stock details, and treatment-linked medicine data.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/patient-care.jpg') }}" alt="Patient care support">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Privacy</div>
                            <h5 class="card-title">Patient self-service</h5>
                            <p class="card-copy mb-0">Patients can securely view their own token and treatment information after email verification.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('services') }}" class="btn btn-hc-primary">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="section soft-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="image-grid">
                        <div class="image-panel image-panel-tall">
                            <img src="{{ asset('images/walk-way.jpg') }}" alt="HopeCare patient walkway">
                        </div>
                        <div class="image-panel image-panel-sm">
                            <img src="{{ asset('images/team.jpg') }}" alt="HopeCare care team">
                        </div>
                        <div class="image-panel image-panel-sm">
                            <img src="{{ asset('images/doctor-nurse-celebrate.jpg') }}" alt="Doctor and nurse celebration">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="eyebrow">Care pathways</div>
                    <h2 class="section-title mb-4">A clearer journey for patients and staff.</h2>
                    <div class="d-grid gap-3">
                        <div class="path-card">
                            <span class="number-step">1</span>
                            <h5 class="card-title">Patients receive tokens automatically</h5>
                            <p class="card-copy mb-0">Front desk teams can register patients and keep the queue moving.</p>
                        </div>
                        <div class="path-card">
                            <span class="number-step">2</span>
                            <h5 class="card-title">Doctors record treatments</h5>
                            <p class="card-copy mb-0">Clinical teams connect patients, drugs, dosage, notes, and dates.</p>
                        </div>
                        <div class="path-card">
                            <span class="number-step">3</span>
                            <h5 class="card-title">Patients access personal updates</h5>
                            <p class="card-copy mb-0">Patients see their own information only after secure login and email verification.</p>
                        </div>
                    </div>
                    <a href="{{ route('pathways') }}" class="btn btn-hc-primary mt-4">View Care Pathways</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="eyebrow">Visit HopeCare</div>
                    <h2 class="section-title mb-3">Find us in Newark and get directions instantly.</h2>
                    <p class="lead-copy mb-0">
                        The Location page includes a live map and a directions button that opens Google Maps with HopeCare's
                        destination ready for the visitor.
                    </p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a href="{{ route('location') }}" class="btn btn-hc-gold me-sm-2 mb-2">Open Location Page</a>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Newark%2C%20New%20Jersey" target="_blank" rel="noopener" class="btn btn-hc-outline mb-2">Get Directions</a>
                </div>
            </div>
        </div>
    </section>
@endsection
