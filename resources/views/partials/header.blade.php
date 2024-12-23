<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Task Management</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/categories') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/contact') }}">Kontak</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </ul>
            </nav>
        </div>
    </div>
</header>