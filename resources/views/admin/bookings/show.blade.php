@extends('admin.layout')

@section('content')
    <div >
        <h1 >Booking Details</h1>

        <div >
            <div >
                <h5 >{{ $booking->car->make }} {{ $booking->car->model }}</h5>
                <p ><strong>From:</strong> {{ $booking->start_date }}</p>
                <p ><strong>To:</strong> {{ $booking->end_date }}</p>
                <p ><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            </div>
        </div>
        <a href="{{ route('admin.bookings.confirm', $booking->id) }}">Confirm Booking</a>
    </div>
@endsection