<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <form class="d-flex w-50" role="search" method="GET" action="{{ route('home') }}">
            <select class="form-select me-2 w-25" name="gender" onchange="this.form.submit()">
                <option value="">All Genders</option>
                @foreach (App\Models\Gender::all() as $gender)
                    <option value="{{ $gender->id }}" {{ request('gender') == $gender->id ? 'selected' : '' }}>
                        {{ $gender->gender }}
                    </option>
                @endforeach
            </select>
            <input class="form-control me-2" type="text" name="hobby" placeholder="Search hobby..."
                value="{{ request('hobby') }}" aria-label="Hobby">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>

        <div class="d-flex gap-2">
            @if (auth()->check())
                <button onclick="window.location='{{ route('friend') }}'"
                    class="btn btn-secondary d-flex align-items-center">
                    Friend
                    @if ($request_notif > 0)
                        <span class="badge bg-warning text-white ms-2">{{ $request_notif }}</span>
                    @endif
                </button>
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
