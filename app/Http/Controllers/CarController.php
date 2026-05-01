<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query()->where('status', 'available');

        // A list of makes
        $makes = Car::distinct()->pluck('make');
        // Min and max price for the price range filter
        $minPrice = Car::min('price_per_day');
        $maxPrice = Car::max('price_per_day');

        // Filter by make
        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        // Filter by transmission
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        $cars = $query->get();

        return view('cars.index', compact('cars', 'makes', 'minPrice', 'maxPrice'));
    }

    public function show($id)
    {
        $car = Car::with('images', 'primaryImage')->findOrFail($id);

        return view('cars.show', compact('car'));
    }
}
