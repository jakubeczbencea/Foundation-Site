@extends('admin.layouts.app')

@section('title', 'Felhasználó szerkesztése - Admin')

@section('content')
<div class="page-header">
    <h2>Felhasználó szerkesztése</h2>
    <p>{{ $user->name }} adatainak módosítása</p>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Teljes név</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email cím</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Jogosultság</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Szuperadmin</option>
                        </select>
                    </div>

                    <hr style="border-color: rgba(255,255,255,0.06);">

                    <p class="text-muted" style="font-size: 0.85rem;">
                        <i class="fas fa-info-circle me-1"></i>
                        Hagyd üresen a jelszó mezőket, ha nem akarod megváltoztatni.
                    </p>

                    <div class="mb-3">
                        <label for="password" class="form-label">Új jelszó</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Minimum 8 karakter">
                        @error('password')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Jelszó újra">
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.06);">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-admin-primary">
                    <i class="fas fa-save me-1"></i>Mentés
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-admin-secondary">Mégse</a>
            </div>
        </form>
    </div>
</div>
@endsection
