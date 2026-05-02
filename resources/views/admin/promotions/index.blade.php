@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
        <a href="{{ route('admin.promotions.create') }}"
            style="
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
           "
        >+ Add Promotion
        </a>
    </div> 
    <div style="
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
    ">
        <table style="width: 100%; border-collapse: collapse; table-layout: fixed;">
            <thead style="background: #f9fafb;">
                <tr>
                    <th style="padding: 14px; text-align: left;">Title</th>
                    <th style="padding: 14px; text-align: left;">Description</th>
                    <th style="padding: 14px; text-align: left;">Start Date</th>
                    <th style="padding: 14px; text-align: left;">End Date</th>
                    <th style="padding: 14px; text-align: left;">Discount (%)</th>
                    <th style="padding: 14px; text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td 
                        title="{{ $promotion->title }}"
                        style="
                            max-width: 600px;
                            padding: 14px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        ">{{ $promotion->title }}
                        </td>
                        <td 
                        title="{{ $promotion->description }}"
                        style="
                            max-width: 600px;
                            padding: 14px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            ">
                            {{ $promotion->description }}
                        </td>
                        <td style="padding: 14px;">{{ $promotion->start_date ?? 'N/A' }}</td>
                        <td style="padding: 14px;">{{ $promotion->end_date ?? 'N/A' }}</td>
                        <td style="padding: 14px;">{{ $promotion->discount_percentage ?? 'N/A' }}</td>
                        <td style="padding: 14px; display: flex; justify-content: center; align-items: center;">
                            <a href="{{ route('admin.promotions.edit', $promotion->id) }}"
                                style="
                                background: #f59e0b;
                                color: white;
                                padding: 8px 12px;
                                border-radius: 6px;
                                text-decoration: none;
                                margin-right: 6px;
                                "
                                >Edit
                            </a>
                            <form action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"
                                    style="
                                    background: #dc2626;
                                    color: white;
                                    padding: 8px 12px;
                                    border: none;
                                    border-radius: 6px;
                                    cursor: pointer;
                                    ">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection