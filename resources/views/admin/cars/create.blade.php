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
                Add New Car
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

        <div style="display: flex; flex-direction: row;">
            {{-- Form --}}
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" style="width: 50%;">
                @csrf
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Model</label>
                    <input type="text" name="model"
                        value="{{ old('model') }}"
                        style="
                                padding:12px;
                                border:1px solid #d1d5db;
                                border-radius:6px;
                                width: 90%;
                        ">
                </div>
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Make</label>
                    <input type="text" name="make"
                        value="{{ old('make') }}"
                        style="
                                padding:12px;
                                border:1px solid #d1d5db;
                                border-radius:6px;
                                width: 90%;
                        ">
                </div>
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Price Per Day (RM)</label>
                    <input type="number" step="0.01" name="price_per_day"
                        value="{{ old('price_per_day') }}"
                        style="
                                padding:12px;
                                border:1px solid #d1d5db;
                                border-radius:6px;
                                width: 90%;                            
                        ">
                </div>
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Number of Seats</label>
                    <input type="number" step="0.01" name="seats"
                        value="{{ old('seats') }}"
                        style="
                            padding:12px;
                            border:1px solid #d1d5db;
                            border-radius:6px;
                            width: 90%;                            
                    ">
                </div>
                {{-- Status & Fuel Type & Transmission (Dropdowns) --}}
                <div style="flex-wrap: wrap; display: flex; gap: 20px;">
                    <div style="margin-bottom: 24px;">
                        <label style="display:block; margin-bottom:6px; font-weight:600;">Status</label>
                        <select name="status"
                                style="
                                    padding:12px;
                                    border:1px solid #d1d5db;
                                    border-radius:6px;
                                    width: 90%;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                ">
                            <option value="available">Available</option>
                            <option value="rented">Rented</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <label style="display:block; margin-bottom:6px; font-weight:600;">Fuel Type</label>
                        <select name="fuel"
                                style="
                                    padding:12px;
                                    border:1px solid #d1d5db;
                                    border-radius:6px;
                                    width: 90%;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;                            
                                ">
                            <option value="">Select Fuel Type</option>
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <label style="display:block; margin-bottom:6px; font-weight:600;">Transmission</label>
                        <select name="transmission"
                                style="
                                    padding:12px;
                                    border:1px solid #d1d5db;
                                    border-radius:6px;
                                    width: 90%;
                                    appearance: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;                            
                                ">
                            <option value="">Select Transmission</option>
                            <option value="automatic">Automatic</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>
                </div>
                {{-- Radio buttons for is_featured --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Featured?</label>
                    <div style="display: flex; gap: 20px;">
                        <label style="display: flex; align-items: center; gap: 6px;">
                            <input type="radio" name="is_featured" value="1" {{ old('is_featured') == '1' ? 'checked' : '' }}>
                            Yes
                        </label>
                        <label style="display: flex; align-items: center; gap: 6px;">
                            <input type="radio" name="is_featured" value="0" {{ old('is_featured') == '0' ? 'checked' : '' }}>
                            No
                        </label>
                    </div>
                </div>
                {{-- Primary image --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Primary Car Image</label>
                    <input type="file" name="primary_image" accept="image/*" style="
                        padding:12px;
                        border:1px solid #d1d5db;
                        border-radius:6px;
                        width: 90%;
                    ">
                </div>

                {{-- Extra images --}}
                <div style="margin-bottom: 18px;">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Extra Car Images</label>
                    <input type="file" name="extra_images[]" accept="image/*" multiple style="
                        padding:12px;
                        border:1px solid #d1d5db;
                        border-radius:6px;
                        width: 90%;
                    ">
                </div>
                <button type="submit"
                        style="
                            background:#2563eb;
                            color:white;
                            border:none;
                            padding:12px 20px;
                            border-radius:6px;
                            font-weight:600;
                            cursor:pointer;
                        ">
                    Submit
                </button>
            </form>
            {{-- Display uploaded image --}}
            <div style="width: 50%; display: flex; justify-content: center; align-items: center;">
                @if(old('image'))
                    <img src="{{ asset('storage/' . old('image')) }}" alt="Car Image" style="margin-top: 20px; max-width: 300px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
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
                        Preview will appear here after selecting an image.
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