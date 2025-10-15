<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destination</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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

        .card-form {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 850px;
            margin: 60px auto;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        .form-check-input {
            border-radius: 6px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #4e73df;
            border-color: #224abe;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4e73df, #224abe);
            border: none;
            color: #fff;
            border-radius: 50px;
            font-weight: 600;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #5a7ff0, #2d4fc7);
        }

        .btn-back {
            border-radius: 50px;
            font-weight: 600;
            color: #224abe;
            background: #fff;
            border: 1px solid #224abe;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #e9ecff;
            transform: translateY(-3px);
        }

        .preview-img {
            border-radius: 10px;
            margin-top: 10px;
            max-height: 150px;
        }
    </style>
</head>

<body>

    <div class="page-header">
        <h2>✏️ Edit Destination</h2>
        <p class="text-light">Perbarui informasi destinasi & fasilitasnya</p>
    </div>

    <div class="card-form">
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Destination Name</label>
                <input type="text" name="name" class="form-control" value="{{ $destination->name }}" required>
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="{{ $destination->location }}" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $destination->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Facilities</label>
                <div class="row">
                    @php
                        $facilities = ['Toilet', 'Rest Area', 'Parking Lot', 'Restaurant', 'WiFi', 'ATM', 'Mushola', 'Guide', 'Souvenir Shop', 'Information Center'];
                        $selectedFacilities = json_decode($destination->facilities, true) ?? [];
                    @endphp
                    @foreach($facilities as $facility)
                        <div class="col-md-3 col-sm-6 mb-2">
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
                <label>Current Image</label><br>
                @if ($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}"
                        class="preview-img shadow-sm">
                @else
                    <p class="text-muted">No image uploaded</p>
                @endif
            </div>

            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('admin.destinations.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save me-2"></i> Update Destination
                </button>
            </div>
        </form>
    </div>

</body>
</html>
