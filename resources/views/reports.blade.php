@extends('layouts.app')

@section('title', 'Beszámolók - Tudásodért Alapítvány')

@section('content')
    <!-- Hero szekció -->
    <section class="hero section-padding">
        <div class="container text-center">
            <h1 class="mb-4">Beszámolók és eredményeink</h1>
            <p class="lead fs-3 mb-5 mx-auto" style="max-width: 600px;">
                lásd, mire használtuk fel a támogatásokat
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="/tamogatas" class="btn btn-lg btn-cta">
                    <i class="fas fa-heart me-2"></i>Támogatom az alapítványt
                </a>
            </div>
        </div>
    </section>

    <!-- Statisztika kártyák -->
    <section class="section-padding bg-dark-section">
        <div class="container">
            <div class="row g-5 gy-5 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card-modern h-100 p-4 mb-0">
                        <i class="fas fa-coins card-icon"></i>
                        <h3 class="fw-bold fs-1 mb-2 text-blue">5.2M</h3>
                        <p class="text-light-50 mb-0">Összesített támogatás</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card-modern h-100 p-4 mb-0">
                        <i class="fas fa-tools card-icon"></i>
                        <h3 class="fw-bold fs-1 mb-2 text-blue">47</h3>
                        <p class="text-light-50 mb-0">Új eszköz beszerzés</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card-modern h-100 p-4 mb-0">
                        <i class="fas fa-users card-icon"></i>
                        <h3 class="fw-bold fs-1 mb-2 text-blue">320</h3>
                        <p class="text-light-50 mb-0">Támogatott diák</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card-modern h-100 p-4 mb-0">
                        <i class="fas fa-trophy card-icon"></i>
                        <h3 class="fw-bold fs-1 mb-2 text-blue">12</h3>
                        <p class="text-light-50 mb-0">Verseny díj</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beszámolók grid -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-5 gy-5">
                <!-- Beszámoló 1 -->
                <div class="col-lg-6">
                    <div class="card-modern h-100 p-5 position-relative overflow-hidden mb-0">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-secondary fs-6">2025 Q4</span>
                        </div>
                        <img src="{{ asset('images/cnc_machine.jpg') }}" class="rounded-3 mb-4 shadow-lg"
                            style="height: 250px; object-fit: cover; width: 100%;">
                        <h2 class="h3 fw-bold mb-3">Három új CNC gép a műhelyben</h2>
                        <p class="text-light-50 mb-4 lead">
                            A támogatóinknak köszönhetően beszerzésre került 3 db professzionális CNC megmunkáló
                            gép, amelyek lehetővé teszik a diákok számára a legmodernebb gyártástechnológiák
                            elsajátítását.
                        </p>
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/admin-avatar.jpg') }}" class="rounded-circle me-3" width="50"
                                height="50" alt="Admin">
                            <div>
                                <div class="fw-bold text-blue">...</div>
                                <small class="text-light-50">Alapítvány elnöke</small>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-eye me-2"></i>Részletes beszámoló
                        </a>
                    </div>
                </div>

                <!-- Beszámoló 2 -->
                <div class="col-lg-6">
                    <div class="card-modern h-100 p-5 position-relative overflow-hidden mb-0">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-primary fs-6 text-white">2025 Q3</span>
                        </div>
                        <img src="{{ asset('images/robotics-camp.jpg') }}" class="rounded-3 mb-4 shadow-lg"
                            style="height: 250px; object-fit: cover; width: 100%;">
                        <h2 class="h3 fw-bold mb-3">Robotika tábor 45 diák számára</h2>
                        <p class="text-light-50 mb-4 lead">
                            Szeptemberben 45 rászoruló diák vehetett részt 5 napos robotika táborunkban,
                            ahol LEGO Mindstorms robotokkal ismerkedhettek meg a programozás és
                            robotika alapjaival.
                        </p>
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/teacher-avatar.jpg') }}" class="rounded-circle me-3" width="50"
                                height="50" alt="Tanár">
                            <div>
                                <div class="fw-bold text-blue">...</div>
                                <small class="text-light-50">Tábor vezető</small>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-eye me-2"></i>Részletes beszámoló
                        </a>
                    </div>
                </div>

                <!-- Beszámoló 3 -->
                <div class="col-lg-4">
                    <div class="card-modern h-100 p-4 mb-0">
                        <div class="position-absolute top-3 end-3">
                            <span class="badge bg-success fs-6 text-white">2025. szept. 18.</span>
                        </div>
                        <img src="{{ asset('images/competition-win.jpg') }}" class="rounded-3 mb-3 shadow-lg"
                            style="height: 180px; object-fit: cover; width: 100%;">
                        <h3 class="h5 fw-bold mb-3">EuroSkills 2025</h3>
                        <p class="text-light-50 mb-3">
                            A EuroSkills Herning 2025 versenyen a magyar csapat történelmi sikert ért el: 4 arany-, 2 ezüst-, 5 bronz- és több kiválósági érmet szereztek, amivel ez az egyik legerősebb magyar szereplés a verseny történetében. Aranyérmes lett Stefán Kornél szoftverfejlesztő, Mrakovics Olivér webfejlesztő, a Simon Tamás–Téringer Gergő informatikai rendszerüzemeltető páros és a Császi Sándor–Izsó Roland ipar 4.0 duó; közülük Stefán Kornél 795 ponttal a „Nemzet Legjobbja” címet is elnyerte. 
                        </p>
                        <a href="#" class="btn btn-outline-light w-100">
                            Olvasás <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Beszámoló 4 -->
                <div class="col-lg-4">
                    <div class="card-modern h-100 p-4 mb-0">
                        <div class="position-absolute top-3 end-3">
                            <span class="badge bg-warning fs-6 text-dark">2025 Q1</span>
                        </div>
                        <img src="{{ asset('images/new-laptops.jpg') }}" class="rounded-3 mb-3 shadow-lg"
                            style="height: 180px; object-fit: cover; width: 100%;">
                        <h3 class="h5 fw-bold mb-3">42 új laptop programozáshoz</h3>
                        <p class="text-light-50 mb-3">
                            Informatika terem teljes felszerelése Python oktatáshoz.
                        </p>
                        <a href="#" class="btn btn-outline-light w-100">
                            Olvasás <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Beszámoló 5 -->
                <div class="col-lg-4">
                    <div class="card-modern h-100 p-4 mb-0">
                        <div class="position-absolute top-3 end-3">
                            <span class="badge bg-info fs-6 text-white">2024 Q4</span>
                        </div>
                        <img src="{{ asset('images/student-support.jpg') }}" class="rounded-3 mb-3 shadow-lg"
                            style="height: 180px; object-fit: cover; width: 100%;">
                        <h3 class="h5 fw-bold mb-3">Egyéni támogatások</h3>
                        <p class="text-light-50 mb-3">
                            18 rászoruló diák kapott laptopot és tanfolyami díjat.
                        </p>
                        <a href="#" class="btn btn-outline-light w-100">
                            Olvasás <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
