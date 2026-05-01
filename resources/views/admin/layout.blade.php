<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body style="margin:0; display:flex;">

    {{-- Sidebar --}}
    <aside style="
        width:20%;
        min-height:100vh;
        background: #003544;
        color:white;
        padding:20px;
    ">
        <h2>Admin Panel</h2>

        <nav style="display:flex; flex-direction:column; gap:15px; margin-top:30px;">
            <a href="{{ route('admin.cars.index') }}" style="color:white; text-decoration:none;">Cars</a>
            <a href="{{ route('admin.bookings.index') }}" style="color:white; text-decoration:none;">Bookings</a>
            <a href="{{ route('admin.promotions.index') }}" style="color:white; text-decoration:none;">Promotions</a>
            <a href="{{ route('admin.reviews.index') }}" style="color:white; text-decoration:none;">Reviews</a>
            <a href="{{ route('admin.faqs.index') }}" style="color:white; text-decoration:none;">FAQs</a>
            <a href="{{ url('/admin/contact') }}" style="color:white; text-decoration:none;">Contact</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="
                    background:none;
                    border:none;
                    color:white;
                    padding:0;
                    cursor:pointer;
                    text-align:left;
                ">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    {{-- Main content --}}
    <main style="
        flex:1;
        padding:30px;
        background:#f7f7f7;
    ">
        @yield('content')
    </main>

</body>
</html>