<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    @yield('styles')
</head>
<style>
    .nav-link {
        padding: 12px 16px;
        border-radius: 12px;
    }

    .nav-link.active {
        color: white;
        background-color: #001a21;
    }
</style>
<body style="margin:0; display:flex;">

    {{-- Sidebar --}}
    <aside style="
        width:15%;
        min-height:100vh;
        background: #003544;
        color:white;
        padding:20px;
    ">
        <h2>Admin Panel</h2>

        <nav style="display:flex; flex-direction:column; gap:15px; margin-top:30px;">
            <a href="{{ route('admin.cars.index') }}" class="nav-link {{ request()->routeIs('admin.cars*') ? 'active' : '' }}" style="color:white; text-decoration:none;">Cars</a>
            <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}" style="color:white; text-decoration:none;">Bookings</a>
            <a href="{{ route('admin.promotions.index') }}" class="nav-link {{ request()->routeIs('admin.promotions*') ? 'active' : '' }}" style="color:white; text-decoration:none;">Promotions</a>
            <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}" style="color:white; text-decoration:none;">Reviews</a>
            <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}" style="color:white; text-decoration:none;">FAQs</a>
            <a href="{{ url('/admin/contact') }}" class="nav-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}" style="color:white; text-decoration:none;">Contact</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="
                    margin: 12px 16px;
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