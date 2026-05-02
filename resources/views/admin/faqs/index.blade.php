@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
        <a href="{{ route('admin.faqs.create') }}"
           style="
                background: #2563eb;
                color: white;
                padding: 10px 16px;
                text-decoration: none;
                border-radius: 6px;
                font-weight: 600;
           ">
            + Add FAQ
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
                    <th style="padding: 14px; text-align: left;">Question</th>
                    <th style="padding: 14px; text-align: left;">Answer</th>
                    <th style="padding: 14px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td 
                            title="{{ $faq->question }}"
                            style="
                                padding: 14px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            ">
                            {{ $faq->question }}
                        </td>
                        <td title ="{{ Str::limit($faq->answer, 80) }}" style="padding: 14px;">{{ Str::limit($faq->answer, 80) }}</td>
                        <td style="padding: 14px; display: flex; justify-content: center; align-items: center;">
                            <a href="{{ route('admin.faqs.edit', $faq->id) }}"
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

                            <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete this FAQ?')"
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