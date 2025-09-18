@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="position-relative text-white"
        style="background: url('{{ asset('storage/images/new.jpg') }}') center/cover no-repeat; height: 85vh;">
        <div class="d-flex align-items-center justify-content-center h-100 text-center bg-dark bg-opacity-50">
            <div class="animate__animated animate__fadeInDown">
                <h1 class="display-3 fw-bold">Find Your Suitable Destination</h1>
                <p class="lead">Explore incredible things to do</p>
                <form action="{{ route('search') }}" method="GET" class="d-flex justify-content-center mt-4">
                    <input type="text" name="query" class="form-control w-50 rounded-pill shadow-sm me-2"
                        placeholder="Search Destination..." value="{{ request('query') }}">
                    <button class="btn btn-warning rounded-pill px-4 fw-bold">Search</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Trending Tours -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">🔥 Trending Tours</h2>
                <a href="{{ route('destination.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">See All</a>
            </div>
            <div class="row">
                @foreach($destinations->take(3) as $dest)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 hover-card">
                            <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top" alt="{{ $dest->name }}"
                                style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $dest->name }}</h5>
                                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i>
                                    {{ $dest->location }}</p>
                                <a href="{{ route('destination.show', $dest->slug) }}"
                                    class="btn btn-primary btn-sm rounded-pill px-3">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Destinations -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">🏝️ Top Destinations</h2>
                <a href="{{ route('destination.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">Explore
                    More</a>
            </div>
            <div class="row">
                @foreach($destinations->take(6) as $dest)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow rounded-4 overflow-hidden h-100 hover-card text-center">
                            <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top" alt="{{ $dest->name }}"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $dest->name }}</h5>
                                <p class="text-muted small">{{ Str::limit($dest->description, 70) }}</p>
                                <a href="{{ route('destination.show', $dest->slug) }}"
                                    class="btn btn-outline-primary btn-sm rounded-pill">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Traveler Testimonials</h2>
                <p class="text-muted">Stories from our happy adventurers</p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow border-0 text-center p-4 animate__animated animate__fadeInUp">
                                    <p class="mb-3 fst-italic fs-5">
                                        "GoDestiny made our trip unforgettable. The destinations were amazing and the
                                        service flawless!"
                                    </p>
                                    <h5 class="fw-bold mb-0">Sarah Johnson</h5>
                                    <small class="text-muted">Traveler from USA</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow border-0 text-center p-4 animate__animated animate__fadeInUp">
                                    <p class="mb-3 fst-italic fs-5">
                                        "One of the best travel experiences of my life. Highly recommended for adventure
                                        seekers."
                                    </p>
                                    <h5 class="fw-bold mb-0">Michael Lee</h5>
                                    <small class="text-muted">Traveler from Singapore</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow border-0 text-center p-4 animate__animated animate__fadeInUp">
                                    <p class="mb-3 fst-italic fs-5">
                                        "The booking was easy, the guides were professional, and the destinations
                                        breathtaking!"
                                    </p>
                                    <h5 class="fw-bold mb-0">Ayu Kartika</h5>
                                    <small class="text-muted">Traveler from Indonesia</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Hover effect for cards */
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Animate.css integration (optional) */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
    </style>
@endpush