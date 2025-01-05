<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
        <a href="{{ route('home') }}" class="navbar-brand text-white fw-bold">ConnectFriend.</a>
        <form class="d-flex w-50" role="search" method="GET" action="{{ route('home') }}">
            <select class="form-select me-2 w-25" name="gender" onchange="this.form.submit()">
                <option value="">@lang('lang.all_gender')</option>
                @foreach (App\Models\Gender::all() as $gender)
                    <option value="{{ $gender->id }}" {{ request('gender') == $gender->id ? 'selected' : '' }}>
                        {{ $gender->gender == 'Male' ? __('lang.male') : __('lang.female') }}
                    </option>
                @endforeach
            </select>
            <input class="form-control me-2" type="text" name="hobby" placeholder="@lang('lang.search_hobby')"
                value="{{ request('hobby') }}" aria-label="Hobby">
            <button class="btn btn-secondary" type="submit">@lang('lang.search')</button>
        </form>

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
            @if (auth()->check())
                <div role="button" style="height: 35px; width: 35px" class="me-2 overflow-hidden rounded-circle">
                    <img onclick="window.location='{{ route('user_profile') }}'"
                        src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->image) }}" alt="English"
                        class="w-100 h-100 object-fit-cover rounded-circle">
                </div>
                {{-- <button onclick="window.location='{{ route('friend') }}'"
                    class="btn btn-secondary d-flex align-items-center">
                    @lang('lang.friend')
                    @if ($request_notif > 0)
                        <span class="badge bg-warning text-white ms-2">{{ $request_notif }}</span>
                    @endif
                </button> --}}
                {{-- <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button class="btn btn-secondary" type="submit">@lang('lang.logout')</button>
                </form> --}}
            @else
                <button onclick="window.location='{{ route('login') }}'"
                    class="btn btn-secondary">@lang('lang.login')</button>
                <button onclick="window.location='{{ route('register') }}'"
                    class="btn btn-secondary">@lang('lang.register')</button>
            @endif
        </div>
    </div>
</nav>
