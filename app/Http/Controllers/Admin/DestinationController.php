<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    private function facilitiesList()
    {
        return [
            "Parkir",
            "Toilet",
            "Penginapan",
            "Mushola",
            "Restoran",
            "Wi-Fi",
            "Pusat Oleh-oleh",
            "Pemandu Wisata",
            "Area Bermain Anak",
            "Tempat Duduk/Taman",
            "ATM",
            "Shuttle/Transportasi",
            "Kolam Renang",
            "CCTV Keamanan",
            "Tempat Sampah",
            "Pusat Informasi",
        ];
    }

    public function index()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        $facilities = $this->facilitiesList();
        return view('admin.destinations.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'facilities' => 'array',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $data['facilities'] = json_encode($request->facilities ?? []);

        Destination::create($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit(Destination $destination)
    {
        $facilities = $this->facilitiesList();
        return view('admin.destinations.edit', compact('destination', 'facilities'));
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'facilities' => 'array',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $data['facilities'] = json_encode($request->facilities ?? []);

        $destination->update($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
