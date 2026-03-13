@extends('layouts.app')

@section('title', 'Impresszum')

@section('content')
    <div class="container mt-5 text-center">
        <h1>Impresszum</h1>
        <p>A weboldalt üzemeltető adatai.</p>

        <div class="mb-4 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h2>Üzemeltető</h2>
                <p><strong>Név:</strong> [Ide jön a név vagy a cég név!]</p>
                <p><strong>Székhely:</strong> [...]</p>
                <p><u><strong>Elérhetőségek:</strong></u></p>
                <p>
                    <strong>E‑mail:</strong> <a href="mailto:info@example.com">info@example.com</a><br>
                    <strong>Telefon:</strong> +36 1 234 5678
                </p>

                <p><strong>Adószám:</strong><br>
                    12345678‑1‑23</p>

                <p><strong>Cégjegyzékszám (esetleg ha van):</strong><br>
                    01‑10‑123456</p>

                <p><strong>Tárhely szolgáltató:</strong><br>
                    Pl: <i>Hostinger Hungary Kft.</i></p>

                <p><small>
                        A weboldal üzemeltetése és a tartalom felelőssége a fenti néven szereplő üzemeltetőt terheli.
                    </small></p>
            </div>
        </div>
    </div>
@endsection
