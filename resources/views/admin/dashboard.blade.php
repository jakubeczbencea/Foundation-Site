@extends('admin.layouts.app')

@section('title', 'Vezérlőpult - Admin')

@section('content')
<div class="page-header">
    <h2>Vezérlőpult</h2>
    <p>Üdvözöljük, {{ auth()->user()->name }}!</p>
</div>

<!-- Statisztika kártyák -->
<div class="row g-4 mb-4">
    <div class="col-md-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background: rgba(25, 135, 84, 0.15); color: #198754;">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
            <p class="stat-value">{{ number_format($stats['total_donations'], 0, ',', ' ') }} Ft</p>
            <p class="stat-label">Összes adomány</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background: rgba(78, 123, 255, 0.15); color: #4e7bff;">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>
            <p class="stat-value">{{ number_format($stats['this_month'], 0, ',', ' ') }} Ft</p>
            <p class="stat-label">Havi bevétel</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background: rgba(255, 193, 7, 0.15); color: #ffc107;">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <p class="stat-value">{{ $stats['pending_count'] }}</p>
            <p class="stat-label">Függőben lévő</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon" style="background: rgba(220, 53, 69, 0.15); color: #dc3545;">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
            <p class="stat-value">{{ $stats['published_news'] }} / {{ $stats['news_count'] }}</p>
            <p class="stat-label">Publikált / Összes bejegyzés</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Havi grafikon -->
    <div class="col-lg-8">
        <div class="chart-container">
            <h6 class="fw-bold mb-3">Adományok az elmúlt 6 hónapban</h6>
            <canvas id="donationChart" height="200"></canvas>
        </div>
    </div>

    <!-- Gyors infó -->
    <div class="col-lg-4">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <h5><i class="fas fa-info-circle me-2"></i>Összefoglaló</h5>
            </div>
            <div class="admin-card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Sikeres adományok</span>
                    <span class="fw-bold">{{ $stats['donations_count'] }} db</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Bejegyzések</span>
                    <span class="fw-bold">{{ $stats['news_count'] }} db</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Adminisztrátorok</span>
                    <span class="fw-bold">{{ $stats['users_count'] }} fő</span>
                </div>
                <hr style="border-color: rgba(255,255,255,0.06);">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-admin-primary btn-sm">
                        <i class="fas fa-hand-holding-heart me-1"></i>Adományok kezelése
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-admin-secondary btn-sm">
                        <i class="fas fa-plus me-1"></i>Új bejegyzés
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Legutóbbi adományok -->
<div class="row g-4 mt-2">
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-hand-holding-heart me-2"></i>Legutóbbi adományok</h5>
                <a href="{{ route('admin.donations.index') }}" class="btn btn-admin-secondary btn-sm">Összes</a>
            </div>
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th>Adományozó</th>
                            <th>Összeg</th>
                            <th>Státusz</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recent_donations as $donation)
                            <tr>
                                <td>{{ $donation->is_anonymous ? 'Anonim' : $donation->donor_name }}</td>
                                <td class="fw-bold">{{ number_format($donation->amount, 0, ',', ' ') }} Ft</td>
                                <td>
                                    <span class="badge badge-status-{{ $donation->status_color }}">
                                        {{ $donation->status_label }}
                                    </span>
                                </td>
                                <td class="text-muted">{{ $donation->created_at->format('Y.m.d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Még nincsenek adományok.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Legutóbbi bejegyzések -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-newspaper me-2"></i>Legutóbbi bejegyzések</h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-admin-secondary btn-sm">Összes</a>
            </div>
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th>Cím</th>
                            <th>Típus</th>
                            <th>Állapot</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recent_news as $item)
                            <tr>
                                <td>{{ Str::limit($item->title, 35) }}</td>
                                <td>
                                    <span class="badge {{ $item->type === 'news' ? 'bg-info' : 'bg-secondary' }}">
                                        {{ $item->type_label }}
                                    </span>
                                </td>
                                <td>
                                    @if ($item->is_published)
                                        <span class="badge badge-status-success">Publikálva</span>
                                    @else
                                        <span class="badge badge-status-warning">Vázlat</span>
                                    @endif
                                </td>
                                <td class="text-muted">{{ $item->created_at->format('Y.m.d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Még nincsenek bejegyzések.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('donationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(collect($monthly)->pluck('month')) !!},
            datasets: [{
                label: 'Adományok (Ft)',
                data: {!! json_encode(collect($monthly)->pluck('total')) !!},
                backgroundColor: 'rgba(78, 123, 255, 0.3)',
                borderColor: '#4e7bff',
                borderWidth: 2,
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(255,255,255,0.04)' },
                    ticks: { color: '#8a8fa8' }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#8a8fa8' }
                }
            }
        }
    });
</script>
@endpush
