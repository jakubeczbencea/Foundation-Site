<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Tudásodért Alapítvány')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="admin-body">

<!-- Admin Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <span>Admin Panel</span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Vezérlőpult</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}"
                   href="{{ route('admin.donations.index') }}">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Adományok</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
                   href="{{ route('admin.news.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Hírek / Beszámolók</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                   href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>Beállítások</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                   href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <span>Felhasználók</span>
                </a>
            </li>
        </ul>

        <hr class="sidebar-divider">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Oldal megtekintése</span>
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link w-100 text-start">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Kijelentkezés</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<div class="admin-main">
    <!-- Top Navbar -->
    <nav class="admin-topbar">
        <button class="btn btn-link text-light sidebar-toggle d-lg-none" id="sidebarToggle">
            <i class="fas fa-bars fa-lg"></i>
        </button>

        <div class="d-flex align-items-center ms-auto">
            <span class="text-light me-3">
                <i class="fas fa-user-circle me-1"></i>
                {{ auth()->user()->name }}
                <span class="badge bg-primary ms-1">{{ auth()->user()->role }}</span>
            </span>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="admin-content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle mobilon
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
        document.getElementById('adminSidebar').classList.toggle('show');
    });
</script>
@stack('scripts')
</body>
</html>
