@extends('admin.layout')

@section('content')
    {{-- Company Contact Information --}}
    <div>
        <h2>Company Contact Information</h2>
        <p><strong>Address:</strong> {{ $contactInfo->address }}</p>
        <p><strong>Phone:</strong> {{ $contactInfo->phone }}</p>
        <p><strong>Email:</strong> {{ $contactInfo->email }}</p>
    </div>
@endsection