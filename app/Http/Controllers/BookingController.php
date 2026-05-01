<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::latest()->where('user_id', auth()->id())->get();

        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with('car.images', 'car.primaryImage')->findOrFail($id);

        return view('bookings.show', compact('booking'));
    }

    public function create($id)
    {
        $car = Car::findOrFail($id);

        return view('bookings.create', compact('car'));
    }

    public function calculateTotalPrice($carId, $startDate, $endDate)
    {
        $car = Car::findOrFail($carId);
        $days = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
        return $car->price_per_day * $days;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'pickup_location' => 'required|string|max:255',
            'return_location' => 'required|string|max:255',
        ]);

        $booking = new Booking($validated);
        $booking->user_id = auth()->id();
        $booking->total_price = $this->calculateTotalPrice($validated['car_id'], $validated['start_date'], $validated['end_date']);
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
    }

    public function edit ($id)
    {
        $booking = Booking::findOrFail($id);
        $cars = Car::all();

        return view('bookings.edit', compact('booking', 'cars'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'pickup_location' => 'required|string|max:255',
            'return_location' => 'required|string|max:255',
        ]);

        $booking->update($validated);
        $booking->total_price = $this->calculateTotalPrice($validated['car_id'], $validated['start_date'], $validated['end_date']);
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }

}
