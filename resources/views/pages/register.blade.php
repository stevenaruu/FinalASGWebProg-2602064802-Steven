<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-warning">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="fw-bold card-header bg-secondary text-white text-center">Register</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control border-secondary"
                                    required>
                                @error('name')
                                    <div class="text-secondary small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" name="gender" id="gender" class="form-control border-secondary"
                                    required>
                                @error('name')
                                    <div class="text-secondary small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="email" name="email" id="email" class="form-control border-secondary"
                                    required>
                                @error('email')
                                    <div class="text-secondary small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" name="password" id="password" class="form-control border-secondary"
                                    required>
                                @error('password')
                                    <div class="text-secondary small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control border-secondary" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="fw-bold btn btn-secondary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('login') }}" class="text-secondary">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
