@extends('layouts.app')

@section('title', 'Patient Dashboard | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Patient Dashboard'])

    <div class="dashboard-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="dashboard-hero-content">
                    <div class="dashboard-eyebrow">Patient access</div>
                    <h1>Your care information, clearly organized.</h1>
                    <p class="mb-0">
                        View your token, treatment updates, medication notes, and follow-up information in a private patient workspace.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/baby-patient.jpg') }}" alt="HopeCare patient support" class="dashboard-hero-image">
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="dashboard-panel">
                <h5 class="mb-3">My Token</h5>
                @if($latestPatient)
                    <p class="mb-2"><strong>Name:</strong> {{ $latestPatient->name }}</p>
                    <p class="mb-2"><strong>Token:</strong> {{ $latestPatient->token_number ?? 'Not assigned yet' }}</p>
                    <p class="mb-0"><strong>Phone:</strong> {{ $latestPatient->phone }}</p>
                @else
                    <p class="mb-0">No patient record found.</p>
                @endif
                <a href="{{ route('patient.token') }}" class="btn btn-custom-primary mt-4">View Token Page</a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="dashboard-panel">
                <h5 class="mb-3">My Latest Treatment</h5>
                @if($latestTreatment)
                    <p class="mb-2"><strong>Treatment ID:</strong> {{ $latestTreatment->id }}</p>
                    <p class="mb-2"><strong>Drug:</strong> {{ $latestTreatment->drug->name ?? 'N/A' }}</p>
                    <p class="mb-2"><strong>Dosage:</strong> {{ $latestTreatment->dosage }}</p>
                    <p class="mb-2"><strong>Date:</strong> {{ $latestTreatment->date }}</p>
                    <p class="mb-0"><strong>Notes:</strong> {{ $latestTreatment->notes ?? 'No notes' }}</p>
                @else
                    <p class="mb-0">No treatment found.</p>
                @endif
                <a href="{{ route('patient.treatments') }}" class="btn btn-outline-primary mt-4">View Treatments</a>
            </div>
        </div>
    </div>

    <div class="custom-card mt-4">
        <div class="card-header-custom">
            <h5 class="mb-0">My Recent Treatments</h5>
        </div>
        @if(isset($patientTreatments) && $patientTreatments->count())
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Treatment ID</th>
                            <th>Drug</th>
                            <th>Dosage</th>
                            <th>Date</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patientTreatments as $treatment)
                            <tr>
                                <td>{{ $treatment->id }}</td>
                                <td>{{ $treatment->drug->name ?? 'N/A' }}</td>
                                <td>{{ $treatment->dosage }}</td>
                                <td>{{ $treatment->date }}</td>
                                <td>{{ $treatment->notes ?? 'No notes' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4">
                <p class="mb-0">No treatment history available.</p>
            </div>
        @endif
    </div>
@endsection
