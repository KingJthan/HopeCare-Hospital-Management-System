<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HopeCare Hospital')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        :root {
            --navy: #082f49;
            --deep: #031926;
            --blue: #0f6cbf;
            --teal: #0f9f9a;
            --gold: #d49a2a;
            --cream: #f7f1e5;
            --mist: #edf7f6;
            --paper: #ffffff;
            --ink: #12202f;
            --muted: #667789;
            --line: #dfeaf2;
            --shadow: 0 24px 70px rgba(3, 25, 38, 0.14);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Manrope", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(15, 159, 154, 0.16), transparent 34rem),
                linear-gradient(180deg, #f9fcff 0%, #f5f8fb 48%, #ffffff 100%);
        }

        a {
            text-decoration: none;
        }

        .top-ribbon {
            background: linear-gradient(90deg, var(--deep), var(--navy));
            color: rgba(255, 255, 255, 0.86);
            font-size: 13px;
            letter-spacing: 0.01em;
            padding: 9px 0;
        }

        .top-ribbon a {
            color: #ffffff;
            font-weight: 700;
        }

        .site-navbar {
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(223, 234, 242, 0.9);
            backdrop-filter: blur(18px);
            box-shadow: 0 12px 28px rgba(8, 47, 73, 0.06);
        }

        .navbar-brand {
            color: var(--navy) !important;
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 800;
            box-shadow: 0 14px 34px rgba(15, 108, 191, 0.24);
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .navbar-nav .nav-link {
            color: #294457 !important;
            font-weight: 800;
            font-size: 14px;
            border-radius: 999px;
            padding: 10px 14px !important;
            margin: 0 2px;
            transition: all 0.2s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--navy) !important;
            background: var(--mist);
        }

        .dropdown-menu {
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 12px;
            color: var(--navy);
            font-weight: 700;
            padding: 10px 12px;
        }

        .dropdown-item:hover {
            background: var(--mist);
        }

        .section {
            padding: 84px 0;
            position: relative;
            z-index: 1;
        }

        .section-sm {
            padding: 54px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--teal);
            background: rgba(15, 159, 154, 0.1);
            border: 1px solid rgba(15, 159, 154, 0.2);
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            padding: 9px 13px;
            margin-bottom: 16px;
        }

        .display-title,
        .page-title,
        .section-title {
            font-family: "Playfair Display", serif;
            color: var(--deep);
            letter-spacing: -0.04em;
        }

        .display-title {
            font-size: clamp(46px, 6vw, 82px);
            line-height: 0.98;
        }

        .page-title {
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1.02;
        }

        .section-title {
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.08;
        }

        .lead-copy {
            color: var(--muted);
            font-size: 18px;
            line-height: 1.75;
        }

        .hero-shell,
        .page-hero {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(8, 47, 73, 0.96), rgba(15, 108, 191, 0.84)),
                url('{{ asset('images/hospital-building.jpg') }}') center/cover no-repeat;
            color: #ffffff;
            border-radius: 0 0 42px 42px;
        }

        .hero-shell::after,
        .page-hero::after {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            right: -140px;
            top: -130px;
            border-radius: 50%;
            background: rgba(212, 154, 42, 0.24);
            filter: blur(4px);
        }

        .hero-inner,
        .page-hero-inner {
            position: relative;
            z-index: 2;
            padding: 92px 0;
        }

        .hero-shell .lead-copy,
        .page-hero .lead-copy {
            color: rgba(255, 255, 255, 0.82);
        }

        .hero-image-card {
            position: relative;
            overflow: hidden;
            border-radius: 34px;
            min-height: 520px;
            box-shadow: 0 34px 90px rgba(0, 0, 0, 0.32);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .hero-image-card img,
        .image-panel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-image-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 45%, rgba(3, 25, 38, 0.76));
        }

        .hero-card-caption {
            position: absolute;
            z-index: 2;
            left: 22px;
            right: 22px;
            bottom: 22px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.24);
            backdrop-filter: blur(16px);
            border-radius: 22px;
            padding: 18px;
            color: #ffffff;
        }

        .btn-hc-primary,
        .btn-hc-gold,
        .btn-hc-outline {
            border-radius: 999px;
            font-weight: 800;
            padding: 13px 22px;
        }

        .btn-hc-primary {
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            border: 0;
            box-shadow: 0 16px 34px rgba(15, 108, 191, 0.28);
        }

        .btn-hc-primary:hover {
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-hc-gold {
            background: linear-gradient(135deg, #f5c15d, var(--gold));
            color: #1c2a36;
            border: 0;
            box-shadow: 0 16px 34px rgba(212, 154, 42, 0.28);
        }

        .btn-hc-outline {
            color: var(--navy);
            border: 1px solid rgba(8, 47, 73, 0.18);
            background: #ffffff;
        }

        .btn-hc-outline:hover {
            color: var(--navy);
            background: var(--mist);
        }

        .metric-card,
        .feature-card,
        .service-card,
        .path-card,
        .story-card,
        .direction-card {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(223, 234, 242, 0.95);
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 18px 48px rgba(8, 47, 73, 0.08);
            height: 100%;
        }

        .metric-card {
            padding: 22px;
        }

        .metric-number {
            color: var(--navy);
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.04em;
            margin-bottom: 4px;
        }

        .metric-label,
        .card-copy {
            color: var(--muted);
            line-height: 1.7;
        }

        .card-kicker {
            color: var(--teal);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .card-title {
            color: var(--deep);
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 10px;
        }

        .image-panel {
            overflow: hidden;
            border-radius: 32px;
            min-height: 420px;
            box-shadow: var(--shadow);
        }

        .image-panel-sm {
            min-height: 280px;
        }

        .image-panel-tall {
            min-height: 540px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 18px;
        }

        .image-grid .image-panel:first-child {
            grid-row: span 2;
        }

        .image-grid .image-panel {
            min-height: 250px;
        }

        .service-card.with-media,
        .path-card.with-media,
        .story-card.with-media,
        .direction-card.with-media {
            overflow: hidden;
            padding: 0;
        }

        .card-media {
            height: 190px;
            overflow: hidden;
        }

        .card-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.55s ease;
        }

        .with-media:hover .card-media img,
        .image-panel:hover img,
        .hero-image-card:hover img {
            transform: scale(1.04);
        }

        .card-content {
            padding: 26px;
        }

        .photo-band {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .photo-band-card {
            position: relative;
            min-height: 260px;
            overflow: hidden;
            border-radius: 28px;
            box-shadow: 0 18px 48px rgba(8, 47, 73, 0.1);
        }

        .photo-band-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-band-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 42%, rgba(3, 25, 38, 0.72));
        }

        .photo-band-label {
            position: absolute;
            z-index: 2;
            left: 18px;
            right: 18px;
            bottom: 18px;
            color: #ffffff;
            font-weight: 800;
        }

        .soft-band {
            background: linear-gradient(135deg, var(--cream), #ffffff);
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .number-step {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            font-weight: 800;
            margin-bottom: 16px;
        }

        .map-frame {
            width: 100%;
            min-height: 420px;
            border: 0;
            border-radius: 28px;
            box-shadow: var(--shadow);
        }

        .footer {
            background: var(--deep);
            color: rgba(255, 255, 255, 0.82);
            padding: 54px 0 30px;
            position: relative;
            z-index: 2;
        }

        .footer a {
            color: #ffffff;
            font-weight: 700;
        }

        .footer-brand {
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        @media (max-width: 991px) {
            .hero-inner,
            .page-hero-inner {
                padding: 72px 0;
            }

            .hero-image-card {
                min-height: 360px;
            }

            .photo-band {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .section {
                padding: 58px 0;
            }

            .section-sm {
                padding: 42px 0;
            }

            .hero-shell,
            .page-hero {
                border-radius: 0 0 28px 28px;
            }

            .navbar-nav .nav-link {
                margin: 2px 0;
            }

            .image-grid,
            .photo-band {
                grid-template-columns: 1fr;
            }

            .image-grid .image-panel:first-child {
                grid-row: auto;
            }
        }
    </style>
</head>
<body>
    <div class="top-ribbon">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
            <span>24/7 Emergency Care in Newark, New Jersey</span>
            <span>Call: (973) 555-0199 | <a href="{{ route('location') }}">Get Directions</a></span>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top site-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <span class="brand-mark">HC</span>
                <span>
                    HopeCare Hospital
                    <span class="brand-subtitle d-block">Global standard digital care</span>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar" aria-controls="publicNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home', 'portal') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pathways') ? 'active' : '' }}" href="{{ route('pathways') }}">Care Pathways</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('location') ? 'active' : '' }}" href="{{ route('location') }}">Location</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('login.admin', 'login.doctor', 'login.receptionist', 'login.nurse', 'login.cne', 'login.housekeeping', 'login.security', 'staff.register') ? 'active' : '' }}" href="#" id="staffDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Staff
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('login.admin') }}">Admin Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.doctor') }}">Doctor Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.receptionist') }}">Reception Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.nurse') }}">Nurse Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.cne') }}">CNE Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.housekeeping') }}">House Keeping Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.security') }}">Security Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('staff.register') }}">Staff Register</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-hc-primary" href="{{ route('login.patient') }}">Patient Portal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="footer-brand mb-2">HopeCare Hospital</div>
                    <p class="mb-0">
                        A modern hospital management experience built for patients, clinicians, reception teams, and administrators.
                    </p>
                </div>
                <div class="col-md-4 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Explore</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('pathways') }}">Care Pathways</a>
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('location') }}">Location</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Portals</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('login.patient') }}">Patient Login</a>
                        <a href="{{ route('login.doctor') }}">Doctor Login</a>
                        <a href="{{ route('login.receptionist') }}">Reception Login</a>
                        <a href="{{ route('staff.register') }}">Staff Register</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Contact</h6>
                    <p class="mb-1">Newark, New Jersey</p>
                    <p class="mb-1">(973) 555-0199</p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Newark%2C%20New%20Jersey" target="_blank" rel="noopener">Open directions</a>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <small class="d-block">Copyright {{ date('Y') }} HopeCare Hospital. All rights reserved.</small>
            <small class="d-block mt-1">Jonathan Mugume VU-BBC-2411-1587-DAY {{ date('Y') }}.</small>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
