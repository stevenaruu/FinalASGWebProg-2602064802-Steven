@extends('contents.master')

@section('content')
    @include('components.avatar-navbar')
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
    <div class="container mt-4">
        <div class="row">
            @foreach ($owned_avatars as $avatar)
                <div class="col-md-3 mb-4">
                    <div class="card shadow">
                        <div class="d-flex justify-content-between card-header alert alert-warning m-0 text-center">
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
                            <button class="shadow-sm px-5 btn btn-secondary disabled text-white fw-bold">Owned</button>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($avatars as $avatar)
                <div class="col-md-3 mb-4">
                    <div class="card shadow">
                        <div class="d-flex justify-content-between card-header alert alert-warning m-0 text-center">
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
                            <form action="{{ route('avatar-buy') }}" method="POST">
                                @csrf
                                <button class="shadow-sm px-5 btn btn-warning text-white fw-bold">Buy Avatar</button>
                                <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                <input type="hidden" name="coins" value="{{ $avatar->coin }}">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.chat-button')
@endsection
