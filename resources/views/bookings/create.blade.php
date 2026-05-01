<html>
    <head>
        <title>Create Booking</title>
    </head>
    <body>
        <header>
            @include('header')
        </header>

        <div style="width: 80%; margin: 2em auto; background-color: #FFFFFF; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25); border-radius: 8px; padding: 2em;">
            <h1>Book {{ $car->make }} {{ $car->model }}</h1>

            <form method="POST" action="{{ route('bookings.store', $car->id) }}" style="display: flex; flex-direction: column; gap: 1em;">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">

                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

                <label for="pickup_location">Pickup Location:</label>
                <input type="text" id="pickup_location" name="pickup_location" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

                <label for="return_location">Dropoff Location:</label>
                <input type="text" id="return_location" name="return_location" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

                <button type="submit" style="
                    background-color: #f59e0b;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                    ">
                    Book Now
                </button>
            </form>
        </div>
    </body>
    @include('footer')
</html>