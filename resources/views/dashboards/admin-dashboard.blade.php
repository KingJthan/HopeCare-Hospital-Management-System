@extends('layouts.app')

@section('title', 'Admin Dashboard | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Admin Dashboard'])

    <div class="hero-banner mb-4">
        <div class="hero-overlay">
            <div class="row align-items-center w-100">
                <div class="col-lg-8">
                    <h1>Welcome to the Admin Dashboard</h1>
                    <p class="mb-2">
                        Manage all hospital operations from one central place.
                    </p>
                    <p class="mb-0">
                        <strong>Today:</strong> {{ now()->format('l, d F Y') }}
                    </p>
                </div>

                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <img src="{{ asset('images/hospital-building.jpg') }}" alt="Hospital Building" class="hero-side-image">
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary-subtle">
                    <i class="fa-solid fa-user-injured"></i>
                </div>
                <div>
                    <h6>Total Patients</h6>
                    <h3>{{ $totalPatients }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-subtle">
                    <i class="fa-solid fa-capsules"></i>
                </div>
                <div>
                    <h6>Total Drugs</h6>
                    <h3>{{ $totalDrugs }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-warning-subtle">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div>
                    <h6>Drug Categories</h6>
                    <h3>{{ $totalCategories }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-danger-subtle">
                    <i class="fa-solid fa-notes-medical"></i>
                </div>
                <div>
                    <h6>Total Treatments</h6>
                    <h3>{{ $totalTreatments }}</h3>
                </div>
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
                                <tr>
                                    <td colspan="5" class="text-center">No patient records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="custom-card h-100">
                <div class="card-header-custom">
                    <h5 class="mb-0">Admin Access</h5>
                </div>

                <div class="p-3">
                    <img src="{{ asset('images/doctor-team.jpg') }}" alt="Doctor Team" class="img-fluid rounded dashboard-image mb-3">
                    <p class="mb-0">
                        As an administrator, you can manage patients, drug categories, drugs, and treatments
                        across the entire HopeCare Hospital Management System.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection