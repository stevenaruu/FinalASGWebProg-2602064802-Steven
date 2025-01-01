<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .custom-card {
            height: 80vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .custom-card-body {
            flex: 1;
            overflow-y: auto;
        }

        .custom-card-body::-webkit-scrollbar {
            width: 6px;
        }

        .custom-card-body::-webkit-scrollbar-thumb {
            background: #6c757d;
            border-radius: 3px;
        }

        .custom-card-body::-webkit-scrollbar-thumb:hover {
            background: #495057;
        }

        .custom-card-body::-webkit-scrollbar-track {
            background: #f8f9fa;
        }

        .custom-card-body {
            scrollbar-width: thin;
            scrollbar-color: #6c757d #f8f9fa;
        }
    </style>
</head>

<body class="bg-warning">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="shadow card border-secondary custom-card">
                    <div class="fw-bold card-header bg-secondary text-white text-center">Register</div>
                    <div class="card-body custom-card-body">
                        <form method="POST" action="{{ route('do-register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select border-secondary" name="gender" id="gender">
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"
                                            {{ old('gender') == $gender->id ? 'selected' : '' }}>
                                            {{ $gender->gender }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3" id="hobby-container">
                                <div class="d-grid gap-2 mb-3">
                                    <button type="button" id="add-hobby-btn"
                                        class="fw-bold text-white btn btn-secondary">
                                        Add New Hobby
                                    </button>
                                </div>
                                @foreach (old('hobbies', ['', '', '']) as $i => $hobby)
                                    <div class="row g-2 mb-3 align-items-center hobby-row">
                                        <div class="col-auto">
                                            <label for="hobby-{{ $i }}" class="col-form-label">Hobby
                                                {{ $i + 1 }}:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="hobbies[]" id="hobby-{{ $i }}"
                                                class="form-control border-secondary" value="{{ $hobby }}"
                                                required placeholder="Hobby {{ $i + 1 }}">
                                        </div>
                                    </div>
                                @endforeach
                                @error('hobbies')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                @error('hobbies.*')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username"
                                    placeholder="http://www.instagram.com/username"
                                    class="form-control border-secondary" required>
                                @error('username')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile_number" class="form-label">Mobile Number</label>
                                <input type="mobile_number" name="mobile_number" id="mobile_number"
                                    class="form-control border-secondary" required placeholder="0123456789">
                                @error('mobile_number')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" name="password" id="password" placeholder="**********"
                                    class="form-control border-secondary" required>
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="**********" class="form-control border-secondary" required>
                                @error('password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="fw-bold text-white btn btn-secondary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('login') }}" class="text-warning">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hobbyContainer = document.getElementById("hobby-container");
            const addHobbyBtn = document.getElementById("add-hobby-btn");
            let hobbyCount = 3; // Start from 3 since 3 hobbies are already present

            addHobbyBtn.addEventListener("click", () => {
                hobbyCount++;
                const hobbyRow = document.createElement("div");
                hobbyRow.className = "row g-2 mb-3 align-items-center hobby-row";
                hobbyRow.innerHTML = `
                    <div class="col-auto">
                        <label for="hobby-${hobbyCount}" class="col-form-label">Hobby ${hobbyCount}:</label>
                    </div>
                    <div class="col">
                        <input placeholder="Hobby ${hobbyCount}" type="text" name="hobbies[]" id="hobby-${hobbyCount}" class="form-control border-secondary" required>
                    </div>
                `;
                hobbyContainer.appendChild(hobbyRow);
            });
        });

        const registrationPrice = "{{ session('registrationPrice') }}";
        if (registrationPrice) {
            Swal.fire({
                title: "Registration Successful!",
                text: `Your registration price is: Rp ${registrationPrice}`,
                icon: "success",
                confirmButtonText: "Okay",
            });
        }
    </script>
</body>

</html>
