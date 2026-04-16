@if(isset($title))
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <h2 class="page-title mb-1">{{ $title }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
      @php
    $dashboardRoute = 'portal';

    if(auth()->check()) {
        if(auth()->user()->hasRole('admin')) {
            $dashboardRoute = 'admin.dashboard';
        } elseif(auth()->user()->hasRole('doctor')) {
            $dashboardRoute = 'doctor.dashboard';
        } elseif(auth()->user()->hasRole('receptionist')) {
            $dashboardRoute = 'receptionist.dashboard';
        } else {
            $dashboardRoute = 'patient.dashboard';
        }
    }
@endphp

<a href="{{ route($dashboardRoute) }}">Dashboard</a>
                    </li>

                    @if(isset($parent))
                        <li class="breadcrumb-item">{{ $parent }}</li>
                    @endif

                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endif