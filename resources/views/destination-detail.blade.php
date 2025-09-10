@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $destination->name }}</li>
            </ol>
        </nav>

        <!-- Photos -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-4"><img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded">
                    </div>
                    <div class="col-4"><img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded">
                    </div>
                    <div class="col-4"><img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>

        <!-- Overview -->
        <h2>{{ $destination->name }}</h2>
        <p class="text-muted">{{ $destination->description }}</p>

        <!-- Facilities -->
        <h3 class="mt-4">Facilities</h3>
        <ul>
            <li>Parking Area</li>
            <li>Toilet</li>
            <li>Food Court</li>
        </ul>

        <!-- Itinerary -->
        <h3 class="mt-4">Itinerary Suggestion</h3>
        <p>Morning walk, Lunch at local restaurant, Sunset view...</p>

        <!-- Reviews -->
        <h3 class="mt-4">Reviews & Ratings</h3>
        <p>⭐⭐⭐⭐☆ (4.5 / 5)</p>
        <blockquote>"Great place to visit with family!"</blockquote>
    </div>
@endsection