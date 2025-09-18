@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body text-center p-5">
                        <h1 class="fw-bold display-5 text-primary">
                            Welcome to Dashboard 🎉
                        </h1>
                        <p class="text-muted mt-3 mb-4">
                            Kamu berhasil login. Dari sini kamu bisa mengelola destinasi wisata atau kembali ke halaman
                            utama.
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary px-4">
                                <i class="fas fa-home me-2"></i> Home
                            </a>
                            <a href="{{ route('admin.destinations.index') }}" class="btn btn-lg btn-success px-4">
                                <i class="fas fa-map-marker-alt me-2"></i> Kelola Destinasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik Card --}}
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                    <i class="fas fa-map-marked-alt fa-2x text-primary mb-3"></i>
                    <h5>Total Destinasi</h5>
                    <h2 class="fw-bold">{{ \App\Models\Destination::count() }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                    <i class="fas fa-users fa-2x text-success mb-3"></i>
                    <h5>Pengguna</h5>
                    <h2 class="fw-bold">{{ \App\Models\User::count() }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                    <i class="fas fa-chart-line fa-2x text-warning mb-3"></i>
                    <h5>Statistik</h5>
                    <h2 class="fw-bold">+25%</h2>
                </div>
            </div>
        </div>
    </div>
@endsection