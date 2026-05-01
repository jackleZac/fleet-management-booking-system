<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Review;
use App\Models\Promotion;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('is_featured', true)->latest()->take(4)->get();
        $reviews = Review::with('user')
            ->latest()
            ->take(10)
            ->get(); 
        $promotions = Promotion::latest()->take(4)->get(); 
        $faqs = Faq::latest()->get();

        return view('home', compact('cars', 'reviews', 'promotions', 'faqs'));
    }
}
