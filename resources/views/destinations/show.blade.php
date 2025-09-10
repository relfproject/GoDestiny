@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-4">{{ $destination->name }}</h1>
    <p class="text-gray-600 mb-4">{{ $destination->location }}</p>

    @if($destination->image)
        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}"
             class="my-6 w-full max-w-3xl rounded shadow">
    @endif

    <h2 class="text-xl font-semibold mb-2">Overview</h2>
    <p>{{ $destination->description }}</p>

    <a href="{{ route('destination.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back to List</a>
</div>
@endsection
