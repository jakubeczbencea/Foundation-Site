@extends('admin.layouts.app')

@section('title', 'Beállítások - Admin')

@section('content')
<div class="page-header">
    <h2>Beállítások</h2>
    <p>Alapítvány adatai, elérhetőségek és fizetési beállítások</p>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Alapadatok -->
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-university me-2"></i>Alapítvány adatai</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Oldal neve</label>
                        <input type="text" name="site_name" class="form-control"
                            value="{{ $settings['site_name']['value'] }}" placeholder="Tudásodért Alapítvány">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alapítvány neve</label>
                        <input type="text" name="foundation_name" class="form-control"
                            value="{{ $settings['foundation_name']['value'] }}"
                            placeholder="Tudásodért Alapítvány a Műszaki Szakképzés Támogatására">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adószám</label>
                        <input type="text" name="tax_number" class="form-control"
                            value="{{ $settings['tax_number']['value'] }}" placeholder="12345678-1-42">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cím</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ $settings['address']['value'] }}" placeholder="Budapest, Iskolaköz 1.">
                    </div>
                </div>
            </div>
        </div>

        <!-- Elérhetőségek -->
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-address-card me-2"></i>Elérhetőségek</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Email cím</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ $settings['email']['value'] }}" placeholder="info@tudasodert.hu">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefonszám</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ $settings['phone']['value'] }}" placeholder="+36 1 234 5678">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" name="facebook_url" class="form-control"
                            value="{{ $settings['facebook_url']['value'] }}" placeholder="https://facebook.com/...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" name="instagram_url" class="form-control"
                            value="{{ $settings['instagram_url']['value'] }}" placeholder="https://instagram.com/...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Weboldal URL</label>
                        <input type="url" name="website_url" class="form-control"
                            value="{{ $settings['website_url']['value'] }}" placeholder="https://eotvos.hu">
                    </div>
                </div>
            </div>
        </div>

        <!-- Fizetési beállítások -->
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-credit-card me-2"></i>Fizetési beállítások</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Bank neve</label>
                        <input type="text" name="bank_name" class="form-control"
                            value="{{ $settings['bank_name']['value'] }}" placeholder="OTP Bank">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bankszámlaszám</label>
                        <input type="text" name="bank_account" class="form-control"
                            value="{{ $settings['bank_account']['value'] }}" placeholder="11111111-22222222-33333333">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stripe publikus kulcs</label>
                        <input type="text" name="stripe_public_key" class="form-control"
                            value="{{ $settings['stripe_public_key']['value'] }}" placeholder="pk_live_...">
                        <div class="form-text text-muted">Hagyhatod üresen, amíg nincs Stripe</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stripe titkos kulcs</label>
                        <input type="password" name="stripe_secret_key" class="form-control"
                            value="{{ $settings['stripe_secret_key']['value'] }}" placeholder="sk_live_...">
                        <div class="form-text text-muted">Hagyhatod üresen, amíg nincs Stripe</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-admin-primary btn-lg">
            <i class="fas fa-save me-2"></i>Beállítások mentése
        </button>
    </div>
</form>
@endsection
