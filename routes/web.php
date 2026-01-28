<?php

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
