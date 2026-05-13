<html>
    <head>
        <title>Car rental</title>
        <style>
            .status {
                display: inline-block;
                margin-bottom: 16px;
                padding: 6px 8px; 
                font-size: 0.8em; 
                font-weight: 400; 
                border-radius: 4px;
            }
            .view-details {
                background-color: #ffffff;
                color: black;
                padding: 12px 16px;
                border: #82b1db solid 1px;
                border-radius: 5px;
                text-decoration: none;
                display: inline-block;
            }
            .view-details:hover {
                background-color: #06457d;
                color: white;
            }
        </style>
    </head>
    <body style="margin: 0; padding: 0;">
        @include('header')

        <div style="background-color: #EFEFEF; padding: 12px;">
            <!-- Profile details -->
            <section style="
                background: #FFF;
                color: #333;
                margin: 0 10em;
                padding: 1em;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                border-radius: 6px;
                text-align: center;
            ">
                <h2>Hey {{ Auth::user()->name }} 👋</h2>
                <p>Welcome to your profile page. Here you can view your booking history, manage your reviews, and update your account settings.</p>
                <div style="margin-top: 32px; display: flex; flex-direction: row; justify-content: center; gap: 26px;">
                    <div style="height: 48px; display: flex; flex-direction: row; justify-content: flex-start; align-items: center; gap: 16px;">
                        <img src="{{ asset('icons/mail.svg') }}" alt="Email Icon" style="width: 32px; height: 32px;">
                        <div style="margin: auto 0; display: flex; flex-direction: column; align-items: flex-start;">
                            <p style="font-size: 0.9em; color: #555; margin: 0;">Email</p>
                            <p style="font-size: 1.1em; margin: 0; margin-top: 4px;">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div style="height: 48px; display: flex; flex-direction: row; justify-content: flex-start; align-items: center; gap: 16px;">
                        <img src="{{ asset('icons/telephone.svg') }}" alt="Phone Icon" style="width: 32px; height: 32px;">
                        <div style="margin: auto 0; display: flex; flex-direction: column; align-items: flex-start;">
                            <p style="font-size: 0.9em; color: #555; margin: 0;">Phone</p>
                            <p style="font-size: 1.1em; margin: 0; margin-top: 4px;">{{ Auth::user()->phone_number }}</p>
                        </div>
                    </div>
                    <div style="height: 48px; display: flex; flex-direction: row; justify-content: flex-start; align-items: center; gap: 16px;">
                        <span style="font-size: 28px; text-align: center; margin: auto 0;">📅</span>
                        <div style="margin: auto 0; display: flex; flex-direction: column; align-items: flex-start;">
                            <p style="font-size: 0.9em; color: #555; margin: 0;">Joined</p>
                            <p style="font-size: 1.1em; margin: 0; margin-top: 4px;">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>                  
                <a href="{{ route('profile.edit') }}" style="
                    background-color: #07589f;
                    display: inline-block; 
                    text-decoration: none; 
                    color: white;
                    text-align: right;
                    align-self: flex-end;
                    padding: 12px 16px;
                    border-radius: 4px;
                ">
                    Edit Profile
                </a>
            </section>

            {{-- Booking and Reviews --}}
            <section style="
                display: flex;
                flex-direction: column;
                gap: 30px;
                margin: 30px 10em;
            ">
                <!-- Booking History -->
                <div>
                    <h2>Booking History</h2>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach ($bookings as $booking)
                            <div style="
                                background-color: #FFFFFF;
                                padding: 1em;
                                margin-bottom: 1em;
                                min-height: 130px;
                                display: flex;
                                justify-content: space-between;
                                align-items: flex-start;
                                border-radius: 8px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            ">
                                <div>
                                    <p style="font-size: 1.12em; font-weight: 700; margin: 8px 0 16px 0;">
                                        {{ $booking->car->make }} {{ $booking->car->model }}
                                    </p>
                                    @if ($booking->status == 'pending')
                                        <div class="status" style="
                                            background-color: #b96710; 
                                            color: #FFF; 
                                        ">
                                            {{ ucfirst($booking->status) }}
                                        </div>
                                    @elseif ($booking->status == 'cancelled')
                                        <div class="status" style="
                                            background-color: #b92910; 
                                            color: #FFF; 
                                        ">
                                            {{ ucfirst($booking->status) }}
                                        </div>
                                    @else
                                        <div class="status" style="
                                            background-color: #107a17; 
                                            color: #FFF; 
                                        ">
                                            {{ ucfirst($booking->status) }}
                                        </div>                                    
                                    @endif

                                    <div style="display: flex; align-items: center;">
                                        <div style="background-color: #514a00; display: flex; align-items: center; border-radius: 50%; padding: 8px; margin-right: 20px;">
                                            <img src="{{ asset('icons/calendar.svg') }}" alt="Calendar Icon" style="width: 16px; height: 16px;">
                                        </div>
                                        <div style="
                                            display: flex; 
                                            flex-direction: row;
                                            justify-content: flex-start;
                                            gap: 24px;
                                            ">
                                            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                                <p style="font-size: 0.8em; margin: 0 0 4px 0;">From</p>
                                                <p style="font-size: 1em; margin: 0;">{{ \Carbon\Carbon::parse($booking->start_date)->format('j F Y') }}</p>
                                            </div>

                                            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                                <p style="font-size: 0.8em; margin: 0 0 4px 0;">To</p>
                                                <p style="font-size: 1em; margin: 0;">{{ \Carbon\Carbon::parse($booking->end_date)->format('j F Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                    align-items: flex-end;
                                    min-height: 115px;
                                ">
                                    <p style="font-size: 0.9em; color: #555; margin-top: 8px;">
                                        Booked on {{ $booking->created_at->format('j F Y') }}
                                    </p>
                                    <a href="{{ route('bookings.show', $booking->id) }}" class="view-details">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Reviews History -->
                <div>
                    <h2>Reviews History</h2>
                    @if($reviews->isEmpty())
                    <div style="
                        background-color: #FFF; 
                        height: 120px; 
                        border-radius: 5px; 
                        display: flex; 
                        justify-content: center; 
                        align-items: center;
                    ">
                        Currently you have no review
                    </div>
                    @else
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach($reviews as $review)
                            <div style="background:#fff; padding:20px; border-radius:5px;">
                                <p><strong>Car:</strong> {{ $review->car->make }} {{ $review->car->model }}</p>
                                <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
                                <p><strong>Comment:</strong> {{ $review->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </section>
        </div>

        @include('footer')
    </body>
</html>