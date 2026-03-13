@extends('admin.layouts.app')

@section('title', 'Bejegyzés szerkesztése - Admin')

@section('content')
<div class="page-header">
    <h2>Bejegyzés szerkesztése</h2>
    <p>{{ $news->title }}</p>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-4">
                        <label for="title" class="form-label">Cím</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $news->title) }}" required>
                        @error('title')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="excerpt" class="form-label">Rövid leírás</label>
                        <textarea name="excerpt" id="excerpt" class="form-control" rows="2">{{ old('excerpt', $news->excerpt) }}</textarea>
                        @error('excerpt')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label">Tartalom</label>
                        <textarea name="body" id="body" class="form-control" rows="12"
                            required>{{ old('body', $news->body) }}</textarea>
                        @error('body')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-4">
                        <label for="type" class="form-label">Típus</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="news" {{ old('type', $news->type) == 'news' ? 'selected' : '' }}>Hír</option>
                            <option value="report" {{ old('type', $news->type) == 'report' ? 'selected' : '' }}>Beszámoló</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Kép</label>
                        @if ($news->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded" alt="Jelenlegi kép"
                                     style="max-height: 150px;">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Hagyd üresen, ha nem akarod cserélni</div>
                        @error('image')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" id="is_published"
                                class="form-check-input" value="1"
                                {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                            <label for="is_published" class="form-check-label">Publikálva</label>
                        </div>
                    </div>

                    @if ($news->published_at)
                        <div class="mb-4">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Publikálva: {{ $news->published_at->format('Y.m.d H:i') }}
                            </small>
                        </div>
                    @endif
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.06);">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-admin-primary">
                    <i class="fas fa-save me-1"></i>Mentés
                </button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-admin-secondary">Mégse</a>
            </div>
        </form>
    </div>
</div>
@endsection
