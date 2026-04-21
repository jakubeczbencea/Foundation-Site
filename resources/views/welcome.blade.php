@extends('layouts.app')
@section('title', 'Főoldal - Tudásodért Alapítvány')

@section('content')
<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center justify-content-center min-vh-75 text-center">
            <div class="col-lg-10">
                <h1 class="display-3 fw-bold mb-4">Támogasd a BGéSZC Eötvös Loránd Technikumot!</h1>
                <p class="lead mb-4 text-light-50">Az alapítvány a műszaki szakképzést támogatja eszközfejlesztéssel, programokkal, versenyekkel és rászoruló diákok segítésével.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('donation') }}" class="btn btn-cta btn-lg px-5">Online adományozás</a>
                    <button class="btn btn-outline-light btn-lg px-5" data-bs-toggle="modal" data-bs-target="#taxModal">Adó 1% felajánlás</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Goals -->
<section id="goals" class="bg-dark-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Mire gyűjtünk?</h2>
        <div class="row g-5 gy-5">
            <div class="col-md-3">
                <div class="card-modern h-100 text-center mb-0">
                    <i class="fas fa-tools card-icon"></i>
                    <h5>Eszközfejlesztés</h5>
                    <p class="text-muted">Műhely- és informatikai eszközök beszerzése az oktatás támogatására <br> valamint a tantermek folyamatos karbantartása és fejlesztése.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern h-100 text-center mb-0">
                    <i class="fas fa-users card-icon"></i>
                    <h5>Diákprogramok</h5>
                    <p class="text-muted">Táborok, csapatépítők és szervezett programok diákoknak <br> amelyek erősítik az összetartozást, és maradandó élményeket nyújtanak.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern h-100 text-center mb-0">
                    <i class="fas fa-trophy card-icon"></i>
                    <h5>Versenyek, projektek</h5>
                    <p class="text-muted">Versenyek és projektek lebonyolítása, amelyek ösztönzik a fejlődést <br> valamint a kiemelkedő teljesítményt nyújtó diákok díjazása.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern h-100 text-center mb-0">
                    <i class="fas fa-heart card-icon"></i>
                    <h5>Rászoruló diákok</h5>
                    <p class="text-muted">Rászoruló diákok támogatása egyéni segítségnyújtással <br> amely hozzájárul a tanulmányi előrehaladáshoz és a sikeres iskolai részvételhez.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Eredményeink teaser -->
<section class="section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Eredményeink</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern h-100 p-0 overflow-hidden mb-0">
                    <img src="{{ asset('images/cnc_machine.jpg') }}" class="card-img-top" alt="CNC gép beszerzés" style="height: 200px; object-fit: cover;">
                    <div class="p-4">
                        <h5 class="card-title">2025-ös eszközbeszerzés</h5>
                        <p class="text-muted small">Három új modern CNC gép került a műhelybe, amellyel a diákok a legújabb technológiákat sajátíthatják el.</p>
                        <a href="{{ route('reports') }}" class="btn btn-primary btn-sm">Tovább</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 p-0 overflow-hidden mb-0">
                    <img src="{{ asset('images/robotics-camp.jpg') }}" class="card-img-top" alt="Robotika tábor" style="height: 200px; object-fit: cover;">
                    <div class="p-4">
                        <h5 class="card-title">Robotika Nyári Tábor</h5>
                        <p class="text-muted small">Sikeresen lezajlott az első nyári robotika táborunk, ahol 20 diák épített saját programozható robotot.</p>
                        <a href="{{ route('reports') }}" class="btn btn-primary btn-sm">Tovább</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 p-0 overflow-hidden mb-0">
                    <img src="{{ asset('images/competition-win.jpg') }}" class="card-img-top" alt="Verseny győzelem" style="height: 200px; object-fit: cover;">
                    <div class="p-4">
                        <h5 class="card-title">Országos Verseny Siker</h5>
                        <p class="text-muted small">Diákjaink első helyezést értek el az országos CAD/CAM tervezői versenyen, öregbítve iskolánk hírnevét.</p>
                        <a href="{{ route('reports') }}" class="btn btn-primary btn-sm">Tovább</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hogyan segíthetsz -->
<section class="bg-dark-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5 text-white">Hogyan tudsz segíteni?</h2>
        <div class="row g-5 text-center">
            <div class="col-md-4">
                <div class="p-4">
                    <i class="fas fa-credit-card fa-3x mb-3 text-blue"></i>
                    <h5>Online adomány</h5>
                    <p class="text-muted">Stripe vagy átutalás.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="fas fa-calendar-check fa-3x mb-3 text-blue"></i>
                    <h5>Rendszeres támogatás</h5>
                    <p class="text-muted">Havi adományok.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="fas fa-file-invoice-dollar fa-3x mb-3 text-blue"></i>
                    <h5>Adó 1%</h5>
                    <p class="text-muted">Adószámunk: 12345678-1-42</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tax 1% Modal -->
<section class="Modal">
<div class="modal fade" id="taxModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adó 1% felajánlás</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Kérjük, használd az alábbi adószámot az 1% felajánláshoz:</p>
                <h4 class="text-center">12345678-1-42</h4>
                <p>Az adó 1% felajánlásával nagyban hozzájárulsz a diákok fejlődéséhez és a technikai oktatás színvonalának emeléséhez.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
            </div>
        </div>
    </div>
</div>
</section>

@endsection



