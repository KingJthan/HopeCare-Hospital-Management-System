@extends('public.layout')

@section('title', 'Services | HopeCare Hospital')

@section('content')
    <section class="page-hero">
        <div class="container page-hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="eyebrow">Clinical excellence</div>
                    <h1 class="page-title text-white mb-4">Integrated services for a modern hospital experience.</h1>
                    <p class="lead-copy mb-0">
                        HopeCare combines patient intake, treatment coordination, medication records, and secure digital access
                        into one carefully organized workflow.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-card" style="min-height: 360px;">
                        <img src="{{ asset('images/ambulence-team.jpg') }}" alt="HopeCare ambulance response team">
                        <div class="hero-card-caption">
                            <h5 class="fw-bold mb-2">Connected care teams</h5>
                            <p class="mb-0">Better communication from reception to consultation and follow-up.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/ambulence-1.jpg') }}" alt="Ambulance emergency response">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Emergency care</div>
                            <h4 class="card-title">Rapid intake support</h4>
                            <p class="card-copy mb-0">
                                Keep urgent patient handling organized with fast registration, token support, and clear queue visibility.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/doctors.jpg') }}" alt="Doctor consultation service">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Consultation</div>
                            <h4 class="card-title">Doctor-led treatment records</h4>
                            <p class="card-copy mb-0">
                                Doctors can add and manage treatment notes, dosage, medications, and visit dates from a secure dashboard.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/ehr.jpg') }}" alt="Electronic health record">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Reports</div>
                            <h4 class="card-title">Medicine and category control</h4>
                            <p class="card-copy mb-0">
                                Organize drugs by category, track stock levels, and connect medicines to treatment plans.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/reception.jpg') }}" alt="Hospital reception desk">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Reception</div>
                            <h4 class="card-title">Patient registration and tokens</h4>
                            <p class="card-copy mb-0">
                                Reception staff can register patients, assign service tokens, and print token slips for smoother flow.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/prayer.jpg') }}" alt="Patient support and comfort">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Patient portal</div>
                            <h4 class="card-title">Private personal access</h4>
                            <p class="card-copy mb-0">
                                Patients can log in securely to view their own treatment history and token details.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card with-media">
                        <div class="card-media">
                            <img src="{{ asset('images/team-happy.jpg') }}" alt="Hospital team coordination">
                        </div>
                        <div class="card-content">
                            <div class="card-kicker">Administration</div>
                            <h4 class="card-title">Operational oversight</h4>
                            <p class="card-copy mb-0">
                                Admin teams can monitor patients, drugs, categories, treatments, and role-based hospital activity.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="eyebrow">Better service delivery</div>
                    <h2 class="section-title mb-3">A professional system for real hospital coordination.</h2>
                    <p class="lead-copy">
                        Every service area is supported by role-aware access so the right person sees the right tools at the right time.
                    </p>
                    <a href="{{ route('pathways') }}" class="btn btn-hc-primary">See How Care Flows</a>
                </div>
                <div class="col-lg-6">
                    <div class="image-panel">
                        <img src="{{ asset('images/hope.jpg') }}" alt="HopeCare coordinated hospital support">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
