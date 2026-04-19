@extends('layouts.app')

@section('title', 'Doctor Dashboard | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Doctor Dashboard'])

    <div class="dashboard-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="dashboard-hero-content">
                    <div class="dashboard-eyebrow">Clinical workspace</div>
                    <h1>Focused care decisions, faster.</h1>
                    <p class="mb-0">
                        Review treatments, coordinate medicine records, and keep patient follow-up clear from one professional doctor workspace.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/doctors.jpg') }}" alt="HopeCare doctors" class="dashboard-hero-image">
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-capsules"></i></div>
                <div><h6>Total Drugs</h6><h3>{{ $totalDrugs }}</h3></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                <div><h6>Drug Categories</h6><h3>{{ $totalCategories }}</h3></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                <div><h6>Total Treatments</h6><h3>{{ $totalTreatments }}</h3></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="custom-card">
                <div class="card-header-custom">
                    <h5 class="mb-0">Recent Treatments</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Drug</th>
                                <th>Dosage</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTreatments as $treatment)
                                <tr>
                                    <td>{{ $treatment->id }}</td>
                                    <td>{{ $treatment->patient->name ?? 'N/A' }}</td>
                                    <td>{{ $treatment->drug->name ?? 'N/A' }}</td>
                                    <td>{{ $treatment->dosage }}</td>
                                    <td>{{ $treatment->date }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-4">No treatments found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-panel">
                <img src="{{ asset('images/talk-to-doctor.jpg') }}" alt="Doctor consultation" class="img-fluid w-100 mb-3">
                <h5>Clinical Actions</h5>
                <p class="text-muted">Create treatment entries, review medications, and keep care notes organized.</p>
                <a href="{{ route('treatments.create') }}" class="btn btn-custom-primary w-100 mb-2">Add Treatment</a>
                <a href="{{ route('drugs.index') }}" class="btn btn-outline-primary w-100">Review Drugs</a>
            </div>
        </div>
    </div>
@endsection
