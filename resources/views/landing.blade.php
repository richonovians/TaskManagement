<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <style>
        /* Styling untuk sticky footer */
        body, html {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Task Management</h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/about') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/contact') }}">Kontak</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Section -->
    <div class="container mt-5 main-content">
        <div class="text-center mb-4">
            <h1 class="display-4">Selamat Datang di Task Management</h1>
            <p class="lead">Kelola tugas Anda dengan mudah dan efisien.</p>
        </div>

        <!-- Example Task Management Card (Optional Section) -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h3 class="card-title">Task Manager Features</h3>
                        <p class="card-text">
                            Dengan Task Management, Anda dapat menambahkan, mengedit, dan melacak tugas Anda dengan mudah. 
                            Jadikan hari Anda lebih produktif!
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include footer -->
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
