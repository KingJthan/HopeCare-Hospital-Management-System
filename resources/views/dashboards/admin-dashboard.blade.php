@extends('layouts.app')

@section('title', 'Admin Dashboard | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Admin Dashboard'])

    <div class="dashboard-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="dashboard-hero-content">
                    <div class="dashboard-eyebrow">Executive operations</div>
                    <h1>Welcome back, Administrator.</h1>
                    <p class="mb-3">
                        Oversee patients, medications, treatment records, staffing access, and hospital workflow from a polished control center.
                    </p>
                    <p class="mb-0"><strong>Today:</strong> {{ now()->format('l, d F Y') }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/hospital-building.jpg') }}" alt="HopeCare hospital campus" class="dashboard-hero-image admin-welcome-image">
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-user-injured"></i></div>
                <div><h6>Total Patients</h6><h3>{{ $totalPatients }}</h3></div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-capsules"></i></div>
                <div><h6>Total Drugs</h6><h3>{{ $totalDrugs }}</h3></div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                <div><h6>Categories</h6><h3>{{ $totalCategories }}</h3></div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                <div><h6>Treatments</h6><h3>{{ $totalTreatments }}</h3></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="custom-card">
                <div class="card-header-custom">
                    <h5 class="mb-0">Recent Patients</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPatients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-4">No patient records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="dashboard-panel">
                <img src="{{ asset('images/ehr.jpg') }}" alt="Electronic health record dashboard" class="img-fluid w-100 mb-3">
                <h5>Operational Control</h5>
                <p class="text-muted mb-3">
                    Admin access connects patient management, treatment reporting, pharmacy records, and team oversight.
                </p>
                <a href="{{ route('patients.index') }}" class="btn btn-custom-primary me-2 mb-2">Manage Patients</a>
                <a href="{{ route('treatments.index') }}" class="btn btn-outline-primary mb-2">View Treatments</a>
            </div>
        </div>
    </div>
@endsection
