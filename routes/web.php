<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rolunk', function () {
    return view('aboutus');   // resources/views/aboutus.blade.php
})->name('about');

Route::get('/beszamolo', function () {
    return view('reports');   // resources/views/reports.blade.php
})->name('reports');

Route::get('/tamogatas', function () {
    return view('donation');   // resources/views/donation.blade.php
})->name('donation');

Route::get('/hirek', function () {
    return view('news');   // resources/views/news.blade.php
})->name('news');

Route::get('/kapcsolat', function () {
    return view('contacts');   // resources/views/contacts.blade.php
})->name('contacts');

Route::get('/impresszum', function () {
    return view('imprint'); // resources/views/imprint.blade.php
});

Route::get('/adatvedelem', function () {
    return view('privacy_policy'); // resources/views/privacy_policy.blade.php
});

// POST: Kapcsolati űrlap elküldése
Route::post('/kapcsolat', [ContactController::class, 'send'])
    ->name('contact.send');


// ============================
// AUTENTIKÁCIÓ
// ============================

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ============================
// ADMIN FELÜLET
// ============================

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Vezérlőpult
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Adományok
        Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
        Route::get('/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
        Route::patch('/donations/{donation}/status', [DonationController::class, 'updateStatus'])->name('donations.status');
        Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');

        // Hírek / Beszámolók
        Route::resource('news', NewsController::class)->except(['show']);

        // Beállítások
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Felhasználók
        Route::resource('users', UserController::class)->except(['show']);
    });
