@extends('layouts.app')

@section('title', 'Add Treatment | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Add Treatment', 'parent' => 'Treatments'])

    <div class="form-card">
        <h3 class="mb-4">Add Treatment</h3>

        <form action="{{ route('treatments.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="patient_id" class="form-label">Patient</label>
                    <select
                        name="patient_id"
                        id="patient_id"
                        class="form-select @error('patient_id') is-invalid @enderror"
                    >
                        <option value="">Select Patient</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="drug_id" class="form-label">Drug</label>
                    <select
                        name="drug_id"
                        id="drug_id"
                        class="form-select @error('drug_id') is-invalid @enderror"
                    >
                        <option value="">Select Drug</option>
                        @foreach($drugs as $drug)
                            <option value="{{ $drug->id }}" {{ old('drug_id') == $drug->id ? 'selected' : '' }}>
                                {{ $drug->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('drug_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="dosage" class="form-label">Dosage</label>
                    <input
                        type="text"
                        name="dosage"
                        id="dosage"
                        class="form-control @error('dosage') is-invalid @enderror"
                        value="{{ old('dosage') }}"
                    >
                    @error('dosage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date') }}"
                    >
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea
                        name="notes"
                        id="notes"
                        rows="4"
                        class="form-control @error('notes') is-invalid @enderror"
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-custom-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Treatment
                </button>
                <a href="{{ route('treatments.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection