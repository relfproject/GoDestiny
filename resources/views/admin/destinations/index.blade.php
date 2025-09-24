@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <!-- Header + Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">🌍 Destinations</h2>
            <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary shadow-sm px-4">
                + Add Destination
            </a>
        </div>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card Container -->
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinations as $dest)
                            <tr>
                                <!-- Image -->
                                <td>
                                    @if($dest->image)
                                        <img src="{{ asset('storage/' . $dest->image) }}" alt="{{ $dest->name }}"
                                            class="rounded shadow-sm" width="100" height="70" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <!-- Name -->
                                <td class="fw-semibold text-dark">{{ $dest->name }}</td>
                                <!-- Location -->
                                <td class="text-muted">{{ $dest->location }}</td>
                                <!-- Actions -->
                                <td class="text-center">
                                    <a href="{{ route('admin.destinations.edit', $dest) }}"
                                        class="btn btn-sm btn-warning me-1 shadow-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.destinations.destroy', $dest) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this destination?')"
                                            class="btn btn-sm btn-danger shadow-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary rounded-pill">
                    ← Back
                </a>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $destinations->links() }}
        </div>
    </div>
@endsection