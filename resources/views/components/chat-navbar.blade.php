<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <div class="d-flex gap-3 justify-content-center align-items-center">
            <h5 class="mt-1 fw-bold text-white">{{ $recipient->username }}</h5>
            <div style="height: 35px; width: 35px" class="rounded-circle overflow-hidden">
                <img class="w-100 h-100 object-fit-cover rounded-circle"
                    src="data:image/jpeg;base64,{{ base64_encode($recipient->image) }}" alt="profile-image">
            </div>
        </div>
    </div>
</nav>
