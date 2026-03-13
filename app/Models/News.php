<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'type',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    // Automatikus slug generálás
    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Scope-ok
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }

    public function scopeReports($query)
    {
        return $query->where('type', 'report');
    }

    // Típus magyarul
    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'news' => 'Hír',
            'report' => 'Beszámoló',
            default => $this->type,
        };
    }
}
