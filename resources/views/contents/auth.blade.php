<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectFriend</title>
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
                @yield('auth')
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
