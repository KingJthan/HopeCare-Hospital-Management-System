@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h2 class="fw-bold mb-1">Receptionist Dashboard</h2>
            <p class="text-muted mb-0">Manage patients and queue flow</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0"><div class="card-body">
                <h6>Total Patients</h6>
                <h3>{{ $totalPatients }}</h3>
            </div></div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0"><div class="card-body">
                <h6>Queue Preview</h6>
                <h3>{{ $queuePatients->count() }}</h3>
            </div></div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="mb-3">Recent Patients</h5>
            <table class="table">
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
                        <tr>
                            <td colspan="4">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection