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

    <!-- Customer Reviews Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center mb-5" data-aos="fade-up">What Our Visitors Say</h2>

        <div class="row g-4">
            @foreach ($destinations->take(3) as $destination)
                @php
                    $averageRating = round($destination->reviews->avg('rating'), 1);
                    $latestReview = $destination->reviews->sortByDesc('created_at')->first();
                @endphp

                @if ($latestReview)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                    alt="{{ $destination->name }}"
                                    class="rounded-circle me-3" width="60" height="60"
                                    style="object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $destination->name }}</h6>
                                    <div class="text-warning">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                        <small class="text-muted ms-2">({{ $averageRating }})</small>
                                    </div>
                                </div>
                            </div>

                            <p class="text-muted fst-italic mb-2">
                                “{{ Str::limit($latestReview->comment, 120) }}”
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="rounded-circle bg-warning-subtle text-warning fw-bold d-flex align-items-center justify-content-center me-2"
                                        style="width: 35px; height: 35px;">
                                        {{ strtoupper(substr($latestReview->name, 0, 1)) }}
                                    </div>
                                    <small class="fw-semibold">{{ $latestReview->name }}</small>
                                </div>
                                <a href="{{ route('destination.show', $destination->slug) }}"
                                   class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

@endsection

