<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex flex-column align-items-center">

                    <!-- Judul dengan font besar -->
                    <h1 class="display-1 text-danger fw-bold">404</h1>
                    <h2 class="display-4 text-dark mb-4">Oops! Halaman Tidak Ditemukan.</h2>

                    <!-- Pesan keterangan -->
                    <p class="lead text-muted">Maaf, halaman yang Anda cari tidak ada atau sudah dipindahkan. Cobalah periksa URL atau kembali ke halaman beranda.</p>

                    <!-- Tombol kembali ke Beranda -->
                    <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-primary px-5 py-3 mt-4 shadow">
                        <i class="bi bi-house-door"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
