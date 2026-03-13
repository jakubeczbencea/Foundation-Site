@extends('admin.layouts.app')

@section('title', 'Hírek és Beszámolók - Admin')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h2>Hírek és Beszámolók</h2>
        <p>Bejegyzések kezelése, létrehozása és szerkesztése</p>
    </div>
    <a href="{{ route('admin.news.create') }}" class="btn btn-admin-primary">
        <i class="fas fa-plus me-1"></i>Új bejegyzés
    </a>
</div>

<!-- Szűrők -->
<div class="filter-bar">
    <form method="GET" action="{{ route('admin.news.index') }}">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Keresés</label>
                <input type="text" name="search" class="form-control" placeholder="Cím keresése..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Típus</label>
                <select name="type" class="form-select">
                    <option value="">Mind</option>
                    <option value="news" {{ request('type') == 'news' ? 'selected' : '' }}>Hír</option>
                    <option value="report" {{ request('type') == 'report' ? 'selected' : '' }}>Beszámoló</option>
                </select>
            </div>
            <div class="col-md-5 d-flex gap-2">
                <button type="submit" class="btn btn-admin-primary">
                    <i class="fas fa-search me-1"></i>Szűrés
                </button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-admin-secondary">Törlés</a>
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
                    <th>Cím</th>
                    <th>Típus</th>
                    <th>Szerző</th>
                    <th>Állapot</th>
                    <th>Létrehozva</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr>
                        <td class="text-muted">{{ $item->id }}</td>
                        <td class="fw-semibold">
                            {{ Str::limit($item->title, 50) }}
                        </td>
                        <td>
                            <span class="badge {{ $item->type === 'news' ? 'bg-info' : 'bg-secondary' }}">
                                {{ $item->type_label }}
                            </span>
                        </td>
                        <td class="text-muted">{{ $item->author->name ?? '-' }}</td>
                        <td>
                            @if ($item->is_published)
                                <span class="badge badge-status-success">Publikálva</span>
                            @else
                                <span class="badge badge-status-warning">Vázlat</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $item->created_at->format('Y.m.d') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-admin-secondary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.news.destroy', $item) }}" class="d-inline"
                                      onsubmit="return confirm('Biztosan törlöd ezt a bejegyzést?')">
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
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="fas fa-newspaper"></i>
                                <p>Még nincsenek bejegyzések.</p>
                                <a href="{{ route('admin.news.create') }}" class="btn btn-admin-primary">
                                    <i class="fas fa-plus me-1"></i>Létrehozás
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($news->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $news->withQueryString()->links() }}
    </div>
@endif
@endsection
