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
            <a href="{{ route('admin.promotions.index') }}"
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
                Add New Promotion
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
            <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data" style="width: 50%;">
                @csrf
                <div style="margin-bottom: 16px;">
                    <label for="title" style="
                    display: block; font-weight: 600; margin-bottom: 6px;
                    ">
                        Title
                    </label>
                    <input type="text" name="title" id="title" required style="
                        width: 90%;
                        padding: 10px;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                    ">
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="description" style="
                    display: block; font-weight: 600; margin-bottom: 6px;
                    ">
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4" required style="
                        width: 90%;
                        padding: 10px;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                    "></textarea>
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="start_date" style="
                    display: block; font-weight: 600; margin-bottom: 6px;
                    ">
                        Start Date
                    </label>
                    <input type="date" name="start_date" id="start_date" style="
                        width: 90%;
                        padding: 10px;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                    ">
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="end_date" style="
                    display: block; font-weight: 600; margin-bottom: 6px;
                    ">
                        End Date
                    </label>
                    <input type="date" name="end_date" id="end_date" style="
                        width: 90%;
                        padding: 10px;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                    ">
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="discount_percentage" style="
                    display: block; font-weight: 600; margin-bottom: 6px;
                    ">
                        Discount Percentage
                    </label>
                    <input type="number" name="discount_percentage" id="discount_percentage" min="0" max="100" style="
                        width: 90%;
                        padding: 10px;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                    ">
                </div>
                <div style="margin-bottom: 16px">
                    <label style="display:block; margin-bottom:6px; font-weight:600;">Upload an image</label>
                    <input type="file" name="image" accept="image/*" style="
                        padding:12px;
                        border:1px solid #d1d5db;
                        border-radius:6px;
                    ">
                </div>
                <button type="submit" style="
                    background: #2563eb;
                    color: white;
                    padding: 10px 16px;
                    border: none;
                    border-radius: 6px;
                    font-weight: 600;
                ">Create Promotion</button>
            </form>
            {{-- Display uploaded image --}}
            <div style="width: 50%; display: flex; justify-content: center; align-items: center;">
                @if(old('image'))
                    <img src="{{ asset('storage/' . old('image')) }}" alt="Promotion" style="margin-top: 20px; max-width: 300px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
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