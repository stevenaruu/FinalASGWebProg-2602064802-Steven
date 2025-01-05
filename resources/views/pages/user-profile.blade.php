@extends('contents.master')

@section('content')
    @include('components.user-profile-navbar')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header p-0 position-relative alert alert-warning m-0" style="height: 140px;">
                <div class="d-flex align-items-center justify-content-center"
                    style="position: absolute; bottom: -40px; left: 50%; transform: translateX(-50%);">
                    <img src="data:image/jpeg;base64,{{ base64_encode($user->image) }}"
                        class="rounded-circle border border-white" alt="Avatar" style="width: 80px; height: 80px;">
                </div>
            </div>
            <div class="card-body text-center mt-4">
                <h3 class="card-title">{{ trim(parse_url($user->username, PHP_URL_PATH), '/') }}</h3>
                <h5 class="card-title">{{ $user->username }}</h5>
                <div class="text-muted"> <span class="text-warning fw-bold">Joined</span> at
                    {{ $user->created_at->format('F Y') }}</div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-6">
                <div style="height: 305px" class="card">
                    <div class="card-header text-center fw-bold alert alert-warning m-0">
                        Information
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="text-muted fw-bold">Username</p>
                            <p class="fw-bold text-warning">{{ $user->username }}</p>
                        </div>
                        <div class="border border-bottom"></div>
                        <div class="d-flex justify-content-between mt-3">
                            <p class="text-muted fw-bold">Mobile Number</p>
                            <p class="fw-bold text-warning">{{ $user->mobile_number }}</p>
                        </div>
                        <div class="border border-bottom"></div>
                        <div class="d-flex justify-content-between mt-3">
                            <p class="text-muted fw-bold">Gender</p>
                            <p class="fw-bold text-warning">{{ $user->gender }}</p>
                        </div>
                        <div class="border border-bottom"></div>
                        <div class="d-flex justify-content-between mt-3">
                            <p class="text-muted fw-bold">Joined</p>
                            <p class="fw-bold text-warning">{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="border border-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div style="height: 305px" class="card">
                    <div class="card-header text-center fw-bold alert alert-warning m-0">
                        Settings
                    </div>
                    <div class="card-body d-flex flex-column">
                        <button onclick="window.location='{{ route('avatar') }}'" class="alert alert-secondary py-2 fw-bold">Avatar</button>
                        <button onclick="window.location='{{ route('top-up') }}'" class="alert alert-secondary py-2 fw-bold">Top Up Coins</button>
                        <form action="{{ $user->isVisible ? route('make-invisible') : route('make-visible') }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="alert alert-danger py-2 fw-bold w-100">
                                Change Visibility Profile
                                <span>(Currently is {{ $user->isVisible ? 'Visible' : 'Hidden' }})</span>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="alert alert-warning py-2 fw-bold w-100" type="submit">@lang('lang.logout')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
