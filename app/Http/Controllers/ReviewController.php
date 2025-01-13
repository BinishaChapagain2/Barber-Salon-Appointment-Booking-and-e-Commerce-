<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{



    // Store a new review
    // Store a new review
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
        Review::create([
            'user_id' => Auth::id(), // Authenticated user ID
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Your feedback is valuable to us! Thank you for your review -Gentelman Barbershop');
    }
}
