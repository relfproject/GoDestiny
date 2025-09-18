@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-3">{{ $blog->title }}</h1>
    @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded shadow mb-4" alt="{{ $blog->title }}">
    @endif
    <div class="text-muted">
        {!! nl2br(e($blog->content)) !!}
    </div>
    <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-4">← Back to Blog</a>
</div>
@endsection
