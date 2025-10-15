<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // Halaman depan (home)
    public function home()
    {
        // Ambil semua destinasi dengan review-nya
        $destinations = Destination::with('reviews')->latest()->get();

        // Kirim ke view home.blade.php
        return view('home', compact('destinations'));
    }

    // Halaman daftar destinasi
    public function index()
    {
        $destinations = Destination::latest()->paginate(9);
        return view('destinations.index', compact('destinations'));
    }

    // Halaman detail destinasi
    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->with('reviews')->firstOrFail();
        return view('destinations.show', compact('destination'));
    }

    // Halaman pencarian
    public function search(Request $request)
    {
        $query = $request->input('query');

        $destinations = Destination::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(9);

        return view('search', compact('destinations', 'query'));
    }
}
