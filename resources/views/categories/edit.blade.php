@extends('layouts.app')

@section('title', 'Edit Category | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Edit Category', 'parent' => 'Drug Categories'])

    <div class="form-card">
        <h3 class="mb-4">Edit Drug Category</h3>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}"
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-custom-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Update Category
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection