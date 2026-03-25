<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function welcome(): View
    {
        return view('welcome');
    }

    public function about(): View
    {
        return view('aboutus');
    }

    public function reports(): View
    {
        return view('reports');
    }

    public function donation(): View
    {
        return view('donation');
    }

    public function news(): View
    {
        return view('news');
    }

    public function contacts(): View
    {
        return view('contacts');
    }

    public function imprint(): View
    {
        return view('imprint');
    }

    public function privacyPolicy(): View
    {
        return view('privacy_policy');
    }
}
