@extends('layouts.app')

@section('title', 'Drugs | HopeCare Hospital')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Drugs'])

    <div class="module-banner">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <img src="{{ asset('images/drugs.jpg') }}" alt="Drugs">
            </div>
            <div class="col-lg-8">
                <div class="banner-text">
                    <h3>Drugs Management</h3>
                    <p class="mb-3">
                        Manage medicine stock, prices, and assigned categories from one organized hospital pharmacy page.
                    </p>
                    <a href="{{ route('drugs.create') }}" class="btn btn-custom-primary">
                        <i class="fa-solid fa-plus me-1"></i> Add Drug
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
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($drugs as $drug)
                        <tr>
                            <td>{{ $drug->id }}</td>
                            <td>{{ $drug->name }}</td>
                            <td>{{ $drug->category->name ?? 'No Category' }}</td>
                            <td>{{ $drug->price }}</td>
                            <td>{{ $drug->stock }}</td>
                            <td>
                                <a href="{{ route('drugs.edit', $drug->id) }}" class="btn btn-sm btn-custom-warning me-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST" class="d-inline delete-form">
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
                            <td colspan="6" class="text-center">No drugs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection