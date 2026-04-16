@extends('layouts.app')

@section('title', 'My Token | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'My Token'])

    <div class="container-fluid">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h2 class="fw-bold mb-1">My Token</h2>
                <p class="text-muted mb-0">View your token information</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if($patient)
                    <div class="row g-3">
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Name:</strong> {{ $patient->name }}</p>
                            <p class="mb-2"><strong>Gender:</strong> {{ $patient->gender }}</p>
                            <p class="mb-2"><strong>Age:</strong> {{ $patient->age }}</p>
                        </div>

                        <div class="col-md-6">
                            <p class="mb-2"><strong>Phone:</strong> {{ $patient->phone }}</p>
                            <p class="mb-2"><strong>Address:</strong> {{ $patient->address }}</p>
                            <p class="mb-0">
                                <strong>Token Number:</strong>
                                <span class="badge bg-primary fs-6">{{ $patient->token_number ?? 'Not assigned yet' }}</span>
                            </p>
                        </div>
                    </div>
                @else
                    <p class="mb-0">No patient token found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection