@extends('admin.layout')

@section('content')
    <div style="
        width: 90%;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.06);
        padding: 24px;
        animation: slideIn 0.3s ease;
    ">
        {{-- Header --}}
        <div style="
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        ">
            <a href="{{ route('admin.cars.index') }}"
               style="
                    text-decoration: none;
                    font-size: 22px;
                    margin-right: 12px;
                    color: #111827;
               ">
                ←
            </a>

            <h2 style="
                margin: 0;
                font-size: 24px;
                font-weight: 700;
                color: #111827;
            ">
                Edit Car Details
            </h2>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div style="
                background: #fef2f2;
                color: #b91c1c;
                padding: 12px;
                border-radius: 6px;
                margin-bottom: 20px;
            ">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="display: flex; flex-direction: row; gap: 24px;">
            {{-- Form --}}
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" style="width: 50%;">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 18px;">
                    <label for="model" style="
                        display: block;
                        margin-bottom: 6px;
                        font-weight: 600;
                        color: #374151;
                    ">Model</label>

                    <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}"
                           style="
                                width: 90%;
                                padding: 10px;
                                border: 1px solid #d1d5db;
                                border-radius: 6px;
                                transition: border-color 0.2s;
                           "
                           onfocus="this.style.borderColor='#2563eb';"
                           onblur="this.style.borderColor='#d1d5db';">
                </div>

                <div style="margin-bottom: 18px;">
                    <label for="make" style="
                        display: block;
                        margin-bottom: 6px;
                        font-weight: 600;
                        color: #374151;
                    ">Make</label>

                    <input type="text" id="make" name="make" value="{{ old('make', $car->make) }}"
                           style="
                                width: 90%;
                                padding: 10px;
                                border: 1px solid #d1d5db;
                                border-radius: 6px;
                                transition: border-color 0.2s;
                           "
                           onfocus="this.style.borderColor='#2563eb';"
                           onblur="this.style.borderColor='#d1d5db';">
                </div>

                <div style="margin-bottom: 18px;">
                    <label for="price_per_day" style="
                        display: block;
                        margin-bottom: 6px;
                        font-weight: 600;
                        color: #374151;
                    ">Price Per Day (RM)</label>

                    <input type="number" step="0.01" id="price_per_day" name="price_per_day"
                           value="{{ old('price_per_day', $car->price_per_day) }}"
                           style="
                                width: 90%;
                                padding: 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 6px;
                                transition: border-color 0.2s;
                           "
                           onfocus="this.style.borderColor='#2563eb';"
                           onblur="this.style.borderColor='#d1d5db';">
                </div>

                <div style="margin-bottom: 18px;">
                    <label for="seats" style="
                        display: block;
                        margin-bottom: 6px;
                        font-weight: 600;
                        color: #374151;
                    ">Number of Seats</label>

                    <input type="number" id="seats" name="seats" value="{{ old('seats', $car->seats) }}"
                           style="
                                width: 90%;
                                padding: 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 6px;
                                transition: border-color 0.2s;
                           "
                           onfocus="this.style.borderColor='#2563eb';"
                           onblur="this.style.borderColor='#d1d5db';">
                </div>

                {{-- Status, Fuel, Transmission --}}
                <div style="flex-wrap: wrap; display: flex; gap: 20px;">
                    <div style="margin-bottom: 24px;">
                        <label for="status" style="
                            display: block;
                            margin-bottom: 6px;
                            font-weight: 600;
                            color: #374151;
                        ">Status</label>

                        <select id="status" name="status"
                                style="
                                    padding: 10px 16px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 6px;
                                    transition: border-color 0.2s;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                "
                                onfocus="this.style.borderColor='#2563eb';"
                                onblur="this.style.borderColor='#d1d5db';">
                            <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>Rented</option>
                            <option value="maintenance" {{ old('status', $car->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label for="fuel" style="
                            display: block;
                            margin-bottom: 6px;
                            font-weight: 600;
                            color: #374151;
                        ">Fuel Type</label>

                        <select id="fuel" name="fuel"
                                style="
                                    padding: 10px 16px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 6px;
                                    transition: border-color 0.2s;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                "
                                onfocus="this.style.borderColor='#2563eb';"
                                onblur="this.style.borderColor='#d1d5db';">
                            <option value="petrol" {{ old('fuel', $car->fuel) == 'petrol' ? 'selected' : '' }}>Petrol</option>
                            <option value="diesel" {{ old('fuel', $car->fuel) == 'diesel' ? 'selected' : '' }}>Diesel</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label for="transmission" style="
                            display: block;
                            margin-bottom: 6px;
                            font-weight: 600;
                            color: #374151;
                        ">Transmission</label>

                        <select id="transmission" name="transmission"
                                style="
                                    padding: 10px 16px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 6px;
                                    transition: border-color 0.2s;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                "
                                onfocus="this.style.borderColor='#2563eb';"
                                onblur="this.style.borderColor='#d1d5db';">
                            <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>
                </div>

                {{-- Radio buttons for is_featured --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Featured?</label>

                    <div style="display: flex; gap: 20px;">
                        <label style="display: flex; align-items: center; gap: 6px;">
                            <input type="radio" name="is_featured" value="1" {{ old('is_featured', $car->is_featured) == '1' ? 'checked' : '' }}>
                            Yes
                        </label>

                        <label style="display: flex; align-items: center; gap: 6px;">
                            <input type="radio" name="is_featured" value="0" {{ old('is_featured', $car->is_featured) == '0' ? 'checked' : '' }}>
                            No
                        </label>
                    </div>
                </div>

                {{-- Replace primary image --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Replace Primary Image</label>

                    <input type="file" name="primary_image" accept="image/*" style="
                        padding:12px;
                        border:1px solid #d1d5db;
                        border-radius:6px;
                        width: 90%;
                    ">

                    <p style="font-size: 0.85em; color: #6b7280; margin-top: 6px;">
                        Leave empty if you do not want to replace the current primary image.
                    </p>
                </div>

                {{-- Add extra images --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Add Extra Images</label>

                    <input type="file" name="extra_images[]" accept="image/*" multiple style="
                        padding:12px;
                        border:1px solid #d1d5db;
                        border-radius:6px;
                        width: 90%;
                    ">

                    <p style="font-size: 0.85em; color: #6b7280; margin-top: 6px;">
                        You can select multiple images. Existing extra images will not be removed.
                    </p>
                </div>

                <button type="submit" style="
                    background: #2563eb;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 6px;
                    font-weight: 600;
                    transition: background-color 0.2s;"
                    onmouseover="this.style.backgroundColor='#1e40af';"
                    onmouseout="this.style.backgroundColor='#2563eb';">
                    Update Car
                </button>
            </form>

            {{-- Image Preview --}}
            <div style="width: 50%; padding-left: 24px;">
                <h3 style="margin-top: 0; margin-bottom: 12px; color: #111827;">
                    Current Primary Image
                </h3>

                @if ($car->primaryImage)
                    <img src="{{ asset('storage/' . $car->primaryImage->image_path) }}" alt="Primary Car Image" style="
                        width: 100%;
                        max-height: 280px;
                        object-fit: cover;
                        border-radius: 6px;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                        margin-bottom: 24px;
                    ">
                @else
                    <div style="
                        width: 12em;
                        height: 8em;
                        padding: 40px;
                        margin: 24px auto;
                        background: #f3f4f6;
                        border: 1px dashed #d1d5db;
                        border-radius: 6px;
                        text-align: center;
                        color: #9ca3af;
                    ">
                        No primary image uploaded.
                    </div>
                @endif

                <h3 style="margin-top: 0; margin-bottom: 12px; color: #111827;">
                    Extra Images
                </h3>

                @php
                    $extraImages = $car->images->where('is_primary', false);
                @endphp

                @if ($extraImages->count() > 0)
                    <div style="
                        display: grid;
                        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                        gap: 12px;
                    ">
                        @foreach ($extraImages as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Extra Car Image" style="
                                width: 100%;
                                height: 90px;
                                object-fit: cover;
                                border-radius: 6px;
                                border: 1px solid #e5e7eb;
                                box-shadow: 0 1px 4px rgba(0,0,0,0.08);
                            ">
                        @endforeach
                    </div>
                @else
                    <div style="
                        padding: 24px;
                        background: #f3f4f6;
                        border: 1px dashed #d1d5db;
                        border-radius: 6px;
                        text-align: center;
                        color: #9ca3af;
                    ">
                        No extra images uploaded.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
@endsection