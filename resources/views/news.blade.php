@extends('layouts.app')

@section('title', 'Hírek és beszámolók - Tudásodért Alapítvány')

@section('content')
    <!-- Hero szekció -->
    <section class="hero section-padding text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Hírek és beszámolók</h1>
            <p class="lead mb-4 text-light-50">
                Itt találod a Tudásodért Alapítvány legfrissebb híreit, beszámolóit és az Eötvös Loránd Technikum
                életéhez kapcsolódó fontos eseményeket.
            </p>
            <a href="/tamogatas" class="btn btn-lg btn-cta">
                <i class="fas fa-heart me-2"></i>Támogatom az alapítványt
            </a>
        </div>
    </section>

    <!-- Kiemelt hír / bevezető blokk -->
    <section class="bg-dark-section section-padding">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold mb-3">Legfrissebb híreink</h2>
                    <p class="text-muted">
                        Beszámolunk az adományok felhasználásáról, az aktuális projektekről és azokról az
                        iskolai programokról, amelyekhez a támogatások hozzájárulnak.
                    </p>
                </div>
            </div>

            <div class="row g-5 gy-5">
                <!-- Hírkártya 1 -->
                <div class="col-md-4">
                    <div class="card-modern h-100 mb-0">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Friss</span>
                            <h5 class="fw-bold mb-2">Új informatikai eszközök az Eötvösben</h5>
                            <p class="text-muted small mb-2">2026. március 1.</p>
                            <p class="text-muted">
                                Az alapítvány támogatásával új számítógépek és hálózati eszközök
                                kerültek beszerzésre, amelyek a szakmai órák minőségét javítják.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Hírkártya 2 -->
                <div class="col-md-4">
                    <div class="card-modern h-100 mb-0">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Beszámoló</span>
                            <h5 class="fw-bold mb-2">Tanulmányi versenyek támogatása</h5>
                            <p class="text-muted small mb-2">2026. február 20.</p>
                            <p class="text-muted">
                                A diákok országos és nemzetközi versenyeken való részvételét
                                utazási és nevezési költségek átvállalásával segítettük.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Hírkártya 3 -->
                <div class="col-md-4">
                    <div class="card-modern h-100 mb-0">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Esemény</span>
                            <h5 class="fw-bold mb-2">Közösségi programok az alapítvány támogatásával</h5>
                            <p class="text-muted small mb-2">2026. január 30.</p>
                            <p class="text-muted">
                                Kirándulások, csapatépítő programok és iskolai rendezvények
                                valósultak meg, amelyek erősítik az Eötvösös diákok közösségét.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ha később dinamikus híreket hozol az adatbázisból, ide jöhet majd a @foreach a hírekre --}}
        </div>
    </section>

    <!-- Hírlevél / további tájékoztatás -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Maradj naprakész</h3>
                    <p class="text-muted">
                        Rendszeresen frissítjük híreinket, hogy látható legyen, mire fordítjuk az
                        adományokat, és milyen projektek valósulnak meg az iskola életében.
                    </p>
                    <p class="text-muted mb-3">
                        A fontosabb beszámolókat az iskola hivatalos csatornáin is megosztjuk, így a
                        szülők, diákok és támogatók mindenhol találkozhatnak velük.
                    </p>
                    <a href="/beszamolo" class="btn btn-outline-light">
                        <i class="fas fa-file-alt me-2"></i>Részletes beszámolók megtekintése
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="card-modern">
                        <h4 class="fw-bold mb-3">Hogyan segítenek az adományok?</h4>
                        <p class="text-muted mb-3">
                            A beérkező támogatásokból eszközfejlesztés, tanulmányi versenyek, valamint
                            közösségi programok valósulnak meg, amelyek közvetlenül a diákokat segítik.
                        </p>
                        <p class="text-muted mb-3">
                            Célunk az átláthatóság: minden jelentősebb projekt után beszámolót
                            készítünk, hogy pontosan lásd, milyen eredményeket értünk el közösen.
                        </p>
                        <a href="/tamogatas" class="btn btn-cta">
                            <i class="fas fa-heart me-2"></i>Szeretnék hozzájárulni
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
