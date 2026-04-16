@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h2 class="fw-bold mb-1">Doctor Dashboard</h2>
            <p class="text-muted mb-0">Treatments and medicine management</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0"><div class="card-body">
                <h6>Total Drugs</h6>
                <h3>{{ $totalDrugs }}</h3>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0"><div class="card-body">
                <h6>Drug Categories</h6>
                <h3>{{ $totalCategories }}</h3>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0"><div class="card-body">
                <h6>Total Treatments</h6>
                <h3>{{ $totalTreatments }}</h3>
            </div></div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="mb-3">Recent Treatments</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTreatments as $treatment)
                        <tr>
                            <td>{{ $treatment->id }}</td>
                            <td>{{ $treatment->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No treatments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection