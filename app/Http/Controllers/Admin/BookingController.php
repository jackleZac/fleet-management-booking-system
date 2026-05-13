<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::all();

        // Filter by status
        if ($request->filled('status')) {
            $bookings = $bookings->where('status', $request->status);
        }

        // Sort by start date
        if ($request->filled('sort_date')) {
            $bookings = $bookings->sortBy('start_date', SORT_REGULAR, $request->sort_date === 'desc');
        }

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    //  Confirm booking
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();
        return redirect()->back()->with('success', 'Booking confirmed successfully.');
    }

    // Mark booking as paid (for non-online payments)
    public function markAsPaid($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'paid';
        $booking->save();
        return redirect()->back()->with('success', 'Booking marked as paid successfully.');
    }

    // Mark booking as paid (manually)
    public function markAsActive($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'active';
        $booking->save();
        return redirect()->back()->with('success', 'Booking marked as active successfully.');
    }

    // Cancel booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }

    // Mark booking as completed
    public function complete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'completed';
        $booking->save();
        return redirect()->back()->with('success', 'Booking marked as completed successfully.');
    }
}
