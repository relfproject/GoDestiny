<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // Halaman depan
    public function home()
    {
        $destinations = Destination::latest()->take(5)->get();
        return view('home', compact('destinations'));
    }

    // Halaman daftar destinasi
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    // Halaman detail destinasi
    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        return view('destinations.show', compact('destination'));
    }
}
