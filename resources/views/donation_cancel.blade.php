@extends('layouts.app')

@section('title', 'Sikertelen adományozás')

@section('content')
<section class="section-padding">
    <div class="container text-center">
        <div class="card-modern p-5 shadow-lg d-inline-block">
            <i class="fas fa-times-circle fa-5x text-danger mb-4"></i>
            <h1 class="display-4 fw-bold mb-4">A fizetés megszakadt</h1>
            <p class="lead mb-5">Sajnáljuk, de az adományozási folyamat nem sikerült. Próbáld újra később.</p>
            <a href="{{ route('donation') }}" class="btn btn-blue-gradient btn-lg">Újra próbálom</a>
        </div>
    </div>
</section>
@endsection
