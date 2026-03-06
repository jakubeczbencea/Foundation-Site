<?php

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

// POST: Kapcsolati űrlap elküldése
Route::post('/kapcsolat', [ContactController::class, 'send'])
    ->name('contact.send');