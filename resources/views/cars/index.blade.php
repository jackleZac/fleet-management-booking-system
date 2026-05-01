<html>
    <head>
        <title>Car rental</title>
    </head>
    <body style="margin:0; padding:0;">
        @include('header')

        <section style="background-color: #EFEFEF; padding: 24px 0">
            {{-- Search form --}}
            <form method="GET" action="/cars" style="
                width: fit-content;
                display:flex;
                align-items:center;
                gap:22px;
                margin: 2em auto;
                background:#fff;
                border-radius: 4px;
                padding:10px 24px;
            ">

                {{-- Make --}}
                <div style="display:flex; flex-direction:column; gap:6px; min-width:120px;">
                    <label style="font-size:0.75em; color:#555;">Make</label>

                    <div style="display:flex; align-items:center; gap:10px;">
                        <img src="{{ asset('icons/car.svg') }}" style="width:14px; height:14px;">

                        <select name="make" style="
                            border:none;
                            outline:none;
                            background:transparent;
                            font-size:0.9em;
                            cursor:pointer;
                        ">
                            <option value="">All</option>
                            @foreach($makes as $make)
                                <option value="{{ $make }}" {{ request('make') == $make ? 'selected' : '' }}>
                                    {{ $make }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Transmission --}}
                <div style="display:flex; flex-direction:column; gap:6px; min-width:120px;">
                    <label style="font-size:0.75em; color:#555;">Transmission</label>

                    <div style="display:flex; align-items:center; gap:10px;">
                        <img src="{{ asset('icons/gearbox.svg') }}" style="width:14px; height:14px;">

                        <select name="transmission" style="
                            border:none;
                            outline:none;
                            background:transparent;
                            font-size:0.9em;
                            cursor:pointer;
                        ">
                            <option value="">All</option>
                            <option value="Auto" {{ request('transmission') == 'Auto' ? 'selected' : '' }}>Auto</option>
                            <option value="Manual" {{ request('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>
                </div>

                {{-- From --}}
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-size:0.75em; color:#555;">From</label>

                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="RM{{ $minPrice }}" style="
                        width:90px;
                        padding:6px 8px;
                        border:1px solid #ccc;
                        border-radius:4px;
                        outline:none;
                        font-size:0.9em;
                    ">
                </div>

                {{-- To --}}
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-size:0.75em; color:#555;">To</label>

                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="RM{{ $maxPrice }}" style="
                        width:90px;
                        padding:6px 8px;
                        border:1px solid #ccc;
                        border-radius:4px;
                        outline:none;
                        font-size:0.9em;
                    ">
                </div>

                {{-- Search --}}
                <button type="submit" style="
                    width:48px;
                    height:42px;
                    border:none;
                    border-radius:12px;
                    background:#D6AB00;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    cursor:pointer;
                    margin-left:8px;
                ">
                    <img src="{{ asset('icons/loupe.svg') }}" alt="Search" style="
                        width:18px;
                        height:18px;
                        filter: invert(1);
                    ">
                </button>
                <a href="{{ route('cars.index') }}" style="display:flex; align-items:center;">
                    <img src="{{ asset('icons/refresh.svg') }}" style="width:20px; height:20px; cursor:pointer;">
                </a>
            </form>
            {{-- Display list of cars --}}
            <div style="
                display: grid;
                padding: 0 2em;
                grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
                gap: 16px;
                margin-top: 20px;
                flex-wrap: wrap;
                ">
                @foreach($cars as $car) 
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 16px;
                    background-color: white;
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                ">
                    @if($car->primaryImage)
                        <img src="{{ asset('storage/' . $car->primaryImage->image_path) }}" alt="{{ $car->make }} {{ $car->model }}" style="width:100%; height:200px; object-fit: cover;">
                    @else
                        <div style="background-color: #f0f0f0; width:100%; height:200px; display: flex; align-items: center; justify-content: center;">
                            <span>No Image Available</span>
                        </div>
                    @endif
                    <div style="padding: 20px;">
                        <h3 style="margin-top: 10px; text-align: center;">{{ $car->make }} {{ $car->model }}</h3>
                        <div style="
                            display: flex;
                            justify-content: center;
                            gap: 16px;
                            align-items: center;
                            margin-top: 10px;
                        ">
                                <div>
                                    <img src="{{ asset('icons/gas-station.svg') }}" alt="Fuel Type" style="width: 1em; height: 1em; margin-right: 5px;">
                                    <span style="font-size: 0.9em; color: #555;">{{ $car->fuel }}</span>
                                </div>
                                <div>
                                    <img src="{{ asset('icons/seat.svg') }}" alt="Seats" style="width: 1em; height: 1em; margin-right: 5px;">
                                    <span style="font-size: 0.9em; color: #555;">{{ $car->seats }}</span>
                                </div>
                                <div>
                                    <img src="{{ asset('icons/gearbox.svg') }}" alt="Transmission" style="width: 1em; height: 1em; margin-right: 5px;">
                                    <span style="font-size: 0.9em; color: #555;">{{ $car->transmission }}</span>
                                </div>
                        </div>
                        <p style="text-align: right; margin-top: 40px;">
                            RM{{ $car->price_per_day }} /day
                        </p>
                        <button style="
                            width: 100%;
                            padding: 10px 20px;
                            background-color: #043D74;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 1em;
                            font-weight: 400;
                            " onclick="window.location.href='/cars/{{ $car->id }}'">
                            View Details
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @include('footer')
    </body>
</html>