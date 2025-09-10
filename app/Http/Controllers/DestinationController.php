<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function home()
    {
        $destinations = Destination::latest()->take(6)->get();
        return view('home', compact('destinations'));
    }

    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        return view('destination.show', compact('destination'));
    }

}

