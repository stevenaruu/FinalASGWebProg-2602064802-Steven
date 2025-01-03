<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <div>
            <button onclick="window.location='{{ route('friend') }}'" class="btn btn-secondary">Friend</button>
            <button onclick="window.location='{{ route('sent-request') }}'" class="btn btn-secondary">Sent Request</button>
            <button onclick="window.location='{{ route('friend-request') }}'" class="btn btn-secondary">Friend Request</button>
        </div>
    </div>
</nav>
