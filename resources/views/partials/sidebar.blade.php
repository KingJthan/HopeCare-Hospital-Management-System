<aside class="sidebar">
    @php
        $workspaceLabel = 'Hospital Workspace';

        if(auth()->check()) {
            if(auth()->user()->hasRole('admin')) {
                $workspaceLabel = 'Executive Operations';
            } elseif(auth()->user()->hasRole('doctor')) {
                $workspaceLabel = 'Clinical Workspace';
            } elseif(auth()->user()->hasRole('receptionist')) {
                $workspaceLabel = 'Front Desk Flow';
            } elseif(auth()->user()->hasRole('nurse')) {
                $workspaceLabel = 'Nursing Station';
            } elseif(auth()->user()->hasRole('cne')) {
                $workspaceLabel = 'Education & Quality';
            } elseif(auth()->user()->hasRole('housekeeping')) {
                $workspaceLabel = 'Facility Readiness';
            } elseif(auth()->user()->hasRole('security')) {
                $workspaceLabel = 'Safety Command';
            } elseif(auth()->user()->hasRole('patient')) {
                $workspaceLabel = 'Patient Access';
            }
        }
    @endphp

    <div class="sidebar-header text-center">
        <div class="sidebar-brand-card">
            <span class="brand-mark sidebar-brand-mark">HC</span>
            <div>
                <h6 class="mb-1">Care Command Center</h6>
                <p class="small mb-0">{{ $workspaceLabel }}</p>
            </div>
        </div>
        <img src="{{ asset('images/team.jpg') }}" alt="Hospital Team" class="sidebar-image">
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

            @if(auth()->user()->hasRole('nurse'))
                <li>
                    <a href="{{ route('nurse.dashboard') }}" class="{{ request()->routeIs('nurse.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-nurse"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}" class="{{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-injured"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}" class="{{ request()->routeIs('treatments.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-notes-medical"></i> Treatments
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.nowServing') }}" class="{{ request()->routeIs('patients.nowServing') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket"></i> Queue
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('cne'))
                <li>
                    <a href="{{ route('cne.dashboard') }}" class="{{ request()->routeIs('cne.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chalkboard-user"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.index') }}" class="{{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-hospital-user"></i> Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('treatments.index') }}" class="{{ request()->routeIs('treatments.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-notes-medical"></i> Treatments
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('housekeeping'))
                <li>
                    <a href="{{ route('housekeeping.dashboard') }}" class="{{ request()->routeIs('housekeeping.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-broom"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('location') }}">
                        <i class="fa-solid fa-map-location-dot"></i> Facility Map
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('security'))
                <li>
                    <a href="{{ route('security.dashboard') }}" class="{{ request()->routeIs('security.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-shield-halved"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('patients.nowServing') }}" class="{{ request()->routeIs('patients.nowServing') ? 'active' : '' }}">
                        <i class="fa-solid fa-person-walking"></i> Queue Flow
                    </a>
                </li>
                <li>
                    <a href="{{ route('location') }}">
                        <i class="fa-solid fa-map-location-dot"></i> Directions
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
