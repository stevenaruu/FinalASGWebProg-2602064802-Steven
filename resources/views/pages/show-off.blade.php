@extends('contents.master')

@section('content')
    @include('components.avatar-navbar')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            @foreach ($avatars as $avatar)
                <div class="col-md-3 mb-4">
                    <div class="card shadow">
                        <div class="d-flex justify-content-between card-header m-0 alert alert-warning text-center">
                            <div class="fw-bold">
                                {{ $avatar->title }}
                            </div>
                            <div>
                                <span class="badge bg-warning text-white">
                                    {{ $avatar->coin }}
                                </span>
                                Coins
                            </div>
                        </div>
                        <img src="data:image/jpeg;base64,{{ base64_encode($avatar->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <button class="shadow-sm px-3 btn btn-warning text-white fw-bold">{{ trim(parse_url($avatar->username, PHP_URL_PATH), '/') }}'s Avatar</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.chat-button')
@endsection
