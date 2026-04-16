@extends('layouts.app')

@section('title', 'Treatments | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Treatments'])

    <div class="module-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <img src="{{ asset('images/treatment.jpg') }}" alt="Treatments">
            </div>
            <div class="col-lg-8">
                <div class="banner-text">
                    <h3>Treatments Management</h3>
                    <p class="mb-3">
                        Manage prescribed treatments by linking patients with drugs, dosage details, dates, and notes.
                    </p>
                    <a href="{{ route('treatments.create') }}" class="btn btn-custom-primary">
                        <i class="fa-solid fa-plus me-1"></i> Add Treatment
                    </a>
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
                        <th>Patient</th>
                        <th>Drug</th>
                        <th>Dosage</th>
                        <th>Date</th>
                        <th>Notes</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($treatments as $treatment)
                        <tr>
                            <td>{{ $treatment->id }}</td>
                            <td>{{ $treatment->patient->name ?? 'No Patient' }}</td>
                            <td>{{ $treatment->drug->name ?? 'No Drug' }}</td>
                            <td>{{ $treatment->dosage }}</td>
                            <td>{{ $treatment->date }}</td>
                            <td>{{ $treatment->notes }}</td>
                            <td>
                                <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-sm btn-custom-warning me-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-custom-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No treatments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection