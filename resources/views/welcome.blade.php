<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleganza | Clean & Elegant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css" />
    <style>
        /* Custom CSS buat nambahin kesan elegan */
        body {
            font-family: 'Inter', sans-serif;
            color: #4a4a4a;
            background-color: #fafafa;
        }
        h1, h2, h3, .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #1a1a1a;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .hero-section {
            min-height: 85vh;
            display: flex;
            align-items: center;
            background-color: #f3f4f6; /* Abu-abu sangat muda */
        }
        .btn-elegant {
            background-color: #1a1a1a;
            color: #fff;
            border-radius: 0; /* Ujung kotak tanpa lengkungan biar tegas */
            padding: 12px 32px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        .btn-elegant:hover {
            background-color: #4a4a4a;
            color: #fff;
            transform: translateY(-2px);
        }
        .feature-card {
            border: none;
            background: transparent;
            padding: 2rem 1rem;
            transition: opacity 0.3s ease;
        }
        .feature-card:hover {
            opacity: 0.7;
        }
        .icon-elegant {
            font-size: 2.5rem;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
        }
        footer {
            background-color: #1a1a1a;
            color: #f3f4f6;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">Eleganza.</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-toggle="target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="text-uppercase tracking-wide mb-3 d-block text-muted" style="letter-spacing: 2px; font-size: 0.9rem;">Kesederhanaan adalah Kunci</span>
                    <h1 class="display-3 mb-4">Membangun Pengalaman yang Tak Terlupakan.</h1>
                    <p class="lead mb-5 fw-light">Desain minimalis dengan fokus pada detail. Kami mewujudkan ide Anda menjadi realitas yang elegan dan fungsional.</p>
                    <a href="#" class="btn btn-elegant">Mulai Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 my-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-gem icon-elegant"></i>
                        <h3 class="h4 mb-3">Desain Premium</h3>
                        <p class="text-muted fw-light">Estetika kelas atas yang memberikan kesan profesional pada pandangan pertama.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-feather icon-elegant"></i>
                        <h3 class="h4 mb-3">Ringan & Cepat</h3>
                        <p class="text-muted fw-light">Kode yang bersih memastikan performa website Anda selalu optimal.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-phone icon-elegant"></i>
                        <h3 class="h4 mb-3">Responsif</h3>
                        <p class="text-muted fw-light">Tampil sempurna dan proporsional di berbagai perangkat, dari HP hingga desktop.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center mt-auto">
        <div class="container">
            <p class="mb-0 fw-light" style="font-size: 0.9rem;">&copy; 2026 Eleganza. Dibuat dengan presisi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"> </script>
</body>
</html>
