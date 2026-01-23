<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tudásodért Alapítvány')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1E3A8A; /* petrolkék */
            --secondary: #F59E0B; /* narancs */
            --light-gray: #F8FAFC;
        }
        .navbar { background: var(--primary) !important; }
        .cta-btn { background: var(--secondary); border-color: var(--secondary); }
        .cta-btn:hover { background: #E68A00; }
        .hero { background: linear-gradient(135deg, var(--primary), #3B82F6); color: white; }
        section { padding: 80px 0; }
        .card-icon { color: var(--primary); font-size: 3rem; }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">
                <i class="fas fa-graduation-cap me-2"></i>Tudásodért Alapítvány
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Főoldal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/rolunk">Rólunk</a></li>
                    <li class="nav-item"><a class="nav-link" href="/beszamolok">Beszámolók</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hirek">Hírek</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tamogatas">Támogatás</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kapcsolat">Kapcsolat</a></li>
                </ul>
                <a href="/tamogatas" class="btn cta-btn ms-2">Támogatom</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tudásodért Alapítvány</h5>
                    <p>Török Flóris u. 89., Budapest<br>BGSZC Eötvös Loránd Technikum</p>
                </div>
                <div class="col-md-4">
                    <h6>Gyorslinkek</h6>
                    <ul class="list-unstyled">
                        <li><a href="/rolunk" class="text-white-50">Rólunk</a></li>
                        <li><a href="/beszamolok" class="text-white-50">Beszámolók</a></li>
                        <li><a href="/adatkezeles" class="text-white-50">Adatkezelés</a></li>
                        <li><a href="/impresszum" class="text-white-50">Impresszum</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Kapcsolat</h6>
                    <p>info@tudasodert.hu<br>+36 1 123 4567</p>
                    <a href="https://facebook.com/iskola" class="text-white-50"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
