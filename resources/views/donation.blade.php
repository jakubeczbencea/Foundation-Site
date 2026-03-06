@extends('layouts.app')

@section('title', 'Adományozás - Tudásodért Alapítvány')

@section('content')
    <!-- Hero -->
    <section class="hero section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center ">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-4">Támogasd a diákjainkat</h1>
                    <p class="lead fs-3 mb-5 opacity-90">
                        Válassz célt vagy adj egyedi összeget – minden támogatás számít!
                    </p>
                    <div class="row g-3 mb-5">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-white bg-opacity-10 rounded-4">
                                <i class="fas fa-lock fa-2x text-blue me-3"></i>
                                <div>
                                    <div class="fw-bold h5 mb-0">Biztonságos fizetés</div>
                                    <small class="text-light-50">SSL titkosítás</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-white bg-opacity-10 rounded-4">
                                <i class="fas fa-receipt fa-2x text-blue me-3"></i>
                                <div>
                                    <div class="fw-bold h5 mb-0">Átlátható elszámolás</div>
                                    <small class="text-light-50">Mindenki látja a felhasználást</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Célok kiválasztása -->
    <section class="section-padding bg-dark">
        <div class="container">
            <h2 class="text-center mb-5">Válassz támogatási célt</h2>
            <div class="row g-4">
                <!-- Cél 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern h-100 text-center p-5 position-relative">
                        <div class="position-absolute top-4 start-4">
                            <span class="badge bg-success fs-6 text-white">Aktív</span>
                        </div>
                        <i class="fas fa-tools fa-4x text-blue mb-4"></i>
                        <h3 class="h4 fw-bold mb-3">Eszközpark bővítés</h3>
                        <div class="progress mx-auto mb-4" style="height: 12px; width: 250px;">
                            <div class="progress-bar bg-blue-gradient" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-4 fs-5">
                            <span>3,240,000 Ft</span>
                            <span class="fw-bold text-blue">5,000,000 Ft</span>
                        </div>
                        <button class="btn btn-blue-gradient btn-lg w-100 mb-3" onclick="selectGoal(1)">
                            Támogatom ezt <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                        <small class="text-light-50">Hiányzik: 1,760,000 Ft</small>
                    </div>
                </div>

                <!-- Cél 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-modern h-100 text-center p-5">
                        <i class="fas fa-users fa-4x text-blue mb-4"></i>
                        <h3 class="h4 fw-bold mb-3">Diákprogramok</h3>
                        <div class="progress mx-auto mb-4" style="height: 12px; width: 250px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mb-4 fs-5">
                            <span>2,100,000 Ft</span>
                            <span class="fw-bold">5,000,000 Ft</span>
                        </div>
                        <button class="btn btn-outline-light btn-lg w-100 mb-3" onclick="selectGoal(2)">
                            Támogatom <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Egyedi támogatás -->
                <div class="col-lg-4 col-md-12">
                    <div class="card-modern h-100 text-center p-5 border-primary">
                        <i class="fas fa-hand-holding-heart fa-4x text-blue mb-4"></i>
                        <h3 class="h4 fw-bold mb-3">Egyedi összeg</h3>
                        <p class="text-light-50 mb-4">Bármennyi összeget adományozhatsz – Minden fillér számít!</p>
                        <button class="btn btn-blue-gradient btn-lg w-100" onclick="selectCustom()">
                            Egyedi összeg <i class="fas fa-gift ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adományozási űrlap -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-modern p-5 shadow-lg">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold fs-5 mb-3">Név *</label>
                                <input type="text" class="form-control form-control-lg bg-transparent border-blue text-light" placeholder="Teljes neved" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold fs-5 mb-3">Email *</label>
                                <input type="email" class="form-control form-control-lg bg-transparent border-blue text-light" placeholder="email@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold fs-5 mb-3">Üzenet (opcionális)</label>
                                <textarea class="form-control bg-transparent border-blue text-light" rows="3" placeholder="Például: 'Sok sikert a robotcsapatnak!'"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold fs-5 mb-3">Összeg *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-blue-gradient text-white border-0">Ft</span>
                                    <input type="number" class="form-control form-control-lg bg-transparent border-start-0 text-light text-end fs-3" placeholder="5000" min="1000" step="1000" id="donationAmount">
                                </div>
                            </div>
                            <div class="col-md-6 align-self-end">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label text-light-50" for="newsletter">
                                        Hírlevél feliratkozás
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="anonymous" checked>
                                    <label class="form-check-label text-light-50" for="anonymous">
                                        Névtelen adományozás
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-blue-gradient btn-lg px-6 py-4 fs-4 w-100">
                                    <i class="fas fa-credit-card me-3"></i>
                                    Fizetés most <span id="totalAmount" class="ms-2">5,000 Ft</span>
                                </button>
                                <div class="mt-4 pt-4 border-top border-light border-opacity-20">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <i class="fas fa-lock fa-2x text-blue mb-2 d-block"></i>
                                            <small class="text-light-50">SSL védett</small>
                                        </div>
                                        <div class="col-4">
                                            <i class="fas fa-shield-alt fa-2x text-blue mb-2 d-block"></i>
                                            <small class="text-light-50">Átirányítás</small>
                                        </div>
                                        <div class="col-4">
                                            <i class="fas fa-undo fa-2x text-blue mb-2 d-block"></i>
                                            <small class="text-light-50">Visszatérítés 14 nap</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let selectedGoal = 1;
        function selectGoal(goalId) {
            selectedGoal = goalId;
            document.querySelectorAll('[onclick^="selectGoal"]').forEach(btn => btn.classList.remove('btn-blue-gradient'));
            event.target.classList.add('btn-blue-gradient');
        }

        function selectCustom() {
            selectedGoal = 0;
            document.querySelectorAll('[onclick^="selectGoal"]').forEach(btn => btn.classList.remove('btn-blue-gradient'));
        }

        document.getElementById('donationAmount').addEventListener('input', function() {
            const amount = this.value || 5000;
            document.getElementById('totalAmount').textContent = amount.toLocaleString() + ' Ft';
        });
    </script>

@endsection
