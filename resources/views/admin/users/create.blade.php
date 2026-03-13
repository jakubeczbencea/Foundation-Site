@extends('admin.layouts.app')

@section('title', 'Új felhasználó - Admin')

@section('content')
<div class="page-header">
    <h2>Új felhasználó</h2>
    <p>Új admin felhasználó hozzáadása</p>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Teljes név</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}" required placeholder="Kovács János">
                        @error('name')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email cím</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}" required placeholder="admin@tudasodert.hu">
                        @error('email')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Jogosultság</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Szuperadmin</option>
                        </select>
                        <div class="form-text text-muted">
                            A szuperadmin minden funkciót elérhet, az admin korlátozott jogosultságú.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" name="password" id="password" class="form-control"
                            required placeholder="Minimum 8 karakter">
                        @error('password')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" required placeholder="Jelszó újra">
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.06);">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-admin-primary">
                    <i class="fas fa-user-plus me-1"></i>Létrehozás
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-admin-secondary">Mégse</a>
            </div>
        </form>
    </div>
</div>
@endsection
