<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Destinations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            background: #f4f6fa;
            font-family: 'Poppins', sans-serif;
            padding: 40px;
        }

        .page-header {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            border-radius: 25px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .page-header h2 {
            font-weight: 700;
            font-size: 2rem;
        }

        .btn-add {
            background: #fff;
            color: #224abe;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all .3s ease;
        }

        .btn-add:hover {
            background: #e9ecff;
            transform: translateY(-3px);
        }

        .card-container {
            margin-top: 50px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            animation: fadeInUp 0.7s ease;
        }

        table {
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #f8f9fc;
        }

        th {
            font-weight: 600;
            color: #444;
        }

        td {
            vertical-align: middle;
        }

        .action-btns button,
        .action-btns a {
            border-radius: 8px;
            transition: 0.3s;
        }

        .action-btns a:hover,
        .action-btns button:hover {
            transform: translateY(-2px);
        }

        .pagination {
            justify-content: center;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid animate__animated animate__fadeIn">

        <!-- Header -->
        <div class="page-header mb-5">
            <h2>🌍 Manage Destinations</h2>
            <p class="text-light mb-4">Kelola semua destinasi wisata yang ada di database Anda</p>
            <a href="{{ route('admin.destinations.create') }}" class="btn btn-add">
                <i class="fas fa-plus-circle me-2"></i> Add New Destination
            </a>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success text-center mx-auto" style="max-width: 800px;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="card-container">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($destinations as $dest)
                            <tr>
                                <td>
                                    @if ($dest->image)
                                        <img src="{{ asset('storage/' . $dest->image) }}" alt="{{ $dest->name }}"
                                            class="rounded shadow-sm" width="100" height="70" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $dest->name }}</td>
                                <td class="text-muted">{{ $dest->location }}</td>
                                <td class="text-center action-btns">
                                    <a href="{{ route('admin.destinations.edit', $dest) }}"
                                        class="btn btn-sm btn-warning me-1 px-3 shadow-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.destinations.destroy', $dest) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this destination?')"
                                            class="btn btn-sm btn-danger px-3 shadow-sm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    <i class="fas fa-folder-open fa-2x mb-3"></i><br>
                                    No destinations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $destinations->links() }}
        </div>
         <div class="card-footer text-center bg-white">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary rounded-pill">
                    ← Back
                </a>
            </div>

    </div>

</body>

</html>
