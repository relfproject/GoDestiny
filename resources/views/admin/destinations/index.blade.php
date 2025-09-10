@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Destinations</h2>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary mb-3">+ Add Destination</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destinations as $dest)
                    <tr>
                        <td>{{ $dest->name }}</td>
                        <td>{{ $dest->location }}</td>
                        <td>
                            @if($dest->image)
                                <img src="{{ asset('storage/' . $dest->image) }}" width="80">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.destinations.edit', $dest) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.destinations.destroy', $dest) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $destinations->links() }}
    </div>
@endsection