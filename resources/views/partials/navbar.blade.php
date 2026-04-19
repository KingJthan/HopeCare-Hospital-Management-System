<nav class="navbar navbar-expand-xl top-navbar app-navbar sticky-top">
    <div class="container">
        @php
            $brandRoute = route('portal');
            $dashboardRouteName = 'portal';
            $roleLabel = 'Guest';

            if(auth()->check()) {
                if(auth()->user()->hasRole('admin')) {
                    $dashboardRouteName = 'admin.dashboard';
                    $roleLabel = 'Admin';
                } elseif(auth()->user()->hasRole('doctor')) {
                    $dashboardRouteName = 'doctor.dashboard';
                    $roleLabel = 'Doctor';
                } elseif(auth()->user()->hasRole('receptionist')) {
                    $dashboardRouteName = 'receptionist.dashboard';
                    $roleLabel = 'Receptionist';
                } elseif(auth()->user()->hasRole('nurse')) {
                    $dashboardRouteName = 'nurse.dashboard';
                    $roleLabel = 'Nurse';
                } elseif(auth()->user()->hasRole('cne')) {
                    $dashboardRouteName = 'cne.dashboard';
                    $roleLabel = 'CNE';
                } elseif(auth()->user()->hasRole('housekeeping')) {
                    $dashboardRouteName = 'housekeeping.dashboard';
                    $roleLabel = 'House Keeping';
                } elseif(auth()->user()->hasRole('security')) {
                    $dashboardRouteName = 'security.dashboard';
                    $roleLabel = 'Security';
                } elseif(auth()->user()->hasRole('patient')) {
                    $dashboardRouteName = 'patient.dashboard';
                    $roleLabel = 'Patient';
                }

                $brandRoute = route($dashboardRouteName);
            }
        @endphp

        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ $brandRoute }}">
            <span class="brand-mark">HC</span>
            <span>
                <span class="brand-title">HopeCare Hospital</span>
                <span class="brand-subtitle d-block">Global standard digital care</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="navbar-nav ms-auto align-items-xl-center">
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
                    <a class="nav-link {{ request()->routeIs('resources') ? 'active' : '' }}" href="{{ route('resources') }}">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('location') ? 'active' : '' }}" href="{{ route('location') }}">Location</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link app-dashboard-link {{ request()->routeIs($dashboardRouteName) ? 'active' : '' }}"
                           href="{{ route($dashboardRouteName) }}">
                            Dashboard
                        </a>
                    </li>
                @endauth

                <li class="nav-item">
                    <span class="nav-link hospital-status">
                        <i class="fa-solid fa-id-badge me-1"></i> {{ $roleLabel }} Access
                    </span>
                </li>

                @auth
                    <li class="nav-item ms-xl-2">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-hc-logout">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
