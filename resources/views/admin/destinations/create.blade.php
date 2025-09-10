@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Add Destination</h2>
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection