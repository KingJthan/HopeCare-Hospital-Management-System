@extends('layouts.app')

@section('title', 'My Treatments | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'My Treatments'])

    <div class="module-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <img src="{{ asset('images/treatment.jpg') }}" alt="My Treatments">
            </div>
            <div class="col-lg-8">
                <div class="banner-text">
                    <h3>My Treatment Records</h3>
                    <p class="mb-3">
                        View your treatment records, prescribed drugs, dosage details, treatment dates, and notes.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Drug</th>
                        <th>Dosage</th>
                        <th>Date</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($treatments as $treatment)
                        <tr>
                            <td>{{ $treatment->id }}</td>
                            <td>{{ $treatment->drug->name ?? 'No Drug' }}</td>
                            <td>{{ $treatment->dosage }}</td>
                            <td>{{ $treatment->date }}</td>
                            <td>{{ $treatment->notes ?? 'No notes' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No treatment records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection