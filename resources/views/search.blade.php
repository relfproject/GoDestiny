@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Search Results for: <span class="text-primary">"{{ $query }}"</span></h2>

        @if($destinations->count() > 0)
            <div class="row">
                @foreach($destinations as $dest)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top" alt="{{ $dest->name }}"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $dest->name }}</h5>
                                <p class="text-muted small">{{ Str::limit($dest->description, 80) }}</p>
                                <a href="{{ route('destination.show', $dest->slug) }}" class="btn btn-primary btn-sm rounded-pill">
                                    View More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">No destinations found for "{{ $query }}"</div>
        @endif
    </div>
@endsection