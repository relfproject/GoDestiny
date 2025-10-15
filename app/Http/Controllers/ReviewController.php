<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $destination->reviews()->create($validated);

        return back()->with('success', 'Thank you for your review!');
    }
}
