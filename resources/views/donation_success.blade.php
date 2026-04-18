@extends('layouts.app')

@section('title', 'Sikeres adományozás')

@section('content')
<section class="section-padding">
    <div class="container text-center">
        <div class="card-modern p-5 shadow-lg d-inline-block">
            <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
            <h1 class="display-4 fw-bold mb-4">Köszönjük a támogatást!</h1>
            <p class="lead mb-5">Az adományod sikeresen megérkezett. Emailben küldjük a részleteket.</p>
            <a href="{{ route('home') }}" class="btn btn-blue-gradient btn-lg">Vissza a főoldalra</a>
        </div>
    </div>
</section>
@endsection
