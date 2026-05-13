@extends('admin.layout')

@section('content')
    <div style="
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        ">
        <table style="width: 100%; border-collapse: collapse; table-layout: fixed;">
            <thead style="background: #f9fafb;">
                <tr>
                    <th style="padding: 14px; text-align: left;">User</th>
                    <th style="padding: 14px; text-align: left;">Car</th>
                    <th style="padding: 14px; text-align: left;">Start Date</th>
                    <th style="padding: 14px; text-align: left;">End Date</th>
                    <th style="padding: 14px; text-align: left;">Pickup Location</th>
                    <th style="padding: 14px; text-align: left;">Return Location</th>
                    <th style="padding: 14px; text-align: left;">Total Price</th>
                    <th style="padding: 14px; text-align: left;">Status</th>
                    <th style="padding: 14px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 14px;">{{ $booking->user->name }}</td>
                        <td style="padding: 14px;">{{ $booking->car->model }}</td>
                        <td style="padding: 14px;">{{ $booking->start_date }}</td>
                        <td style="padding: 14px;">{{ $booking->end_date }}</td>
                        <td 
                            title="{{ $booking->pickup_location }}"
                            style="
                                padding: 14px;
                                max-width: 160px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            "
                        >
                            {{ $booking->pickup_location }}
                        </td>

                        <td 
                            title="{{ $booking->return_location }}"
                            style="
                                padding: 14px;
                                max-width: 160px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            "
                        >
                            {{ $booking->return_location }}
                        </td>
                        <td style="padding: 14px;">RM {{ number_format($booking->total_price, 2) }}</td>
                        <td style="padding: 14px;">{{ ucfirst($booking->status) }}</td>
                        <td style="padding: 14px; display: flex; justify-content: center; align-items: center;">
                            <a href="{{ route('admin.bookings.show', $booking->id) }}"
                               style="
                                    background: #3b82f6;
                                    color: white;
                                    padding: 8px 12px;
                                    border-radius: 6px;
                                    text-decoration: none;
                               ">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection