@extends('admin.layouts.app')

@section('title', 'Új bejegyzés - Admin')

@section('content')
<div class="page-header">
    <h2>Új bejegyzés létrehozása</h2>
    <p>Hír vagy beszámoló publikálása</p>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-4">
                        <label for="title" class="form-label">Cím</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title') }}" required placeholder="Bejegyzés címe...">
                        @error('title')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="excerpt" class="form-label">Rövid leírás</label>
                        <textarea name="excerpt" id="excerpt" class="form-control" rows="2"
                            placeholder="Rövid összefoglaló (max 500 karakter)...">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label">Tartalom</label>
                        <textarea name="body" id="body" class="form-control" rows="12"
                            required placeholder="Bejegyzés szövege...">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-4">
                        <label for="type" class="form-label">Típus</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>Hír</option>
                            <option value="report" {{ old('type') == 'report' ? 'selected' : '' }}>Beszámoló</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Kép</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Max 2MB, JPG/PNG formátum</div>
                        @error('image')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" id="is_published"
                                class="form-check-input" value="1" {{ old('is_published') ? 'checked' : '' }}>
                            <label for="is_published" class="form-check-label">Azonnali publikálás</label>
                        </div>
                        <div class="form-text text-muted">Ha kikapcsolt, vázlatként mentődik</div>
                    </div>
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
