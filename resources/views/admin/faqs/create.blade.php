@extends('admin.layout')

@section('content')
    <div style="
        background:#ffffff;
        border:1px solid #e5e7eb;
        border-radius:6px;
        box-shadow:0 4px 14px rgba(0,0,0,0.06);
        padding:24px;
        animation:slideIn 0.3s ease;
    ">
        {{-- Header --}}
        <div style="
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        ">
            <a href="{{ route('admin.faqs.index') }}"
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
                Add New FAQ
            </h2>
        </div>

        <form action="{{ route('admin.faqs.store') }}" method="POST" style="padding:0 10px;">
            @csrf

            <div style="
                display:flex;
                flex-direction:column;
                margin-bottom:16px;
                gap:8px;
            ">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" required style="
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
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" required style="
                    padding:10px;
                    border:1px solid #e5e7eb;
                    border-radius:6px;
                    min-height:120px;
                    resize:vertical;
                "></textarea>
            </div>

            <button type="submit" style="
                padding:10px 20px;
                background:#ffde59;
                border:none;
                border-radius:6px;
                cursor:pointer;
                font-weight:600;
            ">
                Create FAQ
            </button>
        </form>
    </div>

    <style>
        @keyframes slideIn {
            from {
                opacity:0;
                transform:translateX(40px);
            }
            to {
                opacity:1;
                transform:translateX(0);
            }
        }
    </style>
@endsection