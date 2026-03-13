@extends('admin.layouts.app')

@section('title', 'Felhasználók - Admin')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h2>Felhasználók</h2>
        <p>Admin felhasználók kezelése és jogosultságok beállítása</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-admin-primary">
        <i class="fas fa-user-plus me-1"></i>Új felhasználó
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Jogosultság</th>
                    <th>Regisztráció</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-muted">{{ $user->id }}</td>
                        <td class="fw-semibold">
                            {{ $user->name }}
                            @if ($user->id === auth()->id())
                                <span class="badge bg-info ms-1">Te</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            @if ($user->role === 'superadmin')
                                <span class="badge bg-danger">Szuperadmin</span>
                            @else
                                <span class="badge bg-primary">Admin</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $user->created_at->format('Y.m.d') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-admin-secondary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline"
                                          onsubmit="return confirm('Biztosan törlöd {{ $user->name }} felhasználót?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-admin-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if ($users->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links() }}
    </div>
@endif
@endsection
