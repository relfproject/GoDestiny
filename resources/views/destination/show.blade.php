@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-4">{{ $destination->name }}</h1>
        <p class="text-gray-600">{{ $destination->location }}</p>

        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}"
            class="my-6 w-full max-w-3xl rounded shadow">

        <h2 class="text-xl font-semibold mb-2">Overview</h2>
        <p>{{ $destination->description }}</p>
    </div>
@endsection