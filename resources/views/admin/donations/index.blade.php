@extends('admin.layouts.app')

@section('title', 'Adományok - Admin')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2>Adományok</h2>
        <p>Adományok listázása, szűrése és kezelése</p>
    </div>
</div>

<!-- Összesítés -->
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="stat-card">
            <p class="stat-value">{{ number_format($summary['total'], 0, ',', ' ') }} Ft</p>
            <p class="stat-label">Szűrt összeg ({{ $summary['count'] }} db adomány)</p>
        </div>
    </div>
</div>

<!-- Szűrők -->
<div class="filter-bar">
    <form method="GET" action="{{ route('admin.donations.index') }}">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Keresés</label>
                <input type="text" name="search" class="form-control" placeholder="Név vagy email..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Státusz</label>
                <select name="status" class="form-select">
                    <option value="">Mind</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Függőben</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Teljesítve</option>
                    <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Sikertelen</option>
                    <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>Visszatérítve</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Fizetési mód</label>
                <select name="payment_method" class="form-select">
                    <option value="">Mind</option>
                    <option value="card" {{ request('payment_method') == 'card' ? 'selected' : '' }}>Bankkártya</option>
                    <option value="transfer" {{ request('payment_method') == 'transfer' ? 'selected' : '' }}>Átutalás</option>
                    <option value="cash" {{ request('payment_method') == 'cash' ? 'selected' : '' }}>Készpénz</option>
                    <option value="tax_percent" {{ request('payment_method') == 'tax_percent' ? 'selected' : '' }}>Adó 1%</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Hónap</label>
                <input type="month" name="month" class="form-control" value="{{ request('month') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-admin-primary">
                    <i class="fas fa-search me-1"></i>Szűrés
                </button>
                <a href="{{ route('admin.donations.index') }}" class="btn btn-admin-secondary">
                    <i class="fas fa-times me-1"></i>Törlés
                </a>
            </div>
        </div>
    </form>
</div>

<!-- Táblázat -->
<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Adományozó</th>
                    <th>Email</th>
                    <th>Összeg</th>
                    <th>Mód</th>
                    <th>Státusz</th>
                    <th>Dátum</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donations as $donation)
                    <tr>
                        <td class="text-muted">{{ $donation->id }}</td>
                        <td class="fw-semibold">
                            {{ $donation->is_anonymous ? 'Anonim' : $donation->donor_name }}
                        </td>
                        <td class="text-muted">{{ $donation->donor_email ?? '-' }}</td>
                        <td class="fw-bold text-success">
                            {{ number_format($donation->amount, 0, ',', ' ') }} Ft
                        </td>
                        <td>{{ $donation->payment_method_label }}</td>
                        <td>
                            <span class="badge badge-status-{{ $donation->status_color }}">
                                {{ $donation->status_label }}
                            </span>
                        </td>
                        <td class="text-muted">{{ $donation->created_at->format('Y.m.d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- Státusz módosítás -->
                                <form method="POST" action="{{ route('admin.donations.status', $donation) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" style="width: auto; font-size: 0.75rem;"
                                            onchange="this.form.submit()">
                                        <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>Függőben</option>
                                        <option value="completed" {{ $donation->status == 'completed' ? 'selected' : '' }}>Teljesítve</option>
                                        <option value="failed" {{ $donation->status == 'failed' ? 'selected' : '' }}>Sikertelen</option>
                                        <option value="refunded" {{ $donation->status == 'refunded' ? 'selected' : '' }}>Visszatérítve</option>
                                    </select>
                                </form>

                                <!-- Törlés -->
                                <form method="POST" action="{{ route('admin.donations.destroy', $donation) }}" class="d-inline"
                                      onsubmit="return confirm('Biztosan törlöd ezt az adományt?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-admin-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="fas fa-hand-holding-heart"></i>
                                <p>Még nincsenek adományok a szűrési feltételeknek megfelelően.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Lapozás -->
@if ($donations->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $donations->withQueryString()->links() }}
    </div>
@endif
@endsection
