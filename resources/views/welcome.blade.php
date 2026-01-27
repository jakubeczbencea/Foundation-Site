@extends('layouts.app')
@section('title', 'Főoldal - Tudásodért Alapítvány')

@section('content')
<!-- Hero -->
<section class="hero py-5">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold mb-4">Támogasd a BGéSZC Eötvös Loránd Technikumot!</h1>
                <p class="lead mb-4">Az alapítvány a műszaki szakképzést támogatja eszközfejlesztéssel, programokkal, versenyekkel és rászoruló diákok segítésével.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/donation" class="btn btn-light btn-lg px-5">Online adományozás</a>
                    <button class="btn btn-outline-light btn-lg px-5" data-bs-toggle="modal" data-bs-target="#taxModal">Adó 1% felajánlás</button>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <!-- Hero kép helye -->
                <img src="{{ asset('images/hero-school.jpg') }}" class="img-fluid rounded shadow" alt="Diákok műhelyben">
            </div>
        </div>
    </div>
</section>

<!-- Goals -->
<section id="goals" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Mire gyűjtünk?</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="fas fa-tools card-icon mb-3"></i>
                    <h5>Eszközfejlesztés</h5>
                    <p class="text-muted">Műhelyek, informatikai eszközök beszerzése.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="fas fa-users card-icon mb-3"></i>
                    <h5>Diákprogramok</h5>
                    <p class="text-muted">Táborok, csapatépítők.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="fas fa-trophy card-icon mb-3"></i>
                    <h5>Versenyek, projektek</h5>
                    <p class="text-muted">Felkészülés díjakra.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <i class="fas fa-heart card-icon mb-3"></i>
                    <h5>Rászoruló diákok</h5>
                    <p class="text-muted">Egyéni támogatások.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Eredményeink teaser -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Eredményeink</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/report1.jpg') }}" class="card-img-top" alt="Beszámoló 1">
                    <div class="card-body">
                        <h5 class="card-title">2025-ös eszközbeszerzés</h5>
                        <p class="card-text">Három új CNC gép...</p>
                        <a href="/reports/1" class="btn btn-primary">Tovább</a>
                    </div>
                </div>
            </div>
            <!-- 2 további kártya -->
        </div>
    </div>
</section>

<!-- Hogyan segíthetsz -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h2 class="text-center mb-5">Hogyan tudsz segíteni?</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <i class="fas fa-credit-card fa-3x mb-3"></i>
                <h5>Online adomány</h5>
                <p>Stripe vagy átutalás.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-calendar-check fa-3x mb-3"></i>
                <h5>Rendszeres támogatás</h5>
                <p>Havi adományok.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-file-invoice-dollar fa-3x mb-3"></i>
                <h5>Adó 1%</h5>
                <p>Adószámunk: 12345678-1-42</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <h5>Gyakran ismételt kérdések</h5>
                <p><strong>Milyen célra megy az adomány?</strong> Teljesen átlátható beszámolókkal.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tax 1% Modal -->
<section class="Modal">
<div class="modal fade" id="taxModal" tabindex="-1">
    <div class="modal-dialog">
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



