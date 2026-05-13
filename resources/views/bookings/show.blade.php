<html>
    <head>
        <title>Booking Details</title>
    </head>

    <body style="background-color: #f5f5f5;">
        <header>
            @include('header')
        </header>

        <main style="width: 95%; margin: 1.5em auto;">
            {{-- Return to previous page --}}
            <a href="{{ back()->getTargetUrl() }}"
               style="display: inline-block; color: #111; text-decoration: none; margin: 0 0 4em 1em;">
                ← Back
            </a>

            @if(session('success'))
                <div style="background-color: #d1fae5; color: #065f46; padding: 10px; margin-bottom: 1em;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background-color: #fee2e2; color: #991b1b; padding: 10px; margin-bottom: 1em;">
                    {{ session('error') }}
                </div>
            @endif

            <div style="
                display: grid;
                grid-template-columns: 1.4fr 1fr;
                padding: 0 6em;
                gap: 50px;
                align-items: center;
            ">
                <!-- Booking info card -->
                <div style="
                    background-color: #FFF;
                    border-radius: 8px;
                    padding: 22px;
                    max-width: 600px;
                    min-height: 280px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                ">
                    <p style="margin: 0; font-size: 1.4em; font-weight: bold;">
                        {{ $booking->car->make }} {{ $booking->car->model }}
                    </p>

                    <p style="margin: 4px 0 28px 0; font-size: 0.75em; color: #333;">
                        Booked on {{ $booking->created_at->format('j F Y') }}
                    </p>

                    <div style="
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        row-gap: 28px;
                        column-gap: 50px;
                    ">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <div style="background-color: #514a00; display: flex; align-items: center; border-radius: 50%; padding: 8px; margin-right: 12px;">
                                <img src="{{ asset('icons/calendar.svg') }}" alt="Calendar Icon" style="width: 20px; height: 20px;">
                            </div>                            
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">From</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ \Carbon\Carbon::parse($booking->start_date)->format('j F Y') }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/location.svg') }}" style="width: 18px; height: 18px;">
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Pickup Location</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ $booking->pickup_location }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <div style="background-color: #514a00; display: flex; align-items: center; border-radius: 50%; padding: 8px; margin-right: 12px;">
                                <img src="{{ asset('icons/calendar.svg') }}" alt="Calendar Icon" style="width: 20px; height: 20px;">
                            </div>                            
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">To</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('j F Y') }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/location.svg') }}" style="width: 18px; height: 18px;">
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Drop-off Location</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ $booking->dropoff_location }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div style="
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        margin-top: 38px;
                        align-items: end;
                    ">
                        <div>
                            <p style="margin: 0; font-size: 0.75em;">Discount</p>
                            <p style="margin: 6px 0 26px 0; font-size: 1em;">N/A</p>

                            @if($booking->status === 'confirmed')
                                <a href="{{ route('bookings.pay', $booking->id) }}"
                                   style="
                                        background-color: #06457d;
                                        color: white;
                                        padding: 12px 42px;
                                        border-radius: 4px;
                                        text-decoration: none;
                                        display: inline-block;
                                   ">
                                    Pay Now
                                </a>
                            @elseif($booking->status === 'paid')
                                <div style="background-color: #d1fae5; color: #065f46; padding: 10px; border-radius: 4px; display: inline-block;">
                                    Payment received. Thank you!
                                </div>
                            @else
                                <div style="background-color: #fef3c7; color: #92400e; padding: 10px; border-radius: 4px; display: inline-block;">
                                    This booking is currently {{ $booking->status }}.
                                </div>
                            @endif
                        </div>

                        <div>
                            <p style="margin: 0; font-size: 0.75em;">Status</p>
                            <p style="margin: 6px 0 28px 0; font-size: 1em;">
                                {{ ucfirst($booking->status) }}
                            </p>

                            <p style="margin: 0; font-size: 0.75em;">Total</p>
                            <p style="margin: 4px 0 0 0; font-size: 1.8em;">
                                RM {{ number_format($booking->total_price, 0) }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Main image -->
                <div>
                    @if($booking->car->primaryImage)
                        <img src="{{ asset('storage/' . $booking->car->primaryImage->image_path) }}"
                             alt="{{ $booking->car->make }} {{ $booking->car->model }}"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="
                            width: 100%;
                            height: 100%;
                            background-color: #ccc;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        ">
                            Image
                        </div>
                    @endif
                </div>
            </div>

            <!-- Extra images -->
            <div style="
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 46px;
                margin-top: 48px;
            ">
                @foreach($booking->car->images->where('is_primary', false)->take(3) as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                         alt="Car image"
                         style="width: 100%; height: 180px; object-fit: cover;">
                @endforeach
            </div>
        </main>
    </body>
    @include('footer')
</html>