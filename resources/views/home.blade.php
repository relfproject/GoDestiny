@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Find Your Suitable Destination</h1>
            <p class="lead">Explore incredible things to do</p>
            <form class="d-flex justify-content-center mt-3">
                <input type="text" class="form-control w-50 me-2" placeholder="Search Destination">
                <button class="btn btn-warning">Search</button>
            </form>
        </div>
    </section>

    <!-- Trending Tours -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Trending Tours</h2>
            <div class="row">
                @foreach($destinations as $dest)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $dest->image) }}" class="card-img-top" alt="{{ $dest->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dest->name }}</h5>
                                <p class="card-text text-muted">{{ $dest->location }}</p>
                                <a href="{{ route('destination.show', $dest->slug) }}" class="btn btn-outline-primary">View
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection