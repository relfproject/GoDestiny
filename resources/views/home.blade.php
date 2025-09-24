@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="position-relative text-white"
        style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.3)), url('{{ asset('storage/images/new.jpg') }}') center/cover no-repeat; height: 100vh;">
        <div class="d-flex align-items-center justify-content-center h-100 text-center">
            <div class="animate__animated animate__fadeInDown hero-text">
                <h1 class="display-2 fw-bold mb-3 text-gradient">Find Your Dream Destination</h1>
                <p class="lead fs-4 mb-4">🌍 Discover hidden gems & unforgettable adventures</p>
                <form action="{{ route('search') }}" method="GET"
                    class="d-flex justify-content-center mt-3 shadow-lg rounded-pill bg-white p-2 px-3">
                    <i class="bi bi-search fs-5 text-muted me-2 my-auto"></i>
                    <input type="text" name="query"
                        class="form-control border-0 rounded-pill px-3"
                        placeholder="Search destinations..." value="{{ request('query') }}">
                    <button class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">Search</button>
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
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 hover-card position-relative">
                            <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top"
                                alt="{{ $dest->name }}" style="height: 240px; object-fit: cover;">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Trending</span>
                                <h5 class="fw-bold">{{ $dest->name }}</h5>
                                <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> {{ $dest->location }}</p>
                                <div class="text-warning mb-2">⭐️⭐️⭐️⭐️⭐️</div>
                                <p class="small text-muted">{{ Str::limit($dest->description, 80) }}</p>
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
                <a href="{{ route('destination.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">Explore More</a>
            </div>
            <div class="row g-4">
                @foreach($destinations->take(6) as $dest)
                    <div class="col-md-4">
                        <div class="card border-0 shadow rounded-4 overflow-hidden h-100 hover-card">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top"
                                    alt="{{ $dest->name }}" style="height: 230px; object-fit: cover;">
                                <span class="badge bg-info text-dark position-absolute top-0 start-0 m-2 px-3 py-2 shadow-sm">Top</span>
                            </div>
                            <div class="card-body text-center">
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

    <!-- Testimonials (Carousel) -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">💬 Traveler Testimonials</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card p-4 shadow border-0 rounded-4 mx-auto" style="max-width: 500px;">
                            <p class="fst-italic">"GoDestiny made our trip unforgettable. Everything was smooth & amazing!"</p>
                            <h6 class="fw-bold mb-0">Sarah Johnson</h6>
                            <small class="text-muted">USA</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card p-4 shadow border-0 rounded-4 mx-auto" style="max-width: 500px;">
                            <p class="fst-italic">"One of the best travel experiences of my life. Highly recommended."</p>
                            <h6 class="fw-bold mb-0">Michael Lee</h6>
                            <small class="text-muted">Singapore</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card p-4 shadow border-0 rounded-4 mx-auto" style="max-width: 500px;">
                            <p class="fst-italic">"Booking was easy, guides were professional, and destinations breathtaking!"</p>
                            <h6 class="fw-bold mb-0">Ayu Kartika</h6>
                            <small class="text-muted">Indonesia</small>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hover-card {
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }
        .hover-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        .text-gradient {
            background: linear-gradient(90deg, #ff8a00, #e52e71);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endpush
