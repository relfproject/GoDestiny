@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-3">Welcome to Dashboard 🎉</h1>
    <p>Kamu berhasil login. Dari sini kamu bisa mengelola destinasi atau kembali ke home.</p>

    <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-primary me-2">🏠 Home</a>
        <a href="{{ url('/admin/destinations') }}" class="btn btn-success">⚙️ Kelola Destinasi</a>
    </div>
</div>
@endsection