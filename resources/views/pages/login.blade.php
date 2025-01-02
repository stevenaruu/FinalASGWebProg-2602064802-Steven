@extends('contents.auth')

@section('auth')
    <div class="shadow card border-secondary">
        <div class="fw-bold card-header bg-secondary text-white text-center">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('do-login') }}">
                @csrf
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number</label>
                    <input type="mobile_number" name="mobile_number" id="mobile_number"
                        class="form-control border-secondary" required placeholder="0123456789">
                    @error('mobile_number')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="**********"
                        class="form-control border-secondary" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="fw-bold text-white btn btn-secondary">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('register') }}" class="text-warning">Create an account? Register</a>
        </div>
    </div>
@endsection
