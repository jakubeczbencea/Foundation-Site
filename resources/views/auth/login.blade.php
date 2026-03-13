@extends('layouts.app')

@section('title', 'Bejelentkezés - Tudásodért Alapítvány')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-modern p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                        <h2 class="fw-bold">Admin bejelentkezés</h2>
                        <p class="text-muted">Lépj be az admin felület eléréséhez</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email cím</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="email"
                                    class="form-control bg-dark text-light border-secondary"
                                    value="{{ old('email') }}" required autofocus
                                    placeholder="admin@tudasodert.hu">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Jelszó</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="password"
                                    class="form-control bg-dark text-light border-secondary"
                                    required placeholder="••••••••">
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember"
                                    class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="form-check-label text-muted">
                                    Emlékezz rám
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            <i class="fas fa-sign-in-alt me-2"></i>Bejelentkezés
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/" class="text-muted text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i>Vissza a főoldalra
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
