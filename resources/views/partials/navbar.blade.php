<nav class="navbar navbar-expand-lg top-navbar shadow-sm">
    <div class="container-fluid">
        @php
            $brandRoute = route('portal');

            if(auth()->check()) {
                if(auth()->user()->hasRole('admin')) {
                    $brandRoute = route('admin.dashboard');
                } elseif(auth()->user()->hasRole('doctor')) {
                    $brandRoute = route('doctor.dashboard');
                } elseif(auth()->user()->hasRole('receptionist')) {
                    $brandRoute = route('receptionist.dashboard');
                } elseif(auth()->user()->hasRole('patient')) {
                    $brandRoute = route('patient.dashboard');
                }
            }
        @endphp

        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ $brandRoute }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="HopeCare Logo" class="site-logo">
            <div>
                <span class="brand-title">HopeCare Hospital</span>
                <small class="brand-subtitle d-block">Newark, New Jersey</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    @auth
                        @php
                            $dashboardRouteName = 'portal';

                            if(auth()->user()->hasRole('admin')) {
                                $dashboardRouteName = 'admin.dashboard';
                            } elseif(auth()->user()->hasRole('doctor')) {
                                $dashboardRouteName = 'doctor.dashboard';
                            } elseif(auth()->user()->hasRole('receptionist')) {
                                $dashboardRouteName = 'receptionist.dashboard';
                            } elseif(auth()->user()->hasRole('patient')) {
                                $dashboardRouteName = 'patient.dashboard';
                            }
                        @endphp

                        <a class="nav-link {{ request()->routeIs($dashboardRouteName) ? 'active-top-link' : '' }}"
                           href="{{ route($dashboardRouteName) }}">
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