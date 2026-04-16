@extends('layouts.app')

@section('title', 'Add Drug | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Add Drug', 'parent' => 'Drugs'])

    <div class="form-card">
        <h3 class="mb-4">Add Drug</h3>

        <form action="{{ route('drugs.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Drug Name</label>
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
                    <label for="category_id" class="form-label">Category</label>
                    <select
                        name="category_id"
                        id="category_id"
                        class="form-select @error('category_id') is-invalid @enderror"
                    >
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        id="price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}"
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control @error('stock') is-invalid @enderror"
                        value="{{ old('stock') }}"
                    >
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-custom-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Drug
                </button>
                <a href="{{ route('drugs.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection