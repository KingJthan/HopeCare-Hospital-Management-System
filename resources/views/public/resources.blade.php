@extends('public.layout')

@section('title', 'Patient Resources | HopeCare Hospital')

@section('content')
    <section class="page-hero">
        <div class="container page-hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="eyebrow">Patient resources</div>
                    <h1 class="page-title text-white mb-4">Clear guidance before, during, and after your visit.</h1>
                    <p class="lead-copy mb-4">
                        Leading US hospitals make it easy to find appointments, billing help, medical records, privacy notices,
                        patient rights, and accessibility support. HopeCare now brings those essentials into one simple place.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="{{ route('register') }}" class="btn btn-hc-gold">Register As Patient</a>
                        <a href="{{ route('login.patient') }}" class="btn btn-hc-primary">Open Patient Portal</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-card" style="min-height: 360px;">
                        <img src="{{ asset('images/your-report.jpg') }}" alt="Patient reviewing hospital records">
                        <div class="hero-card-caption">
                            <h5 class="fw-bold mb-2">Your care, organized</h5>
                            <p class="mb-0">Find practical information and know what to expect at each stage of care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-end g-4 mb-4">
                <div class="col-lg-7">
                    <div class="eyebrow">Essentials</div>
                    <h2 class="section-title">What patients usually look for first.</h2>
                </div>
                <div class="col-lg-5">
                    <p class="lead-copy mb-0">
                        This page is informational for the HopeCare demo system, but it follows the structure patients expect
                        from modern hospital websites in the United States.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Appointments</div>
                        <h4 class="card-title">Plan your visit</h4>
                        <ul class="resource-list">
                            <li>Create or access your patient portal account.</li>
                            <li>Keep your phone number and address current.</li>
                            <li>Bring a valid photo ID and any current medication list.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Billing and insurance</div>
                        <h4 class="card-title">Understand visit costs</h4>
                        <ul class="resource-list">
                            <li>Ask reception which insurance details are needed.</li>
                            <li>Request an itemized statement for visit charges.</li>
                            <li>Ask about payment options before non-emergency care.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Medical records</div>
                        <h4 class="card-title">Access your information</h4>
                        <ul class="resource-list">
                            <li>Use the patient portal for token and treatment updates.</li>
                            <li>Ask the front desk how to request formal record copies.</li>
                            <li>Review your information and report corrections promptly.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Privacy</div>
                        <h4 class="card-title">Health information protection</h4>
                        <ul class="resource-list">
                            <li>HopeCare limits patient dashboard views by user account.</li>
                            <li>Email verification helps protect portal access.</li>
                            <li>Do not share passwords or verification codes with others.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Patient rights</div>
                        <h4 class="card-title">Respectful care</h4>
                        <ul class="resource-list">
                            <li>Patients should be treated with dignity and compassion.</li>
                            <li>Ask questions if you do not understand your care plan.</li>
                            <li>Speak up about safety, privacy, or communication concerns.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card resource-card">
                        <div class="card-kicker">Accessibility</div>
                        <h4 class="card-title">Support for every visitor</h4>
                        <ul class="resource-list">
                            <li>Request language or accessibility support at reception.</li>
                            <li>Use the location page for map directions before arrival.</li>
                            <li>Ask staff for help navigating care areas or queue status.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-band">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="notice-panel">
                        <div class="eyebrow">Emergency guidance</div>
                        <h2 class="section-title mb-3">If this is a medical emergency, call 911.</h2>
                        <p class="lead-copy mb-0">
                            Online portals and contact forms are not a replacement for emergency care. For chest pain,
                            breathing trouble, severe bleeding, stroke symptoms, or life-threatening symptoms, call 911
                            or go to the nearest emergency department immediately.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="image-panel image-panel-sm">
                        <img src="{{ asset('images/ambulence-team.jpg') }}" alt="Emergency response team">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="contact-strip">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="eyebrow">Need help?</div>
                        <h2 class="section-title text-white mb-3">Contact HopeCare before your visit.</h2>
                        <p class="mb-0">
                            Call reception for visit questions, portal access support, directions, or what to bring for your appointment.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('location') }}" class="btn btn-hc-gold me-sm-2 mb-2">Location</a>
                        <a href="tel:9735550199" class="btn btn-hc-outline mb-2">Call (973) 555-0199</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
