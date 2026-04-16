@extends('layouts.app')

@section('title', 'Drug Categories | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Drug Categories'])

    <div class="module-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <img src="{{ asset('images/pharmacy.jpg') }}" alt="Drug Categories">
            </div>
            <div class="col-lg-8">
                <div class="banner-text">
                    <h3>Drug Categories Management</h3>
                    <p class="mb-3">
                        Organize medicine groups clearly for easier classification and hospital pharmacy management.
                    </p>
                    <a href="{{ route('categories.create') }}" class="btn btn-custom-primary">
                        <i class="fa-solid fa-plus me-1"></i> Add Drug Category
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
                        <th>Name</th>
                        <th>Description</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-custom-warning me-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-custom-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection