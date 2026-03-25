<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// ============================
// KÖZÖS OLDALAK
// ============================

Route::get('/', [PageController::class, 'welcome'])->name('home');
Route::get('/rolunk', [PageController::class, 'about'])->name('about');
Route::get('/beszamolo', [PageController::class, 'reports'])->name('reports');
Route::get('/tamogatas', [PageController::class, 'donation'])->name('donation');
Route::get('/hirek', [PageController::class, 'news'])->name('news');
Route::get('/kapcsolat', [PageController::class, 'contacts'])->name('contacts');
Route::get('/impresszum', [PageController::class, 'imprint'])->name('imprint');
Route::get('/adatvedelem', [PageController::class, 'privacyPolicy'])->name('privacy-policy');

// POST: Kapcsolati űrlap elküldése
Route::post('/kapcsolat', [ContactController::class, 'send'])->name('contact.send');


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

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});


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
