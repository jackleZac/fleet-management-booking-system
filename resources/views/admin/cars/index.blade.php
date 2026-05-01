@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
        <a href="{{ route('admin.cars.create') }}" 
           style="
                background: #2563eb;
                color: white;
                padding: 10px 16px;
                text-decoration: none;
                border-radius: 6px;
                font-weight: 600;
           ">
            + Add Car
        </a>
    </div>

    <div style="
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        ">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f9fafb;">
                <tr>
                    <th style="padding: 14px; text-align: left;">Model</th>
                    <th style="padding: 14px; text-align: left;">Make</th>
                    <th style="padding: 14px; text-align: left;">Fuel Type</th>
                    <th style="padding: 14px; text-align: left;">Price Per Day</th>
                    <th style="padding: 14px; text-align: left;">Status</th>
                    <th style="padding: 14px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 14px;">{{ $car->model }}</td>
                        <td style="padding: 14px;">{{ $car->make }}</td>
                        <td style="padding: 14px;">{{ $car->fuel }}</td>
                        <td style="padding: 14px;">RM {{ number_format($car->price_per_day, 2) }}</td>
                        <td style="padding: 14px;">{{ ucfirst($car->status) }}</td>
                        <td style="padding: 14px; text-align: center;">
                            <a href="{{ route('admin.cars.edit', $car->id) }}"
                               style="
                                    background: #f59e0b;
                                    color: white;
                                    padding: 8px 12px;
                                    border-radius: 6px;
                                    text-decoration: none;
                                    margin-right: 6px;
                               ">
                                Edit
                            </a>

                            <form action="{{ route('admin.cars.destroy', $car->id) }}" 
                                  method="POST" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this car?')"
                                        style="
                                            background: #dc2626;
                                            color: white;
                                            padding: 8px 12px;
                                            border: none;
                                            border-radius: 6px;
                                            cursor: pointer;
                                        ">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection