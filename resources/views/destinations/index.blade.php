@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Destinations</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($destinations as $destination)
            <div class="border rounded shadow p-4 hover:shadow-lg transition">
                @if($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover rounded mb-4">
                @endif
                <h2 class="text-xl font-semibold">{{ $destination->name }}</h2>
                <p class="text-gray-600">{{ $destination->location }}</p>
                <a href="{{ route('destination.show', $destination->slug) }}" class="mt-2 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
