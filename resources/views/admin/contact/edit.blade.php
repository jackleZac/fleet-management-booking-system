@extends('admin.layout')

@section('content')
    <div>
        <a href="{{ route('admin.contact.index') }}"
            style="
                text-decoration: none;
                font-size: 22px;
                margin-right: 12px;
                color: #111827;
            ">
            ←
        </a>
        <form action="{{ route('admin.contact.update', $contactInfo->id) }}" method="POST" style="">
            @csrf
            @method('PUT')
            <div style="
                display:flex;
                flex-direction:column;
                margin-bottom:16px;
                gap:8px;
            ">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required value="{{ $contactInfo->address }}" style="
                    padding:10px;
                    border:1px solid #e5e7eb;
                    border-radius:6px;
                ">
            </div>
            <div style="
                display:flex;
                flex-direction:column;
                margin-bottom:16px;
                gap:8px;
            ">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" placeholder="+60111234567" id="phone" required value="{{ $contactInfo->phone }}" style="
                    padding:10px;
                    border:1px solid #e5e7eb;
                    border-radius:6px;
                ">
            </div>
            <div style="
                display:flex;
                flex-direction:column;
                margin-bottom:16px;
                gap:8px;
            ">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ $contactInfo->email }}" style="
                    padding:10px;
                    border:1px solid #e5e7eb;
                    border-radius:6px;
                ">
            </div>
            <button type="submit" style="
                background:#2563eb;
                color:white;
                padding:10px 16px;
                border:none;
                border-radius:6px;
                font-weight:600;
            ">
                Update Contact Info
            </button>
        </form>
    </div>
@endsection