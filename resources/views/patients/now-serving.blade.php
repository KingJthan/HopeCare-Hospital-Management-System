@extends('layouts.app')

@section('title', 'Now Serving | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Now Serving'])

    <div class="serving-hero mb-4">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-7">
                <div class="serving-hero-content">
                    <div class="dashboard-eyebrow">Queue command center</div>
                    <h1>Now Serving</h1>
                    <p>
                        Monitor the live patient queue, update token numbers, and route each patient to the right doctor from one polished control board.
                    </p>
                    <div class="serving-stats">
                        <span><strong>{{ $activeTokenCount }}</strong> active tokens</span>
                        <span><strong>{{ $doctors->count() }}</strong> doctors available</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="serving-current-card">
                    <span class="serving-label">Currently serving</span>
                    @if($current)
                        <div class="serving-token">{{ $current->token_number }}</div>
                        <h3>{{ $current->name }}</h3>
                        <p class="mb-2">Please proceed to the consultation room.</p>
                        <div class="doctor-chip">
                            <i class="fa-solid fa-user-doctor"></i>
                            {{ $current->assignedDoctor?->name ?? 'Doctor not assigned yet' }}
                        </div>
                    @else
                        <div class="serving-empty">
                            <i class="fa-solid fa-ticket"></i>
                            <h3>No active patient</h3>
                            <p class="mb-0">Assign tokens to patients and they will appear here.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-12">
            <div class="dashboard-panel">
                <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
                    <div>
                        <span class="chart-kicker">Waiting queue</span>
                        <h5 class="mb-1">Next Patients</h5>
                        <p class="text-muted mb-0">These patients are waiting after the current token.</p>
                    </div>
                    <a href="{{ route('patients.create') }}" class="btn btn-custom-primary align-self-lg-start">
                        <i class="fa-solid fa-plus me-1"></i> Register Patient
                    </a>
                </div>

                <div class="row g-3">
                    @forelse($queue as $patient)
                        <div class="col-md-6 col-xl-3">
                            <div class="queue-card">
                                <div class="queue-token">{{ $patient->token_number }}</div>
                                <h6>{{ $patient->name }}</h6>
                                <p class="mb-0">
                                    <i class="fa-solid fa-user-doctor me-1"></i>
                                    {{ $patient->assignedDoctor?->name ?? 'Doctor pending' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="queue-empty">No patients are waiting after the current token.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-panel">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
            <div>
                <span class="chart-kicker">Queue controls</span>
                <h5 class="mb-1">Change Tokens And Assign Doctors</h5>
                <p class="text-muted mb-0">
                    Type a token like <strong>F012</strong> or just <strong>12</strong>. Numeric entries are formatted automatically.
                </p>
            </div>
            <a href="{{ route('patients.index') }}" class="btn btn-outline-primary align-self-lg-start">
                <i class="fa-solid fa-users me-1"></i> All Patients
            </a>
        </div>

        <div class="table-responsive">
            <table class="table serving-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Token</th>
                        <th>Patient</th>
                        <th>Current Doctor</th>
                        <th width="430">Update Queue</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($managedPatients as $patient)
                        <tr>
                            <td>
                                <span class="token-pill {{ $patient->token_number ? '' : 'token-pill-muted' }}">
                                    {{ $patient->token_number ?? 'No token' }}
                                </span>
                            </td>
                            <td>
                                <strong>{{ $patient->name }}</strong>
                                <div class="text-muted small">{{ $patient->gender }} | {{ $patient->age }} years | {{ $patient->phone }}</div>
                            </td>
                            <td>
                                {{ $patient->assignedDoctor?->name ?? 'Not assigned' }}
                            </td>
                            <td>
                                <form action="{{ route('patients.updateQueue', $patient) }}" method="POST" class="queue-update-form">
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="text"
                                        name="token_number"
                                        class="form-control @error('token_number') is-invalid @enderror"
                                        value="{{ $patient->token_number }}"
                                        placeholder="F001"
                                        required>

                                    <select name="assigned_doctor_id" class="form-select @error('assigned_doctor_id') is-invalid @enderror">
                                        <option value="">Assign doctor</option>
                                        @forelse($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ (string) $patient->assigned_doctor_id === (string) $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->name }}
                                            </option>
                                        @empty
                                            <option value="" disabled>No doctors registered yet</option>
                                        @endforelse
                                    </select>

                                    <button type="submit" class="btn btn-custom-primary">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Save
                                    </button>

                                    <a href="{{ route('patients.printToken', $patient->id) }}" class="btn btn-outline-primary" target="_blank">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mt-4 mb-0">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
@endsection
