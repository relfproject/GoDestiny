@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="position-relative text-white">
        <div class="hero-image"
            style="background: url('{{ asset('storage/' . $destination->image) }}') center/cover no-repeat; height: 80vh; filter: brightness(70%);">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h1 class="fw-bold display-2" data-aos="fade-up">{{ $destination->name }}</h1>
            <p class="fs-5" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt-fill"></i> {{ $destination->location }}
            </p>
        </div>
    </section>

    <!-- About Section -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="fw-bold mb-3">About Destination</h2>
                <p class="text-muted lh-lg">{{ $destination->description }}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded shadow" alt="">
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Facilities</h2>
            <div class="row g-4 justify-content-center">

                @php
                    // mapping fasilitas ke icon Bootstrap
                    $icons = [
                        'Wi-Fi' => 'bi-wifi',
                        'Parkir' => 'bi-car-front',
                        'Penginapan' => 'bi-house-door',
                        'Restoran' => 'bi-cup-straw',
                        'Mushola' => 'bi-moon-stars',
                        'Pusat Oleh-oleh' => 'bi-bag-heart',
                        'Pemandu Wisata' => 'bi-person-badge',
                        'Area Bermain Anak' => 'bi-joystick',
                        'Tempat Duduk/Taman' => 'bi-tree',
                        'ATM' => 'bi-cash-stack',
                        'Shuttle/Transportasi' => 'bi-bus-front',
                        'Kolam Renang' => 'bi-water',
                        'CCTV Keamanan' => 'bi-camera-video',
                        'Toilet' => 'bi-droplet',
                        'Pusat Informasi' => 'bi-info-circle',
                        'Tempat Sampah' => 'bi-trash',
                    ];

                    $facilities = json_decode($destination->facilities, true) ?? [];
                @endphp

                @foreach($facilities as $facility)
                    <div class="col-md-4 col-lg-3" data-aos="fade-up">
                        <div class="card border-0 shadow-sm text-center p-4 h-100">
                            <i class="bi {{ $icons[$facility] ?? 'bi-check-circle' }} display-4 text-primary mb-3"></i>
                            <h5 class="fw-bold">{{ $facility }}</h5>
                            <p class="text-muted">
                                available {{ strtolower($facility) }} at this destination.
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- Itinerary Section -->
    <section class="container py-5">
        <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Suggested Itinerary</h2>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-right">
                <h5 class="fw-bold">Day 1</h5>
                <p>Arrival, check-in, and enjoy local sightseeing.</p>
            </div>
            <div class="timeline-item" data-aos="fade-left">
                <h5 class="fw-bold">Day 2</h5>
                <p>Explore {{ $destination->name }} with a guided tour.</p>
            </div>
            <div class="timeline-item" data-aos="fade-right">
                <h5 class="fw-bold">Day 3</h5>
                <p>Relax, shopping, and departure.</p>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
<section class="container py-5">
    <h2 class="fw-bold text-center mb-5">Our Customer Reviews</h2>

    @php
        $averageRating = round($destination->reviews->avg('rating'), 1);
        $ratingCount = $destination->reviews->count();
        $ratingGroups = $destination->reviews->groupBy('rating')->map->count();
    @endphp

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 p-5 mb-5">
                <div class="row align-items-center">
                    <!-- Grafik Rating -->
                    <div class="col-md-7">
                        @for ($i = 5; $i >= 1; $i--)
                            @php
                                $percent = $ratingCount ? (($ratingGroups[$i] ?? 0) / $ratingCount) * 100 : 0;
                            @endphp
                            <div class="d-flex align-items-center mb-3">
                                <span class="me-2 fw-medium" style="width: 50px;">{{ $i }} ★</span>
                                <div class="progress flex-grow-1" style="height: 8px;">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                        style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <span class="ms-3 text-muted">{{ $ratingGroups[$i] ?? 0 }}</span>
                            </div>
                        @endfor
                    </div>

                    <!-- Nilai Rata-rata -->
                    <div class="col-md-5 text-center">
                        <h1 class="display-4 fw-bold text-warning mb-1">{{ $averageRating ?: '0.0' }}</h1>
                        <div class="mb-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-secondary' }}"></i>
                            @endfor
                        </div>
                        <p class="text-muted mb-0">{{ $ratingCount }} Ratings</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Review -->
            @forelse ($destination->reviews as $review)
                <div class="border-bottom pb-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-circle bg-warning-subtle text-warning fw-bold d-flex align-items-center justify-content-center me-3"
                                style="width: 45px; height: 45px;">
                                {{ strtoupper(substr($review->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">{{ $review->name }}</h6>
                                <div class="text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                    </div>
                    <p class="text-secondary mb-0">{{ $review->comment }}</p>
                </div>
            @empty
                <p class="text-center text-muted">No reviews yet. Be the first to review this destination!</p>
            @endforelse

            <!-- Form Tambah Review -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mt-5">
                <h5 class="fw-bold mb-3">Leave a Review</h5>
                <form method="POST" action="{{ route('review.store', $destination) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Rating</label>
                        <div class="rating d-flex gap-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" name="rating" value="{{ $i }}" class="btn-check" id="rate-{{ $i }}"
                                    required>
                                <label class="btn btn-outline-warning rounded-circle" for="rate-{{ $i }}">
                                    <i class="fas fa-star"></i>
                                </label>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea name="comment" rows="3" class="form-control rounded-3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning text-white fw-semibold px-4">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection