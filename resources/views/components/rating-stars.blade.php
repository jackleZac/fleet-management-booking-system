<div style="display:flex; gap:2px;">
    @for ($i = 1; $i <= 5; $i++)
        @if ($rating >= $i)
            {{-- Full star --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="#FFD700"
                 width="18"
                 height="18">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784
                         1.4 8.168L12 18.896l-7.334 3.867 1.4-8.168
                         L.132 9.211l8.2-1.193z"/>
            </svg>

        @elseif ($rating >= ($i - 0.5))
            @php
                $gradientId = 'half-star-' . uniqid();
            @endphp
            {{-- Half star --}}
            <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="18"
            height="18">
            <defs>
                <linearGradient id="{{ $gradientId }}">
                    <stop offset="50%" stop-color="#FFD700"/>
                    <stop offset="50%" stop-color="#ddd"/>
                </linearGradient>
            </defs>
            <path fill="url(#{{ $gradientId }})"
                d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784
                    1.4 8.168L12 18.896l-7.334 3.867 1.4-8.168
                    L.132 9.211l8.2-1.193z"/>
        </svg>

        @else
            {{-- Empty star --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="#ddd"
                 width="18"
                 height="18">
                <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784
                         1.4 8.168L12 18.896l-7.334 3.867 1.4-8.168
                         L.132 9.211l8.2-1.193z"/>
            </svg>
        @endif
    @endfor
</div>