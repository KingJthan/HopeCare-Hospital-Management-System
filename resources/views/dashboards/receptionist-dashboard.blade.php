@extends('layouts.app')

@section('title', 'Reception Dashboard | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Reception Dashboard'])

    <div class="dashboard-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="dashboard-hero-content">
                    <div class="dashboard-eyebrow">Front desk flow</div>
                    <h1>Premium first contact for every patient.</h1>
                    <p class="mb-0">
                        Register patients, manage automatic tokens, and keep the waiting experience organized from arrival to clinical handoff.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/reception.jpg') }}" alt="HopeCare reception" class="dashboard-hero-image">
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-user-injured"></i></div>
                <div><h6>Total Patients</h6><h3>{{ $totalPatients }}</h3></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-ticket"></i></div>
                <div><h6>Queue Preview</h6><h3>{{ $queuePatients->count() }}</h3></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="custom-card">
                <div class="card-header-custom">
                    <h5 class="mb-0">Recent Patients</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPatients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No patients found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-panel">
                <img src="{{ asset('images/walk-way.jpg') }}" alt="Hospital walkway" class="img-fluid w-100 mb-3">
                <h5>Reception Actions</h5>
                <p class="text-muted">Keep arrivals moving with registration, automatic token visibility, and queue support.</p>
                <a href="{{ route('patients.create') }}" class="btn btn-custom-primary w-100 mb-2">Register Patient</a>
                <a href="{{ route('patients.nowServing') }}" class="btn btn-outline-primary w-100">Now Serving</a>
            </div>
        </div>
    </div>
@endsection
