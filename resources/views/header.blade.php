<style>
    .nav-link {
        color: black;
        text-decoration: none;
    }

    .nav-link.active {
        color: #D6AB00;
        font-weight: 600;
    }

    .nav-link:hover {
        color: #D6AB00;
    }

</style>

<header>
    <nav style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px;
        background: #FFF;
    ">

        <!-- Logo -->
        <div style="font-size: 1.6em; font-weight: 800;">
            <a href="/" style="color:black; text-decoration:none;">
                <span style="color: #043D74;">Journey</span><span style="color: #D6AB00;">Go</span>
            </a>
        </div>

        <!-- Links -->
        <div style="
            display:flex; 
            flex-direction: row; 
            gap: 2em; 
            font-size: 1.2em;
            font-weight: 500;
            line-height: 1.5;
            text-decoration: none;
        ">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home')? 'active' : '' }}">Home</a>
            <a href="{{ route('cars.index') }}" class="nav-link {{ request()->routeIs('cars*') ? 'active': '' }}">Cars</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active': '' }}">About</a>

            @auth
                <a href="{{ route('profile.index') }}" class="nav-link {{ request()->routeIs('profile*') ? 'active' : '' }}">Profile</a>
            @else
                <a href="/login" class="nav-link">Login</a>
            @endauth
        </div>

    </nav>
</header>