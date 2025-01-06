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
                                <span class="badge bg-secondary text-white">
                                    Owned
                                </span>
                            </div>
                        </div>
                        <img src="data:image/jpeg;base64,{{ base64_encode($avatar->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            @if ($avatar->isActive)
                                <form action="{{ route('remove-profile') }}" method="POST">
                                    @csrf
                                    <button class="shadow-sm px-5 btn btn-secondary text-white fw-bold">Remove
                                        Avatar</button>
                                    <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                </form>
                                @else
                                <form action="{{ route('change-profile') }}" method="POST">
                                    @csrf
                                    <button class="shadow-sm px-5 btn btn-warning text-white fw-bold">Use Avatar</button>
                                    <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
