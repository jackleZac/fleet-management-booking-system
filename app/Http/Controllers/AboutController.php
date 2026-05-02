<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Review;

class AboutController extends Controller
{
    public function index()
    {
        $numOfCars = Car::count();
        $avgRating = Review::avg('rating');
        return view('about', compact('numOfCars', 'avgRating'));
    }
}