@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold text-center mb-5">Blog</h1>
    <div class="row g-4">
        @forelse($blogs as $blog)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $blog->title }}</h5>
                        <p class="text-muted">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada artikel blog.</p>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
