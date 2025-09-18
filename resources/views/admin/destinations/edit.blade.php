@extends('layouts.app')

@section('title', 'Edit Destination')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Destination</h1>

    <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $destination->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $destination->location) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $destination->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Facilities</label>
            <div class="row">
                @php
                    $selectedFacilities = json_decode($destination->facilities, true) ?? [];
                @endphp
                @foreach($facilities as $facility)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="{{ $facility }}" class="form-check-input" id="fac-{{ $loop->index }}"
                                {{ in_array($facility, $selectedFacilities) ? 'checked' : '' }}>
                            <label class="form-check-label" for="fac-{{ $loop->index }}">{{ $facility }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label><br>
            @if($destination->image)
                <img src="{{ asset('storage/' . $destination->image) }}" width="150" class="mb-2 rounded shadow">
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
