<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HopeCare Hospital Management System')</title>

    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

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

    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">
                Jonathan Mugume | Registration Number: VU-BBC-2411-1587-DAY | {{ date('Y') }}
            </p>
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