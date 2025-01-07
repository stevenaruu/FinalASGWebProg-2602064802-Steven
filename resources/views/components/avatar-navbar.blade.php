<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>

        <div class="d-flex align-items-center gap-3">
            <div role="button" style="height: 35px; width: 35px" class="overflow-hidden">
                @if (app()->getLocale() == 'en')
                    <img onclick="window.location='{{ route('set-locale', 'id') }}'"
                        src="{{ asset('assets/images/id.png') }}" alt="Bahasa Indonesia"
                        class="w-100 h-100 object-fit-cover">
                @else
                    <img onclick="window.location='{{ route('set-locale', 'en') }}'"
                        src="{{ asset('assets/images/en.png') }}" alt="English" class="w-100 h-100 object-fit-cover">
                @endif
            </div>
            <button onclick="window.location='{{ route('avatar') }}'"
                class="btn btn-secondary d-flex align-items-center">
                @lang('lang.avatar')
            </button>
            <button onclick="window.location='{{ route('my-avatar') }}'"
                class="btn btn-secondary d-flex align-items-center">
                @lang('lang.my_avatar')
            </button>
            <button onclick="window.location='{{ route('receive-avatar') }}'"
                class="btn btn-secondary d-flex align-items-center">
                @lang('lang.recieve_avatar')
                @if ($pending_avatar_count > 0)
                    <span class="badge bg-warning text-white ms-2">{{ $pending_avatar_count }}</span>
                @endif
            </button>
            <button onclick="window.location='{{ route('show-off') }}'"
                class="btn btn-secondary d-flex align-items-center">
                @lang('lang.show_off')
            </button>
            <button onclick="window.location='{{ route('top-up') }}'"
                class="btn btn-secondary d-flex align-items-center">
                <span class="badge bg-warning text-white me-2">
                    {{ Auth::user()->coin }}
                </span>
                @lang('lang.coin')
            </button>
            <div role="button" style="height: 35px; width: 35px" class="me-2 overflow-hidden rounded-circle">
                <img onclick="window.location='{{ route('user_profile') }}'"
                    src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->image) }}" alt="English"
                    class="w-100 h-100 object-fit-cover rounded-circle">
            </div>
        </div>
    </div>
</nav>
