<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <form class="d-flex w-50" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
        <div>
            @if (auth()->check())
                <button onclick="window.location='{{ route('friend') }}'" class="btn btn-secondary">Friend</button>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button class="btn btn-secondary" type="submit">Logout</button>
                </form>
            @else
                <button onclick="window.location='{{ route('login') }}'" class="btn btn-secondary">Login</button>
                <button onclick="window.location='{{ route('register') }}'" class="btn btn-secondary">Register</button>
            @endif
        </div>
    </div>
</nav>
