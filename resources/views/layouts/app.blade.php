<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HopeCare Hospital Management System')</title>

    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="app-body">

    <div class="app-top-ribbon">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
            <span>24/7 Emergency Care in Newark, New Jersey</span>
            <span>Call: (973) 555-0199 | <a href="{{ route('location') }}">Get Directions</a></span>
        </div>
    </div>

    @include('partials.navbar')

    <div class="main-wrapper">
        @include('partials.sidebar')

        <main class="content-area">
            <div class="container-fluid py-4">
                @include('partials.flash')
                @yield('content')
            </div>
        </main>
    </div>

    <footer class="footer app-footer">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <div class="footer-brand mb-2">HopeCare Hospital</div>
                    <p class="mb-0">
                        A connected hospital workspace for patients, clinicians, reception teams, support staff, and administrators.
                    </p>
                </div>
                <div class="col-md-4 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Explore</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('pathways') }}">Care Pathways</a>
                        <a href="{{ route('resources') }}">Patient Resources</a>
                        <a href="{{ route('about') }}">About</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Access</h6>
                    <div class="d-grid gap-2">
                        <a href="{{ route('portal') }}">Public Home</a>
                        <a href="{{ route('location') }}">Location</a>
                        <a href="{{ route('staff.register') }}">Staff Register</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Visit</h6>
                    <p class="mb-1">Newark, New Jersey</p>
                    <p class="mb-0">(973) 555-0199</p>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <small class="d-block text-center">Copyright {{ date('Y') }} HopeCare Hospital. All rights reserved. | Jonathan Mugume VU-BBC-2411-1587-DAY {{ date('Y') }}.</small>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chart.umd.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    const confirmed = confirm('Are you sure you want to delete this record?');
                    if (!confirmed) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
