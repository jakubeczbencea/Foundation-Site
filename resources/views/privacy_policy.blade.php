@extends('layouts.app')

@section('title', 'Adatvédelmi nyilatkozat')

@section('content')
    <div class="container mt-5">
        <h1>Adatvédelmi nyilatkozat</h1>
        <p>Ez a nyilatkozat a <strong>{{ config('app.name', 'Laravel') }}</strong> weboldal személyes adatainak kezelését szabályozza.</p>

        <div class="mb-4">
            <div class="card-body">
                <h4>1. Bevezetés</h4>
                <p>A weboldal a személyes adatokat a GDPR (Általános Adatvédelmi Rendelet) szabályai szerint kezeli. A nyilatkozat tartalmazza, hogy milyen adatokat gyűjtünk, mire használjuk, és kikkel osztjuk meg őket.</p>

                <h4>2. Milyen adatokat gyűjtünk?</h4>
                <p>- Név, e‑mail cím (ha regisztrálni vagy kapcsolatot kérni szeretne a felhasználó)<br>
                    - Névtelen IP cím, böngésző‑típus, látogatási adatok a statisztikákhoz.</p>

                <h4>3. Mire használjuk az adatokat?</h4>
                <p>- A felhasználókkal való kapcsolattartásra,<br>
                    - A szolgáltatások működtetésére és fejlesztésére.</p>

                <h4>4. Adattárolás időtartama</h4>
                <p>A személyes adatokat csak a szükséges ideig tartjuk meg, a jogszabályi előírásoknak vagy a szolgáltatás működtetésének megfelelően.</p>

                <h4>5. Az adatokat kikkel osztjuk meg?</h4>
                <p>Általános esetben a személyes adatokat nem adunk át harmadik fél számára, kivéve jogi kötelezettség, bírósági végzés vagy hatósági megkeresés teljesítése esetén.</p>

                <h4>6. Felhasználók jogai</h4>
                <p>A felhasználók jogosultak:<br>
                    - Adataikhoz való hozzáférésre,<br>
                    - Adatok javítására vagy helyesbítésére,<br>
                    - Adatok törlésére vagy feldolgozásuk korlátozására,<br>
                    - Adatkezelés elleni tiltakozásra.</p>

                <h4>7. Statisztikai eszközök</h4>
                <p>Oldalunk statisztikai céllal anonimizált adatokat gyűjthet a weboldal látogatottságának és a felhasználási minták elemzésére (pl. analitikai szolgáltatásokkal).</p>

                <h4>8. Egyéb megjegyzések</h4>
                <p>Amennyiben kérdése van az adatkezeléssel kapcsolatban, lépjen velünk kapcsolatba az alábbi elérhetőségek egyikén:</p>

                <p>E‑mail: <a href="mailto:info@example.com">info@example.com</a></p>

                <p>Frissítés dátuma: <em>2026. március 13.</em></p>
            </div>
        </div>
    </div>
@endsection
