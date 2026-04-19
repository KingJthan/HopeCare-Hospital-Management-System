@extends('layouts.app')

@section('title', $title . ' | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => $title])

    <div class="dashboard-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="dashboard-hero-content">
                    <div class="dashboard-eyebrow">Staff workspace</div>
                    <h1>{{ $title }}</h1>
                    <p class="mb-0">{{ $subtitle }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="dashboard-hero-image">
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid {{ $stat['icon'] }}"></i></div>
                    <div>
                        <h6>{{ $stat['label'] }}</h6>
                        <h3>{{ $stat['value'] }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="dashboard-panel">
                <h5 class="mb-3">Today's Focus</h5>
                <div class="d-grid gap-3">
                    @foreach($tasks as $task)
                        <div class="d-flex gap-3">
                            <span class="stat-icon flex-shrink-0" style="width:42px;height:42px;font-size:1rem;">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <p class="mb-0 text-muted">{{ $task }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="custom-card">
                <div class="card-header-custom">
                    <h5 class="mb-0">Recent Patient Activity</h5>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Token</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPatients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->token_number ?? 'Pending' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No patient records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
