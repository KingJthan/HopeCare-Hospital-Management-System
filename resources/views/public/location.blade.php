@extends('public.layout')

@section('title', 'Location | HopeCare Hospital')

@section('content')
    <section class="page-hero">
        <div class="container page-hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="eyebrow">Visit us</div>
                    <h1 class="page-title text-white mb-4">Directions to HopeCare Hospital.</h1>
                    <p class="lead-copy mb-4">
                        Click the directions button to open Google Maps with HopeCare's destination ready, then choose your current
                        location for turn-by-turn directions.
                    </p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Newark%2C%20New%20Jersey" target="_blank" rel="noopener" class="btn btn-hc-gold">
                        Get Directions in Google Maps
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="direction-card with-media">
                        <div class="card-media" style="height: 240px;">
                            <img src="{{ asset('images/hope.jpg') }}" alt="HopeCare hospital location">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Hospital address</div>
                            <h4 class="card-title">HopeCare Hospital</h4>
                            <p class="card-copy mb-2">Newark, New Jersey</p>
                            <p class="card-copy mb-2">Phone: (973) 555-0199</p>
                            <p class="card-copy mb-0">Emergency and patient support: 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <iframe
                        class="map-frame"
                        src="https://www.google.com/maps?q=Newark%2C%20New%20Jersey&z=12&output=embed"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-lg-4">
                    <div class="direction-card with-media mb-4">
                        <div class="card-media">
                            <img src="{{ asset('images/reception.jpg') }}" alt="HopeCare reception entrance">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Quick action</div>
                            <h4 class="card-title">Need directions?</h4>
                            <p class="card-copy">
                                Tap the button below. Google Maps will open and ask for your starting point or use your device location.
                            </p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=Newark%2C%20New%20Jersey" target="_blank" rel="noopener" class="btn btn-hc-primary w-100">
                                Start Directions
                            </a>
                        </div>
                    </div>

                    <div class="direction-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/nurse-smile.jpg') }}" alt="Nurse ready to help visitors">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Access</div>
                            <h4 class="card-title">Plan your visit</h4>
                            <p class="card-copy mb-2">Emergency care is available all day.</p>
                            <p class="card-copy mb-2">Patients can register online before visiting.</p>
                            <p class="card-copy mb-3">Staff can use role-based portals for hospital workflows.</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('register') }}" class="btn btn-hc-outline">Register Patient</a>
                                <a href="{{ route('login.patient') }}" class="btn btn-hc-outline">Patient Portal</a>
                                <a href="{{ route('staff.register') }}" class="btn btn-hc-outline">Staff Access</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-band pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/baby-patient.jpg') }}" alt="Patient before arrival">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Patients</div>
                            <h4 class="card-title">Before arrival</h4>
                            <p class="card-copy">
                                Register online and check your portal after email verification for token and treatment information.
                            </p>
                            <a href="{{ route('register') }}" class="btn btn-hc-primary mt-3">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/ambulence-1.jpg') }}" alt="Ambulance urgent support">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Emergency</div>
                            <h4 class="card-title">Urgent support</h4>
                            <p class="card-copy">
                                Call the hospital directly for urgent support before traveling if immediate guidance is needed.
                            </p>
                            <a href="tel:9735550199" class="btn btn-hc-primary mt-3">Call Hospital</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/doctor-nurse-celebrate.jpg') }}" alt="Staff role access">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Staff</div>
                            <h4 class="card-title">Role access</h4>
                            <p class="card-copy">
                                Staff members can use the staff menu to access doctor, reception, and registration portals.
                            </p>
                            <a href="{{ route('staff.register') }}" class="btn btn-hc-primary mt-3">Open Staff Access</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
