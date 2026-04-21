# Tudásodért Alapítvány - Honlap és Adománykezelő Rendszer

A Tudásodért Alapítvány weboldal, amely a műszaki szakképzés támogatását, a hírek közzétételét és az online adománygyűjtést segíti. A rendszer modern alapokon nyugszik, lehetővé téve a biztonságos bankkártyás fizetést és az adminisztrációs feladatok egyszerű kezelését.

## Főbb technológiák
- **Framework:** Laravel 12
- **Backend:** PHP 8.2+
- **Frontend:** Blade sablonok, Tailwind CSS 4, Bootstrap 5 (CDN), Vite
- **Fizetési kapu:** Stripe API integration
- **Adatbázis:** MySQL

## Követelmények
A futtatáshoz a következő szoftverekre lesz szükséged:
- PHP 8.2 vagy újabb
- Composer
- Node.js & NPM
- MySQL (vagy tetszőleges SQL szerver)

## Telepítési folyamat

### 1. Repo klónozása
```powershell
git clone https://github.com/jakubeczbencea/Foundation-Site.git
cd foundation-site
```

### 2. PHP függőségek telepítése
A Laravel keretrendszer és a Stripe API kliens telepítése:
```powershell
composer install
composer require stripe/stripe-php
```

### 3. Környezeti változók beállítása
Másold le a `.env.example` fájlt `.env` néven:
```powershell
copy .env.example .env
```

Generálj egy új API kulcsot:
```powershell
php artisan key:generate
```

### 4. Adatbázis migrálása
Futtasd a migrációkat és a seedereket (ez létrehozza a táblákat és az alapértelmezett admin felhasználót):
```powershell
php artisan migrate --seed
```

### 5. Frontend függőségek és build
Tailwind CSS és egyéb frontend eszközök telepítése:
```powershell
npm install
npm install tailwindcss @tailwindcss/vite
npm run build
```

## Stripe beállítása
Az online adományozáshoz szükséged lesz egy Stripe fiókra (Egy teszt fiókhoz hozzá van kapcsolva a `.env.example` fájlban található kulcs). A `.env` fájlban állítsd be a következő kulcsokat:
```env
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

### Teszteléshez használható kártya (Stripe Sandbox):
- **Kártyaszám:** `4242 4242 4242 4242`
- **Lejárat:** Bármilyen jövőbeli dátum
- **CVC:** Bármilyen 3 db számjegy

## Szerver indítása
A fejlesztői szervert az alábbi paranccsal indíthatod el:
```powershell
php artisan serve
```
Az oldal alapértelmezés szerint a `http://127.0.0.1:8000` címen lesz elérhető.

## Adminisztráció
Az admin felület a `/login` útvonalon érhető el.
- **Alapértelmezett email:** `admin@tudasodert.hu`
- **Alapértelmezett jelszó:** `admin123`

---
*Készült vizsgaremek projektként.*

*Készítette: Kiss Márton Dániel és társa, Jakubecz Bence András.*

