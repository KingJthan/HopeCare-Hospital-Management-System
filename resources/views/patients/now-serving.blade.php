@extends('layouts.app')

@section('title', 'Now Serving | HopeCare Hospital')

@section('content')
<div class="container text-center">

    <h2 class="mb-4">Now Serving</h2>

    {{-- CURRENT PATIENT --}}
    <div class="card shadow border-0 mb-4">
        <div class="card-body text-center p-5">

            @if($current)
                <div style="font-size: 4rem; font-weight: bold; color: #0d6efd;">
                    {{ $current->token_number }}
                </div>

                <h4 class="mt-3">{{ $current->name }}</h4>

                <p class="text-muted mb-0">
                    Please proceed to the consultation room
                </p>
            @else
                <p>No patient currently being served</p>
            @endif

        </div>
    </div>

    {{-- QUEUE --}}
    <h4 class="mb-3">Waiting Queue</h4>

    <div class="row justify-content-center">
        @forelse($queue as $patient)
            <div class="col-md-2 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <strong style="font-size: 1.5rem;">
                            {{ $patient->token_number }}
                        </strong>
                        <p class="mb-0 small">{{ $patient->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No patients in queue</p>
        @endforelse
    </div>

</div>
@endsection