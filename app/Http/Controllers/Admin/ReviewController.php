<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::all();

        // Filter by rating
        if ($request->filled('rating')) {
            $reviews = $reviews->where('rating', $request->rating);
        }

        // Sort by rating
        if ($request->filled('sort_rating')) {
            $reviews = $reviews->sortBy('rating', SORT_REGULAR, $request->sort_rating === 'desc');
        }

        // Sort by date
        if ($request->filled('sort_date')) {
            $reviews = $reviews->sortBy('created_at', SORT_REGULAR, $request->sort_date === 'desc');
        }

        return view('admin.reviews', compact('reviews'));
    }
}
