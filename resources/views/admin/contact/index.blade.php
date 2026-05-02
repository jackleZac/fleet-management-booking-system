@extends('admin.layout')

@section('content')
    {{-- Company Contact Information --}}
    <div style="margin-bottom: 60px;">
        <h2>Company Contact Information</h2>
        <p><strong>Address:</strong> {{ $contactInfo->address }}</p>
        <p><strong>Phone:</strong> {{ $contactInfo->phone }}</p>
        <p><strong>Email:</strong> {{ $contactInfo->email }}</p>
    </div>
    <a href="{{ route('admin.contact.edit', $contactInfo->id) }}" 
        style="
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
        ">
        Update Contact Info
    </a>
@endsection