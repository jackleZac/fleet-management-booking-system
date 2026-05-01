<html>
    <head>
        <title>Car Details</title>
    </head>

    <body style="background-color: #f5f5f5;">
        <header>
            @include('header')
        </header>

        <main style="width: 95%; margin: 1.5em auto;">
            <a href="{{ route('cars.index') }}"
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
                gap: 50px;
                align-items: start;
            ">
                <!-- Booking info card -->
                <div style="
                    background-color: #FFF;
                    border-radius: 8px;
                    padding: 22px;
                    min-height: 280px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                ">
                    <p style="margin: 0; font-size: 1.4em; font-weight: bold;">
                        {{ $car->make }} {{ $car->model }}
                    </p>

                    <p style="margin: 4px 0 28px 0; font-size: 0.75em; color: #333;">
                        Available for booking
                    </p>

                    <div style="
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        row-gap: 28px;
                        column-gap: 50px;
                    ">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/gearbox.svg') }}" alt="Gearbox Icon" style="width: 32px; height: 32px;">                      
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Transmission</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ $car->transmission }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/gas-station.svg') }}" alt="Gas Station Icon" style="width: 32px; height: 32px;">
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Fuel</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ $car->fuel }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/seat.svg') }}" alt="Seat Icon" style="width: 32px; height: 32px;">                           
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Number of Seats</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ $car->seats }}
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <img src="{{ asset('icons/check.svg') }}" alt="Status Icon" style="width: 32px; height: 32px;">
                            <div>
                                <p style="margin: 0; font-size: 0.75em;">Status</p>
                                <p style="margin: 2px 0 0 0; font-size: 1em;">
                                    {{ ucfirst($car->status) }}
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
                            @if($car->status === 'available')
                                <a href="{{ route('bookings.create', $car->id) }}"
                                   style="
                                        background-color: #06457d;
                                        color: white;
                                        padding: 12px 42px;
                                        border-radius: 4px;
                                        text-decoration: none;
                                        display: inline-block;
                                   ">
                                    Book Now
                                </a>
                            @else
                                <div style="background-color: #fef3c7; color: #92400e; padding: 10px; border-radius: 4px; display: inline-block;">
                                    This car is currently {{ $car->status }}.
                                </div>
                            @endif
                        </div>

                        <div>
                            <p style="margin: 0; font-size: 0.75em;">Price Per Day</p>
                            <p style="margin: 4px 0 0 0; font-size: 1.8em;">
                                RM {{ number_format($car->price_per_day, 0) }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Main image -->
                <div>
                    @if($car->primaryImage)
                        <img src="{{ asset('storage/' . $car->primaryImage->image_path) }}"
                             alt="{{ $car->make }} {{ $car->model }}"
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
                @foreach($car->images->where('is_primary', false)->take(3) as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                         alt="Car image"
                         style="width: 100%; height: 180px; object-fit: cover;">
                @endforeach
            </div>
        </main>
    </body>
    @include('footer')
</html>