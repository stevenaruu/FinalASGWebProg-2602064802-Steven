<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <div class="d-flex gap-2">
            <button onclick="window.location='{{ route('friend') }}'" class="btn btn-secondary">Friend</button>
            <button onclick="window.location='{{ route('sent-request') }}'" class="btn btn-secondary">Sent
                Request</button>
            <button onclick="window.location='{{ route('friend-request') }}'" class="btn btn-secondary">Friend
                Request
                @if ($request_notif > 0)
                    <span class="badge bg-warning text-white ms-1">{{ $request_notif }}</span>
                @endif
            </button>
        </div>
    </div>
</nav>
