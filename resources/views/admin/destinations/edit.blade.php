@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Edit Destination</h2>
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $destination->name }}">
            </div>
            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="{{ $destination->location }}">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" rows="4" class="form-control">{{ $destination->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Image</label><br>
                @if($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" width="100" class="mb-2">
                @endif
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection