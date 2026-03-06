@extends('layouts.app')

@section('title', 'Rólunk - Tudásodért Alapítvány')

@section('content')
    <!-- Hero szekció -->
    <section class="hero section-padding text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Rólunk</h1>
            <p class="lead mb-4 text-light-50">
                A Tudásodért Alapítvány célja, hogy a BGéSZC Eötvös Loránd Technikum diákjainak
                fejlődését, tanulmányait és közösségi életét hosszú távon támogassa.
            </p>
            <a href="/tamogatas" class="btn btn-lg btn-cta">
                <i class="fas fa-heart me-2"></i>Támogatom az alapítványt
            </a>
        </div>
    </section>

    <!-- Küldetés, célok, iskola blokk -->
    <section class="bg-dark-section section-padding">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold mb-3">Küldetésünk</h2>
                    <p class="text-muted">
                        Az alapítvány az iskolához szorosan kapcsolódva dolgozik azon, hogy minden
                        diák számára elérhetőbbé tegye a minőségi oktatást, a modern eszközöket és a
                        közösségépítő programokat.
                    </p>
                </div>
            </div>

            <div class="row g-5 gy-5">
                <!-- Kártya 1: Oktatási támogatás -->
                <div class="col-md-4">
                    <div class="card-modern h-100 text-center mb-0">
                        <i class="fas fa-graduation-cap card-icon mb-3"></i>
                        <h5 class="fw-bold">Oktatási támogatás</h5>
                        <p class="text-muted">
                            Versenyek, pályázatok és tanulmányi programok támogatása, hogy a
                            tehetséges diákok kibontakoztathassák képességeiket.
                        </p>
                    </div>
                </div>

                <!-- Kártya 2: Eszközfejlesztés -->
                <div class="col-md-4">
                    <div class="card-modern h-100 text-center mb-0">
                        <i class="fas fa-laptop-code card-icon mb-3"></i>
                        <h5 class="fw-bold">Eszközfejlesztés</h5>
                        <p class="text-muted">
                            Informatikai és egyéb taneszközök beszerzése, hogy az oktatás
                            lépést tarthasson a modern technológiákkal.
                        </p>
                    </div>
                </div>

                <!-- Kártya 3: Közösségépítés -->
                <div class="col-md-4">
                    <div class="card-modern h-100 text-center mb-0">
                        <i class="fas fa-people-group card-icon mb-3"></i>
                        <h5 class="fw-bold">Közösségépítés</h5>
                        <p class="text-muted">
                            Iskolai rendezvények, kirándulások és közösségi programok támogatása,
                            amelyek erősítik az Eötvösös diákok összetartását.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kapcsolat / további info -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Kapcsolat az iskolával</h3>
                    <p class="text-muted">
                        Az alapítvány szorosan együttműködik a BGéSZC Eötvös Loránd Technikum
                        vezetésével és tantestületével. Az aktuális projektek, támogatási lehetőségek
                        és események az iskola hivatalos csatornáin is megjelennek.
                    </p>
                    <p class="mb-2">
                        Iskola címe: 1204 Budapest, Török Flóris u. 89.
                    </p>
                    <p class="mb-0 text-muted">
                        További elérhetőségek és hivatalos információk:
                        <a href="https://eotvosszki.hu" target="_blank" class="text-blue">eotvosszki.hu</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card-modern">
                        <h4 class="fw-bold mb-3">Miért fontos a támogatásod?</h4>
                        <p class="text-muted mb-3">
                            Minden adomány – legyen az kisebb vagy nagyobb összeg – hozzájárul ahhoz,
                            hogy az Eötvös Loránd Technikum diákjai korszerű, inspiráló környezetben
                            tanulhassanak.
                        </p>
                        <p class="text-muted mb-3">
                            A támogatások felhasználásáról beszámolók és hírek formájában is tájékoztatást
                            adunk, hogy mindig lásd, mire fordítjuk a segítségedet.
                        </p>
                        <a href="/beszamolo" class="btn btn-outline-light">
                            <i class="fas fa-file-alt me-2"></i>Beszámolók megtekintése
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
