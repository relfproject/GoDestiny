@extends('layouts.app')

@section('title', 'Create Destination')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create Destination</h1>

        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Facilities</label>
                <div class="row">
                    @foreach($facilities as $facility)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" name="facilities[]" value="{{ $facility }}" class="form-check-input"
                                    id="fac-{{ $loop->index }}">
                                <label class="form-check-label" for="fac-{{ $loop->index }}">{{ $facility }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection