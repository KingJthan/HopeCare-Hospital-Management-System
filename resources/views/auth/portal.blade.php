<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HopeCare Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #123d74;
            --secondary: #1f5fa8;
            --light-blue: #eef6ff;
            --soft-border: #dbe7f5;
            --text-muted: #6b7b8c;
            --danger: #d64545;
            --success: #1d8f63;
            --warning: #f0a202;
            --purple: #6c4ccf;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fbff;
            color: #1f2d3d;
            margin: 0;
            padding: 0;
        }

        .topbar {
            background: #0f2f59;
            color: #fff;
            font-size: 14px;
            padding: 8px 0;
        }

        .topbar .left-info span,
        .topbar .right-info span {
            margin-right: 18px;
        }

        .topbar a {
            color: #fff;
            text-decoration: none;
        }

        .navbar {
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
            padding: 10px 0;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary) !important;
            line-height: 1.1;
        }

        .brand-sub {
            display: block;
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 600;
            margin-top: 2px;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            color: var(--primary) !important;
            font-weight: 600;
            margin-left: 14px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary) !important;
        }

        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #e7eef7;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
        }

        .dropdown-item {
            font-weight: 600;
            color: var(--primary);
        }

        .hero {
            background:
                linear-gradient(rgba(18, 61, 116, 0.78), rgba(18, 61, 116, 0.78)),
                url('{{ asset('images/hospital-building.jpg') }}') center/cover no-repeat;
            color: white;
            padding: 80px 20px 90px;
            position: relative;
            overflow: hidden;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.28);
            border-radius: 30px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .hero p {
            font-size: 17px;
            max-width: 780px;
            margin: 0 auto 24px;
            opacity: 0.96;
        }

        .btn-main {
            padding: 11px 22px;
            font-weight: 700;
            border-radius: 12px;
        }

        .btn-soft {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.35);
            color: #fff;
        }

        .btn-soft:hover {
            background: rgba(255,255,255,0.22);
            color: #fff;
        }

        .hero-floating-card {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(6px);
            border-radius: 18px;
            padding: 16px 18px;
            text-align: left;
            color: #fff;
            margin-top: 20px;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }

        .section {
            padding: 48px 20px;
        }

        .section-sm {
            padding: 34px 20px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: var(--text-muted);
            max-width: 780px;
            margin: 0 auto 24px;
        }

        .stats-strip {
            background: linear-gradient(90deg, var(--primary), #24589b);
            color: #fff;
            border-radius: 22px;
            padding: 22px 18px;
            box-shadow: 0 10px 28px rgba(18,61,116,0.18);
        }

        .stat-box h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-box p {
            margin-bottom: 0;
            opacity: 0.94;
        }

        .service-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            height: 100%;
        }

        .service-btn {
            width: 100%;
            border: none;
            text-align: left;
            color: #fff;
            padding: 22px;
            font-size: 20px;
            font-weight: 700;
        }

        .service-btn small {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-top: 7px;
            opacity: 0.92;
        }

        .service-body {
            background: #fff;
            padding: 18px;
            color: #495057;
        }

        .service-emergency {
            background: linear-gradient(135deg, #cf2f2f, #ef476f);
        }

        .service-pharmacy {
            background: linear-gradient(135deg, #168aad, #06d6a0);
        }

        .service-lab {
            background: linear-gradient(135deg, #6247aa, #8e7dff);
        }

        .service-general {
            background: linear-gradient(135deg, #e07a00, #fcbf49);
        }

        .feature-card,
        .staff-box,
        .about-card,
        .news-card,
        .pathway-card,
        .testimonial-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.06);
            padding: 22px 20px;
            height: 100%;
            border: 1px solid #edf2f8;
        }

        .feature-card h5,
        .staff-box h5,
        .about-card h4,
        .news-card h6,
        .pathway-card h5,
        .testimonial-card h6 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .pathway-card {
            text-align: left;
        }

        .pathway-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            border-radius: 30px;
            padding: 7px 12px;
            margin-bottom: 10px;
            color: #fff;
        }

        .badge-patient { background: #2763c4; }
        .badge-reception { background: var(--success); }
        .badge-doctor { background: var(--purple); }

        .cta-panel {
            background: linear-gradient(135deg, #eef6ff, #ffffff);
            border: 1px solid var(--soft-border);
            border-radius: 22px;
            padding: 28px 26px;
        }

        .staff-box,
        .testimonial-card {
            text-align: center;
        }

        .staff-box p,
        .feature-card p,
        .news-card p,
        .pathway-card p,
        .about-card p,
        .about-card li,
        .testimonial-card p {
            color: var(--text-muted);
            margin-bottom: 0;
        }

        .news-card .news-tag {
            display: inline-block;
            background: var(--light-blue);
            color: var(--secondary);
            font-size: 12px;
            font-weight: 700;
            border-radius: 30px;
            padding: 6px 12px;
            margin-bottom: 10px;
        }

        .contact-strip {
            background: #ffffff;
            border: 1px solid #e7eff8;
            border-radius: 20px;
            padding: 24px 22px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.04);
        }

        .image-feature {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            min-height: 320px;
            box-shadow: 0 14px 34px rgba(0,0,0,0.12);
        }

        .image-feature img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 320px;
            display: block;
            transition: transform 0.6s ease;
        }

        .image-feature:hover img {
            transform: scale(1.04);
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(12, 40, 78, 0.28), rgba(12, 40, 78, 0.72));
            display: flex;
            align-items: end;
        }

        .image-content {
            color: #fff;
            padding: 24px 24px;
            max-width: 720px;
        }

        .image-content h2,
        .image-content h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .image-content p {
            margin-bottom: 0;
            font-size: 16px;
            line-height: 1.5;
        }

        .testimonial-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--light-blue);
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            font-weight: 700;
            font-size: 24px;
        }

        .map-card {
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 14px 34px rgba(0,0,0,0.08);
            border: 1px solid #edf2f8;
            background: #fff;
        }

        .map-card iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }

        .map-info {
            padding: 22px;
        }

        .footer {
            background: #12345f;
            color: #fff;
            padding: 26px 20px;
            margin-top: 18px;
        }

        .footer-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .footer small {
            opacity: 0.9;
        }

        .row.g-4 {
            --bs-gutter-y: 1rem;
        }

        ul.mb-0 li:last-child {
            margin-bottom: 0 !important;
        }

        @media (max-width: 991px) {
            .hero h1 {
                font-size: 40px;
            }
        }

        @media (max-width: 768px) {
            .topbar {
                text-align: center;
            }

            .topbar .left-info,
            .topbar .right-info {
                margin-bottom: 6px;
            }

            .hero {
                padding: 70px 18px 74px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .section,
            .section-sm {
                padding: 30px 16px;
            }

            .navbar-brand {
                font-size: 24px;
            }

            .image-feature,
            .image-feature img {
                min-height: 240px;
            }

            .image-content {
                padding: 18px 16px;
            }

            .map-card iframe {
                height: 240px;
            }

            .stats-strip {
                padding: 18px 14px;
            }

            .cta-panel,
            .contact-strip {
                padding: 22px 18px;
            }
        }
    </style>
</head>
<body>

<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 left-info">
                <span>24/7 Emergency Care</span>
                <span>Newark, New Jersey</span>
                <span>Call: (973) 555-0199</span>
            </div>
            <div class="col-md-4 text-md-end right-info">
                <span><a href="{{ route('login.patient') }}">Patient Portal</a></span>
                <span><a href="#staff">Staff Access</a></span>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            HopeCare Hospital
            <span class="brand-sub">COMPASSION • CARE • DIGITAL HEALTH</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#pathways">Care Pathways</a></li>
                <li class="nav-item"><a class="nav-link" href="#patients">Patients</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="staffDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Staff Access
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login.admin') }}">Admin Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.doctor') }}">Doctor Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.receptionist') }}">Reception Login</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <div class="hero-badge">Trusted Digital Hospital Experience</div>
        <h1>Modern Care. Secure Access. Better Hospital Coordination.</h1>
        <p>
            HopeCare Hospital combines patient-focused healthcare with secure digital workflows for
            patients, doctors, reception staff, and administrators.
        </p>

        <a href="{{ route('login.patient') }}" class="btn btn-light btn-main me-2 mb-2">Patient Portal</a>
        <a href="#booking" class="btn btn-soft btn-main mb-2">Book Appointment</a>

        <div class="hero-floating-card">
            <div class="row g-3 text-start">
                <div class="col-md-4">
                    <strong>Patient Access</strong>
                    <div>View personal treatments and token information securely.</div>
                </div>
                <div class="col-md-4">
                    <strong>Role Security</strong>
                    <div>Separate access for admin, doctor, receptionist, and patients.</div>
                </div>
                <div class="col-md-4">
                    <strong>Efficient Front Desk</strong>
                    <div>Token assignment and queue handling made easier.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container">
        <div class="stats-strip">
            <div class="row text-center g-4">
                <div class="col-md-3 stat-box">
                    <h3>24/7</h3>
                    <p>Emergency Coverage</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h3>4</h3>
                    <p>Secure User Portals</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h3>100%</h3>
                    <p>Digital Access Flow</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h3>Fast</h3>
                    <p>Token & Queue Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="image-feature">
            <img src="{{ asset('images/best-doctors.jpg') }}" alt="Best Doctors">
            <div class="image-overlay">
                <div class="image-content">
                    <h2>Bringing the best Doctors and services to your neighborhood</h2>
                    <p>
                        HopeCare Hospital connects communities to trusted medical professionals, quality care services,
                        and a secure digital system that improves access for both patients and staff.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section pt-0">
    <div class="container text-center">
        <h2 class="section-title">Specialized Hospital Services</h2>
        <p class="section-subtitle">
            Explore HopeCare’s major healthcare services. Click each service card to reveal additional information.
        </p>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <button class="service-btn service-emergency" type="button" data-bs-toggle="collapse" data-bs-target="#serviceEmergency">
                        Emergency Care
                        <small>Urgent response and immediate patient stabilization</small>
                    </button>
                    <div class="collapse" id="serviceEmergency">
                        <div class="service-body">
                            HopeCare’s emergency services support urgent medical needs with rapid assessment,
                            priority care handling, and coordinated attention for critical cases.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <button class="service-btn service-pharmacy" type="button" data-bs-toggle="collapse" data-bs-target="#servicePharmacy">
                        Pharmacy
                        <small>Prescription processing and medication support</small>
                    </button>
                    <div class="collapse" id="servicePharmacy">
                        <div class="service-body">
                            The pharmacy unit handles medicine availability, dispensing support, prescription
                            matching, and accurate drug coordination for ongoing treatment plans.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <button class="service-btn service-lab" type="button" data-bs-toggle="collapse" data-bs-target="#serviceLab">
                        Laboratory
                        <small>Diagnostic testing and medical sample analysis</small>
                    </button>
                    <div class="collapse" id="serviceLab">
                        <div class="service-body">
                            Our laboratory services support diagnosis through tests, sample processing,
                            and reporting that helps doctors make informed healthcare decisions.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <button class="service-btn service-general" type="button" data-bs-toggle="collapse" data-bs-target="#serviceConsultation">
                        Consultation
                        <small>Routine visits, follow-up reviews, and health guidance</small>
                    </button>
                    <div class="collapse" id="serviceConsultation">
                        <div class="service-body">
                            General consultation services support checkups, referrals, follow-up appointments,
                            and professional medical guidance for patient wellbeing.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm pt-0">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <h5>Protected Patient Records</h5>
                    <p>
                        Patients access only their own treatment and token data, improving confidentiality and privacy.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <h5>Organized Clinical Workflow</h5>
                    <p>
                        Doctors can manage patient treatment entries, while admins oversee categories and medication records.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <h5>Front Desk Efficiency</h5>
                    <p>
                        Reception staff can register patients, assign tokens, and support orderly service flow.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pathways" class="section bg-light">
    <div class="container text-center">
        <h2 class="section-title">Care Pathways</h2>
        <p class="section-subtitle">
            HopeCare supports a clear journey from reception and token assignment to treatment management and patient access.
        </p>

        <div class="row g-4 text-start">
            <div class="col-md-4">
                <div class="pathway-card">
                    <span class="pathway-badge badge-reception">Reception Flow</span>
                    <h5>Patient Registration & Token Assignment</h5>
                    <p>
                        Reception staff register incoming patients, assign token numbers, and prepare them for organized service handling.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pathway-card">
                    <span class="pathway-badge badge-doctor">Clinical Flow</span>
                    <h5>Treatment & Medication Coordination</h5>
                    <p>
                        Doctors review patient details, assign treatments, and coordinate medication through the hospital workflow.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pathway-card">
                    <span class="pathway-badge badge-patient">Patient Flow</span>
                    <h5>Secure Personal Record Access</h5>
                    <p>
                        Patients securely log in to view their own treatment history, token information, and personal hospital access page.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="patients" class="section">
    <div class="container">
        <div class="image-feature">
            <img src="{{ asset('images/community-reachout.jpg') }}" alt="Community Reachout">
            <div class="image-overlay">
                <div class="image-content">
                    <h3>Our Community Reach Out</h3>
                    <p>
                        HopeCare Hospital is committed to supporting the wider community through awareness,
                        accessible healthcare guidance, and outreach initiatives that bring care and education closer to families.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="booking" class="section-sm pt-0">
    <div class="container">
        <div class="cta-panel">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="section-title mb-2">Book an Appointment</h2>
                    <p class="mb-0 text-muted">
                        Patients can register online, access their portal, and connect to HopeCare for treatment, consultation, and follow-up support.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-main me-2 mb-2">Register Now</a>
                    <a href="{{ route('login.patient') }}" class="btn btn-outline-primary btn-main mb-2">Patient Login</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="staff" class="section pt-0">
    <div class="container">
        <div class="image-feature">
            <img src="{{ asset('images/mobile-health.jpg') }}" alt="Mobile Health Services">
            <div class="image-overlay">
                <div class="image-content">
                    <h3>Our Mobile Health Services</h3>
                    <p>
                        HopeCare extends healthcare support beyond hospital walls through mobile health services designed
                        to improve access, convenience, and continuity of care for the communities we serve.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm pt-0">
    <div class="container text-center">
        <h2 class="section-title">Staff Access Portals</h2>
        <p class="section-subtitle">
            Click the Staff Access menu in the navigation bar to open Admin, Doctor, or Reception login options.
        </p>
    </div>
</section>

<section id="about" class="section bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="about-card">
                    <h4>About HopeCare</h4>
                    <p>
                        HopeCare Hospital is a digital healthcare platform designed to improve hospital coordination,
                        protect patient privacy, and streamline role-based access across the healthcare environment.
                    </p>
                    <p>
                        From patient token assignment to treatment management and role-specific dashboards, HopeCare
                        supports organized and secure hospital service delivery.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-card">
                    <h4>Why Patients and Staff Benefit</h4>
                    <ul class="mb-0">
                        <li class="mb-2">Dedicated role access for admin, doctor, receptionist, and patient</li>
                        <li class="mb-2">Improved patient privacy with isolated personal records</li>
                        <li class="mb-2">Professional hospital homepage with direct portal entry points</li>
                        <li class="mb-2">Token generation, printing, and queue visibility support</li>
                        <li>Better digital healthcare experience for presentation and real workflow simulation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container text-center">
        <h2 class="section-title">Patient Testimonials</h2>
        <p class="section-subtitle">
            Stories that reflect trust, convenience, and a better digital care experience at HopeCare Hospital.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">J</div>
                    <h6>Jonathan M.</h6>
                    <p>
                        “The patient portal made it easy to check my treatment information, and the whole process felt organized and secure.”
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">A</div>
                    <h6>Amina K.</h6>
                    <p>
                        “From registration to getting my token, the service was smooth. The system feels modern and very professional.”
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">D</div>
                    <h6>Daniel R.</h6>
                    <p>
                        “HopeCare’s digital system helped me follow up on my care quickly. I liked how private and easy everything was.”
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container text-center">
        <h2 class="section-title">Hospital Notices & Updates</h2>
        <p class="section-subtitle">
            Important operational highlights designed to improve service delivery for patients and staff.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="news-card">
                    <div class="news-tag">PATIENT ACCESS</div>
                    <h6>Secure Portal Experience</h6>
                    <p>
                        Patients can log in to review only their own records, treatment entries, and token information.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="news-card">
                    <div class="news-tag">FRONT DESK</div>
                    <h6>Token & Queue Management</h6>
                    <p>
                        Reception teams can assign tokens and manage a more organized patient-serving workflow.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="news-card">
                    <div class="news-tag">SYSTEM SECURITY</div>
                    <h6>Role-Based Portal Access</h6>
                    <p>
                        Staff and patients each use dedicated access routes tailored to their responsibilities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="location" class="section-sm">
    <div class="container">
        <div class="map-card">
            <iframe
                src="https://www.google.com/maps?q=Newark%2C%20New%20Jersey&z=12&output=embed"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div class="map-info">
                <h3 style="color:#123d74; font-weight:700;">Visit HopeCare Hospital</h3>
                <p class="text-muted mb-2">
                    HopeCare Hospital serves patients and families in Newark, New Jersey, with secure digital access and coordinated healthcare support.
                </p>
                <p class="mb-0">
                    <strong>Location:</strong> Newark, New Jersey<br>
                    <strong>Contact:</strong> (973) 555-0199<br>
                    <strong>Hours:</strong> 24/7 Emergency & Patient Support
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-sm pt-0">
    <div class="container">
        <div class="contact-strip">
            <div class="row g-4 align-items-center">
                <div class="col-lg-8">
                    <h3 class="mb-2" style="color:#123d74; font-weight:700;">Need Help Accessing HopeCare?</h3>
                    <p class="mb-0 text-muted">
                        Contact the hospital front desk for support with patient registration, account access, and service coordination.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('login.patient') }}" class="btn btn-primary btn-main me-2 mb-2">Patient Access</a>
                    <a class="btn btn-outline-primary btn-main mb-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Staff Access
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login.admin') }}">Admin Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.doctor') }}">Doctor Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.receptionist') }}">Reception Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="footer">
    <div class="container text-center">
        <div class="footer-title">HopeCare Hospital</div>
        <small>© {{ date('Y') }} HopeCare Hospital. All rights reserved.</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>