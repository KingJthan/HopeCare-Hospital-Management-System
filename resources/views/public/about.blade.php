@extends('public.layout')

@section('title', 'About | HopeCare Hospital')

@section('content')
    <section class="page-hero">
        <div class="container page-hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="eyebrow">About HopeCare</div>
                    <h1 class="page-title text-white mb-4">A professional digital hospital built around trust.</h1>
                    <p class="lead-copy mb-0">
                        HopeCare Hospital is designed to make healthcare access feel organized, secure, and internationally professional
                        for both patients and staff.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-card" style="min-height: 360px;">
                        <img src="{{ asset('images/doctor-nurse-celebrate.jpg') }}" alt="HopeCare clinical team celebrating">
                        <div class="hero-card-caption">
                            <h5 class="fw-bold mb-2">Care with confidence</h5>
                            <p class="mb-0">A people-first hospital experience supported by better digital systems.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="eyebrow">Our purpose</div>
                    <h2 class="section-title mb-4">Better coordination. Safer access. More human care.</h2>
                    <p class="lead-copy">
                        HopeCare connects core hospital functions in one accessible system. The goal is simple:
                        reduce confusion, support staff efficiency, and give patients a cleaner way to engage with their care.
                    </p>
                    <p class="lead-copy mb-0">
                        The platform supports role-specific dashboards, email verification, patient privacy, token workflow,
                        drug records, and treatment management.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="image-panel">
                        <img src="{{ asset('images/hope.jpg') }}" alt="HopeCare community and hospital team">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-band">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="story-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/your-report.jpg') }}" alt="Secure patient report">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Trust</div>
                            <h4 class="card-title">Secure by role</h4>
                            <p class="card-copy mb-0">
                                Different users access different tools, helping keep patient information focused and protected.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="story-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/reception.jpg') }}" alt="Reception service">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Service</div>
                            <h4 class="card-title">Built for speed</h4>
                            <p class="card-copy mb-0">
                                Reception, clinical, and pharmacy workflows are arranged to reduce delays and improve coordination.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="story-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/nurse-smile.jpg') }}" alt="Professional care quality">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Quality</div>
                            <h4 class="card-title">Professional presentation</h4>
                            <p class="card-copy mb-0">
                                HopeCare is designed to feel polished, clear, and credible for an international hospital audience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-3 col-6">
                    <div class="metric-card text-center">
                        <div class="metric-number">24/7</div>
                        <div class="metric-label">Emergency readiness</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="metric-card text-center">
                        <div class="metric-number">Home</div>
                        <div class="metric-label">Care planning</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="metric-card text-center">
                        <div class="metric-number">Safe</div>
                        <div class="metric-label">Email checks</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="metric-card text-center">
                        <div class="metric-number">Fast</div>
                        <div class="metric-label">Token handling</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
