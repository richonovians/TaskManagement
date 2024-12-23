<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ke Task Management</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Login ke Task Management</h1>
            </div>
        </div>
    </header>

    <div class="row justify-content-center align-items-center vh-100" style="background-image: url('https://source.unsplash.com/random/1200x900'); background-size: cover; background-position: center;">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Login</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Error Alert -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login-proses') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                            </div>
                        </div>
                        <!-- @error('email')
                            <small>{{$message}}</small>
                        @enderror -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                            </div>
                        </div>
                        <!-- @error('password')
                            <small>{{$message}}</small>
                        @enderror -->
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="#" class="text-primary">Forgot your password?</a>
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Website Sederhana. Semua hak dilindungi.</p>
        </div>
    </footer>
    
</body>
</html>