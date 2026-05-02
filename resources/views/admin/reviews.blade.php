@extends('admin.layout')

@section('content')
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
                    <th style="padding: 14px; text-align: left;">User</th>
                    <th style="padding: 14px; text-align: left;">Model</th>
                    <th style="padding: 14px; text-align: left;">Rating</th>
                    <th style="padding: 14px; text-align: left;">Comment</th>
                    <th style="padding: 14px; text-align: left;">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 14px;">{{ $review->user->name }}</td>
                        <td style="padding: 14px;">{{ $review->car->model }}</td>
                        <td style="padding: 14px;">{{ $review->rating }}</td>
                        <td 
                            title="{{ $review->comment }}"
                            style="
                                padding: 14px;
                                white-space: no-wrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                ">
                            {{ $review->comment }}
                        </td>
                        <td style="padding: 14px;">{{ $review->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection