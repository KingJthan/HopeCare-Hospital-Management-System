@extends('layouts.app')

@section('title', 'Patients | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Patients'])

    <div class="module-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <img src="{{ asset('images/patient-care.jpg') }}" alt="Patients">
            </div>
            <div class="col-lg-8">
                <div class="banner-text">
                    <h3>Patients Management</h3>
                    <p class="mb-3">
                        Manage hospital patient records, contact details, gender, age, address information, and patient token numbers in one organized page.
                    </p>
                    <a href="{{ route('patients.create') }}" class="btn btn-custom-primary">
                        <i class="fa-solid fa-plus me-1"></i> Add Patient
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
                        <th>Token</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="320">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>
                                @if($patient->token_number)
                                    <span style="background:#0d6efd;color:white;padding:5px 10px;border-radius:5px;font-weight:600;display:inline-block;">
                                        {{ $patient->token_number }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">Not Assigned</span>
                                @endif
                            </td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>
                                @if(!$patient->token_number)
                                    <form action="{{ route('patients.assignToken', $patient->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success me-1 mb-1">
                                            <i class="fa-solid fa-ticket me-1"></i> Assign Token
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-custom-warning me-1 mb-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <a href="{{ route('patients.printToken', $patient->id) }}" class="btn btn-sm btn-primary me-1 mb-1" target="_blank">
                                    <i class="fa-solid fa-print"></i> Print
                                </a>

                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-custom-danger mb-1">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection