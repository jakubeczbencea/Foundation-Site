@extends('layouts.app')

@section('title', 'Regisztráció - Tudásodért Alapítvány')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-modern p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                        <h2 class="fw-bold">Regisztráció</h2>
                        <p class="text-muted">Új admin fiók létrehozása</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Teljes név</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="name" id="name"
                                    class="form-control bg-dark text-light border-secondary"
                                    value="{{ old('name') }}" required placeholder="Kovács János">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email cím</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="email"
                                    class="form-control bg-dark text-light border-secondary"
                                    value="{{ old('email') }}" required placeholder="admin@tudasodert.hu">
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
                                    required placeholder="Minimum 8 karakter">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Jelszó megerősítés</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-light">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control bg-dark text-light border-secondary"
                                    required placeholder="Jelszó újra">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            <i class="fas fa-user-plus me-2"></i>Regisztráció
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Már van fiókod?
                            <a href="{{ route('login') }}" class="text-primary">Bejelentkezés</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
