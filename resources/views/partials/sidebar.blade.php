<aside class="sidebar">
    <div class="sidebar-header text-center">
        <img src="{{ asset('images/nurse-team.jpg') }}" alt="Hospital Team" class="sidebar-image">
        <h6 class="mt-3 mb-1">Hospital Menu</h6>
        <p class="small text-muted mb-0">Management System</p>
    </div>

    <ul class="sidebar-menu">
        @auth
            @if(auth()->user()->hasRole('admin'))
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}" class="{{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-injured"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.nowServing') }}" class="{{ request()->routeIs('patients.nowServing') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket"></i> Now Serving
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group"></i> Drug Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('drugs.index') }}" class="{{ request()->routeIs('drugs.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-capsules"></i> Drugs
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}" class="{{ request()->routeIs('treatments.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-notes-medical"></i> Treatments
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('receptionist'))
                <li>
                    <a href="{{ route('receptionist.dashboard') }}" class="{{ request()->routeIs('receptionist.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}" class="{{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-injured"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.nowServing') }}" class="{{ request()->routeIs('patients.nowServing') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket"></i> Now Serving
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('doctor'))
                <li>
                    <a href="{{ route('doctor.dashboard') }}" class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group"></i> Drug Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('drugs.index') }}" class="{{ request()->routeIs('drugs.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-capsules"></i> Drugs
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}" class="{{ request()->routeIs('treatments.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-notes-medical"></i> Treatments
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('patient'))
                <li>
                    <a href="{{ route('patient.dashboard') }}" class="{{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.treatments') }}" class="{{ request()->routeIs('patient.treatments') ? 'active' : '' }}">
                        <i class="fa-solid fa-notes-medical"></i> My Treatment
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.token') }}" class="{{ request()->routeIs('patient.token') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket"></i> My Token
                    </a>
                </li>
            @endif
        @endauth
    </ul>
</aside>