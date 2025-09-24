@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Welcome Card -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-gradient-primary shadow-lg border-0 rounded-4">
                    <div class="card-body text-center text-black p-5">
                        <h1 class="fw-bold display-5 mb-3 animate__animated animate__fadeInDown">
                            Welcome, Admin 🎉
                        </h1>
                        <p class="lead mb-4 animate__animated animate__fadeInUp">
                            Kamu berhasil login! Dari sini kamu bisa mengelola destinasi wisata atau kembali ke halaman
                            utama.
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-lg btn-light px-4 shadow-sm rounded-pill">
                                <i class="fas fa-home me-2"></i> Home
                            </a>
                            <a href="{{ route('admin.destinations.index') }}"
                                class="btn btn-lg btn-light px-4 shadow-sm rounded-pill">
                                <i class="fas fa-map-marker-alt me-2"></i> Kelola Destinasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Card -->
        <div class="row mt-5 g-4">
            <!-- Total Destinasi -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-card">
                    <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                    <h5 class="text-muted">Total Destinasi</h5>
                    <h2 class="fw-bold text-dark">{{ \App\Models\Destination::count() }}</h2>
                </div>
            </div>

            <!-- Pengguna -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-card">
                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                    <h5 class="text-muted">Pengguna</h5>
                    <h2 class="fw-bold text-dark">{{ \App\Models\User::count() }}</h2>
                </div>
            </div>

            <!-- Statistik -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center hover-card">
                    <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                    <h5 class="text-muted">Statistik</h5>
                    <h2 class="fw-bold text-dark">+25%</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Extra CSS -->
    @push('styles')
        <style>
            .bg-gradient-primary {
                background: linear-gradient(135deg, #4e73df, #224abe);
            }

            .hover-card {
                transition: all 0.3s ease;
            }

            .hover-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(45, 48, 248, 0.51);
            }
        </style>
    @endpush
@endsection