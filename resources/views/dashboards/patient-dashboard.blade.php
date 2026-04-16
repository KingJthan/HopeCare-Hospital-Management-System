@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h2 class="fw-bold mb-1">Patient Dashboard</h2>
            <p class="text-muted mb-0">View your token and treatment information</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="mb-3">My Token</h5>
                    @if($latestPatient)
                        <p class="mb-2"><strong>Name:</strong> {{ $latestPatient->name }}</p>
                        <p class="mb-2"><strong>Token:</strong> {{ $latestPatient->token_number ?? 'Not assigned yet' }}</p>
                        <p class="mb-0"><strong>Phone:</strong> {{ $latestPatient->phone }}</p>
                    @else
                        <p class="mb-0">No patient record found.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h5 class="mb-3">My Recent Treatments</h5>

            @if(isset($patientTreatments) && $patientTreatments->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
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
                <p class="mb-0">No treatment history available.</p>
            @endif
        </div>
    </div>
</div>
@endsection