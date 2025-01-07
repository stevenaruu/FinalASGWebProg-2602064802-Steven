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
                <div class="text-muted"> <span class="text-warning fw-bold">@lang('lang.joined')</span> @lang('lang.at')
                    {{ __('lang.' . strtolower($user->created_at->format('F'))) }} {{ $user->created_at->format('Y') }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div style="height: 365px" class="card">
                        <div class="card-header text-center fw-bold alert alert-warning m-0">
                            @lang('lang.information')
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="text-muted fw-bold">@lang('lang.username')</p>
                                <p class="fw-bold text-warning">{{ $user->username }}</p>
                            </div>
                            <div class="border border-bottom"></div>
                            <div class="d-flex justify-content-between mt-3">
                                <p class="text-muted fw-bold">@lang('lang.mobile_number')</p>
                                <p class="fw-bold text-warning">{{ $user->mobile_number }}</p>
                            </div>
                            <div class="border border-bottom"></div>
                            <div class="d-flex justify-content-between mt-3">
                                <p class="text-muted fw-bold">@lang('lang.gender')</p>
                                <p class="fw-bold text-warning">{{ $user->gender }}</p>
                            </div>
                            <div class="border border-bottom"></div>
                            <div class="d-flex justify-content-between mt-3">
                                <p class="text-muted fw-bold">@lang('lang.joined')</p>
                                <p class="fw-bold text-warning">{{ $user->created_at->format('d F Y') }}</p>
                            </div>
                            <div class="border border-bottom"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="height: 365px" class="card">
                        <div class="card-header text-center fw-bold alert alert-warning m-0">
                            @lang('lang.settings')
                        </div>
                        <div class="card-body d-flex flex-column">
                            <button onclick="window.location='{{ route('avatar') }}'"
                                class="alert alert-secondary py-2 fw-bold">@lang('lang.avatar')</button>
                            <button onclick="window.location='{{ route('top-up') }}'"
                                class="alert alert-secondary py-2 fw-bold">@lang('lang.top_up')</button>
                            <button onclick="window.location='{{ route('show-off') }}'"
                                class="alert alert-secondary py-2 fw-bold">@lang('lang.show_off')</button>
                            <form action="{{ $user->isVisible ? route('make-invisible') : route('make-visible') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="alert alert-danger py-2 fw-bold w-100">
                                    @lang('lang.change_visibility')
                                    {{ $user->isVisible ? __('lang.change_visibility_visible') : __('lang.change_visibility_invisible') }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="alert alert-warning py-2 fw-bold w-100"
                                    type="submit">@lang('lang.logout')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
