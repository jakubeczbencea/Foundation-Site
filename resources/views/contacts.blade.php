@extends('layouts.app')

@section('title', 'Kapcsolat - Tudásodért Alapítvány')

@section('content')
    <!-- Hero szekció -->
    <section class="hero section-padding text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Kapcsolat</h1>
            <p class="lead mb-4 text-light-50">
                Vedd fel velünk a kapcsolatot, ha kérdésed van az alapítvány működésével,
                az adományozással vagy az iskolai projektekkel kapcsolatban.
            </p>
            <a href="/tamogatas" class="btn btn-lg btn-cta">
                <i class="fas fa-heart me-2"></i>Támogatom az alapítványt
            </a>
        </div>
    </section>

    <!-- Elérhetőségek + kapcsolat űrlap -->
    <section class="bg-dark-section section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Elérhetőségek -->
                <div class="col-md-5">
                    <h2 class="fw-bold mb-3">Elérhetőségeink</h2>
                    <p class="text-muted mb-4">
                        A Tudásodért Alapítvány szorosan együttműködik a BGéSZC Eötvös Loránd Technikum
                        vezetésével és tantestületével.
                    </p>

                    <ul class="list-unstyled mb-4">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-location-dot me-3 mt-1"></i>
                            <div>
                                <strong>Iskola címe</strong><br>
                                1204 Budapest, Török Flóris u. 89.
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-envelope me-3 mt-1"></i>
                            <div>
                                <strong>E-mail</strong><br>
                                <a href="mailto:info@tudasodert-alapitvany.hu" class="text-blue">
                                    info@tudasodert-alapitvany.hu
                                </a>
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-phone me-3 mt-1"></i>
                            <div>
                                <strong>Telefon</strong><br>
                                +36 1 234 5678
                            </div>
                        </li>
                    </ul>

                    <p class="mb-0 text-muted">
                        Hivatalos iskolai információk és további elérhetőségek:
                        <a href="https://eotvosszki.hu" target="_blank" class="text-blue">eotvosszki.hu</a>
                    </p>
                </div>

                <!-- Kapcsolati űrlap -->
                <div class="col-md-7">
                    <div class="card-modern h-100">
                        <h3 class="fw-bold mb-3">Üzenet küldése</h3>
                        <p class="text-muted mb-4">
                            Írj nekünk, ha kérdésed, javaslatod van, vagy további információt szeretnél
                            az adományozási lehetőségekről.
                        </p>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="row g-4">
                            @csrf

                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold fs-5 mb-3 text-light">Név *</label>
                                <input type="text"
                                       class="form-control form-control-lg bg-transparent border-light-subtle text-white @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Teljes neved"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold fs-5 mb-3 text-light">E-mail cím *</label>
                                <input type="email"
                                       class="form-control form-control-lg bg-transparent border-light-subtle text-white @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       placeholder="email@example.com"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label fw-bold fs-5 mb-3 text-light">Tárgy *</label>
                                <input type="text"
                                       class="form-control form-control-lg bg-transparent border-light-subtle text-white @error('subject') is-invalid @enderror"
                                       id="subject"
                                       name="subject"
                                       placeholder="Üzenet tárgya"
                                       value="{{ old('subject') }}"
                                       required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-bold fs-5 mb-3 text-light">Üzenet *</label>
                                <textarea class="form-control bg-transparent border-light-subtle text-white @error('message') is-invalid @enderror"
                                          id="message"
                                          name="message"
                                          rows="5"
                                          placeholder="Miben segíthetünk?"
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-blue-gradient btn-lg px-6 py-4 fs-4 w-100">
                                    <i class="fas fa-paper-plane me-3"></i>Üzenet elküldése
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .btn-blue-gradient {
            background: linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%);
            border: none;
            color: white !important;
            transition: all 0.3s ease;
        }
        .btn-blue-gradient:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.4);
            color: white !important;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
            color: white !important;
        }
        .form-control::placeholder {
            color: rgba(248, 250, 252, 0.5) !important;
        }
        .border-light-subtle {
            border-color: rgba(255, 255, 255, 0.2) !important;
        }
        .form-control {
            border-width: 2px !important;
        }
        .px-6 {
            padding-left: 3.5rem !important;
            padding-right: 3.5rem !important;
        }
    </style>
@endsection
