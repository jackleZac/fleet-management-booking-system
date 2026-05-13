@extends('admin.layout')

@section('styles')
    <style>
        .status-btn {
            background-color: #00006e;
            color: #fff;
            padding: 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .status-btn:hover {
            background-color: #000087;
        }
    </style>
@endsection

@section('content')
    <div >
        <h1 >Booking Details</h1>
        <a href="{{ route('admin.bookings.index') }}"
            style="
                text-decoration: none;
                font-size: 22px;
                margin-right: 12px;
                color: #111827;
            ">
            ←
        </a>
        <div style="margin: 36px 0">
            <h4 >{{ $booking->car->make }} {{ $booking->car->model }}</h5>
            <p ><strong>From:</strong> {{ $booking->start_date }}</p>
            <p ><strong>To:</strong> {{ $booking->end_date }}</p>
            <p><strong>Pickup Location:</strong> {{ $booking->pickup_location }}</p>
            <p><strong>Dropoff Location:</strong> {{ $booking->dropoff_location }}</p>
            <p><strong>Total Amount:</strong> RM {{ $booking->total_price }}</p>
            <p ><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        </div>
        @if ($booking->status == 'pending')
            <a class="status-btn" href="{{ route('admin.bookings.confirm', $booking->id) }}">Confirm Booking</a>
            <a class="status-btn" href="{{ route('admin.bookings.cancel', $booking->id) }}">Cancel Booking</a>
        @elseif ($booking->status == 'confirm')
            <a class="status-btn" href="{{ route('admin.bookings.markAsPaid', $booking->id) }}">Mark as Paid</a>
        @elseif ($booking->status == 'paid')
            <a class="status-btn" href="{{ route('admin.bookings.markAsActive', $booking->id) }}">Mark as Active</a>
        @elseif ($booking->status == 'active')
            <a class="status-btn" href="{{ route('admin.bookings.complete', $booking->id) }}">Complete Booking</a>
        @endif
    </div>
@endsection