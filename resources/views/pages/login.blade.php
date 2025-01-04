@extends('contents.auth')

@section('auth')
    <div class="shadow card border-secondary">
        <div class="fw-bold card-header bg-secondary text-white text-center">@lang('lang.login')</div>
        @if ($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('do-login') }}">
                @csrf
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">@lang('lang.mobile_number')</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control border-secondary"
                        required placeholder="0123456789">
                    @error('mobile_number')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('lang.password')</label>
                    <input type="password" name="password" id="password" placeholder="**********"
                        class="form-control border-secondary" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="fw-bold text-white btn btn-secondary">@lang('lang.login')</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('register') }}" class="text-warning">@lang('lang.create_account')</a>
        </div>
    </div>
@endsection
