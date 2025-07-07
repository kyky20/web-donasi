{{-- HEADER NAVBAR --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Donasi Yo')</title>
    <link rel="icon" href="/images/layout/logo.jpg">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            padding-top: 70px;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .navbar .navbar-brand img {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            object-fit: cover;
        }

        .navbar .navbar-brand span {
            font-size: 1.2rem;
            font-weight: 600;
            color: #007bff;
        }

        .navbar .nav-link {
            font-weight: 500;
            color: #555;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #007bff;
        }

        .navbar .btn-primary {
            border-radius: 20px;
            padding: 5px 16px;
            font-weight: 500;
        }

        .dropdown-menu {
            border-radius: 10px;
            padding: 10px 0;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .dropdown-item {
            font-weight: 500;
            color: #333;
        }

        .dropdown-item:hover {
            background-color: #f2f2f2;
        }

        .modal-content {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.096), 0 6px 20px rgba(0, 0, 0, 0.096);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/images/layout/logo.jpg" alt="Logo">
                <span class="ml-2">Donasi Yo</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/donasi">Donasi</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/donatur">List Donatur</a>
                    </li>

                    @if (Auth::check())
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-user mr-1"></i> {{ ucwords(Auth::user()->username) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->jenisAkun === 'admin')
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="/session/logout">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a class="btn btn-primary btn-sm" href="/session">
                                <i class="fa-solid fa-right-to-bracket mr-1"></i>Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- NOTIFIKASI ERROR -->
    @if (session('error'))
        <div class="modal fade" id="errorModalCenter" tabindex="-1" role="dialog" aria-labelledby="errorModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ session('errorHeader') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer">
                        @if (Auth::check() && Auth::user()->jenisAkun === 'guest')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        @else
                            <a href="/session" class="btn btn-primary">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- KONTEN HALAMAN -->
    @yield('content')

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('error'))
                $('#errorModalCenter').modal('show');
            @endif
        });
    </script>
</body>

</html>