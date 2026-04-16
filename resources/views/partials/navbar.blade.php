<nav class="navbar navbar-expand-lg top-navbar shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('portal') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="HopeCare Logo" class="site-logo">
            <div>
                <span class="brand-title">HopeCare Hospital</span>
                <small class="brand-subtitle d-block">Newark, New Jersey</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    @auth
                        @php
                            $dashboardRoute = 'dashboard';

                            if (auth()->user()->hasRole('admin')) {
                                $dashboardRoute = 'admin.dashboard';
                            } elseif (auth()->user()->hasRole('doctor')) {
                                $dashboardRoute = 'doctor.dashboard';
                            } elseif (auth()->user()->hasRole('receptionist')) {
                                $dashboardRoute = 'receptionist.dashboard';
                            } elseif (auth()->user()->hasRole('patient')) {
                                $dashboardRoute = 'patient.dashboard';
                            }
                        @endphp

                        <a class="nav-link {{ request()->routeIs($dashboardRoute) ? 'active-top-link' : '' }}" href="{{ route($dashboardRoute) }}">
                            Dashboard
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('portal') }}">
                            Home
                        </a>
                    @endauth
                </li>

                <li class="nav-item">
                    <span class="nav-link hospital-status">
                        <i class="fa-solid fa-circle-check me-1"></i> Open 24/7
                    </span>
                </li>

                @auth
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>