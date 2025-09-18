@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Destinations</h2>
        <div class="row g-4">
            @foreach ($destinations as $destination)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="card-img-wrapper position-relative">
                            <img src="{{ asset('storage/' . $destination->image) }}" class="card-img-top img-fluid"
                                alt="{{ $destination->name }}"
                                style="height: 230px; object-fit: cover; transition: transform 0.4s;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $destination->name }}</h5>
                            <p class="text-muted mb-2">{{ $destination->location }}</p>
                            <a href="{{ route('destination.show', $destination->slug) }}"
                                class="btn btn-primary btn-sm rounded-pill px-4">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Hover effect untuk gambar */
        .card-img-wrapper img:hover {
            transform: scale(1.1);
        }
    </style>
@endsection