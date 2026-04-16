@extends('layouts.app')

@section('title', 'Add Patient | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Add Patient', 'parent' => 'Patients'])

    <div class="form-card">
        <h3 class="mb-4">Add New Patient</h3>

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Patient Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select
                        name="gender"
                        id="gender"
                        class="form-select @error('gender') is-invalid @enderror"
                    >
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input
                        type="number"
                        name="age"
                        id="age"
                        class="form-control @error('age') is-invalid @enderror"
                        value="{{ old('age') }}"
                    >
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}"
                    >
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea
                        name="address"
                        id="address"
                        rows="4"
                        class="form-control @error('address') is-invalid @enderror"
                    >{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-custom-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Patient
                </button>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection