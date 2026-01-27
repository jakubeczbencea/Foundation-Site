<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rolunk', function () {
    return view('aboutus');   // resources/views/aboutus.blade.php
})->name('about');
