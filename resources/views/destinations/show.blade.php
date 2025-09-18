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
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5" data-aos="fade-up">What Visitors Say</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted">"Amazing place! The waterfall is breathtaking and worth the trip."</p>
                        <h6 class="fw-bold mb-0">– Sarah, Traveler</h6>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted">"Clean facilities and great guides. Would recommend to anyone visiting
                            Madura."</p>
                        <h6 class="fw-bold mb-0">– Andi, Backpacker</h6>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted">"Perfect for a family trip, kids loved it!"</p>
                        <h6 class="fw-bold mb-0">– Maria, Family Traveler</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection