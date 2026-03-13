<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tudásodért Alapítvány - BGSZC Eötvös Loránd Technikum')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-lg">
    <div class="container-fluid px-4 px-lg-5">
        <!-- Logo BAL -->
        <a class="navbar-brand fw-bold fs-3 shrink-0" href="/">
            <i class="fas fa-graduation-cap text-primary me-2"></i>
            Tudásodért Alapítvány
        </a>

        <!-- Mobil menü gomb -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENÜ KÖZÉPEN -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-4 py-2 rounded-pill" href="/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-2 rounded-pill" href="{{ route('about') }}">Rólunk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-2 rounded-pill" href="/beszamolo">Beszámolók</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-2 rounded-pill" href="/hirek">Hírek</a>
                </li>
            </ul>

            <!-- Gombok JOBB -->
            <div class="d-flex gap-2 ms-lg-4">
                <a href="/kapcsolat" class="btn btn-outline-light btn-sm px-4 py-2 fw-semibold rounded-pill">
                    <i class="fas fa-envelope me-1"></i>Kapcsolat
                </a>
                <a href="/tamogatas" class="btn btn-warning btn-sm px-5 py-2 fw-bold rounded-pill shadow-sm">
                    <i class="fas fa-heart me-1"></i>Támogatom
                </a>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-info btn-sm px-4 py-2 fw-semibold rounded-pill">
                        <i class="fas fa-user-plus me-1"></i>Regisztráció
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4 py-2 fw-bold rounded-pill">
                        <i class="fas fa-sign-in-alt me-1"></i>Bejelentkezés
                    </a>
                @endguest
            </div>
        </div>
    </div>
</nav>




<!-- Fő tartalom -->
<main class="grow">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer-dark py-5 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-university me-2"></i>
                    BGSZC Eötvös Loránd Technikum
                </h5>
                <p class="text-light-50 mb-3">Tudásodért Alapítvány a műszaki oktatás jövőjéért.</p>
                <p><strong>Adószám:</strong> 12345678-1-42</p>
            </div>
            <div class="col-lg-4 mb-4">
                <h6 class="fw-bold mb-3">Menü</h6>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-light-50 text-decoration-none">Főoldal</a></li>
                    <li><a href="{{ route('about') }}" class="text-light-50 text-decoration-none">Rólunk</a></li>
                    <li><a href="/tamogatas" class="text-light-50 text-decoration-none">Támogatás</a></li>
                </ul>
            </div>
            <div class="col-lg-4 mb-4">
                <h6 class="fw-bold mb-3">Kapcsolat</h6>
                <div class="mb-2">
                    <i class="fas fa-envelope me-2 text-blue"></i>
                    info@tudasodert.hu
                </div>
                <div class="mb-2">
                    <i class="fas fa-phone me-2 text-blue"></i>
                    +36 1 234 5678
                </div>
                <div>
                    <i class="fas fa-map-marker-alt me-2 text-blue"></i>
                    Budapest, Iskolaköz 1.
                </div>
            </div>
        </div>
        <hr class="my-4 border-secondary">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light-50">&copy; 2026 Tudásodért Alapítvány. Minden jog fenntartva.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="/adatvedelem" class="text-light-50 me-3 text-decoration-none">Adatvédelem</a>
                <a href="/impresszum" class="text-light-50 text-decoration-none">Impresszum</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
