<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_name',
        'donor_email',
        'donor_phone',
        'amount',
        'currency',
        'payment_method',
        'status',
        'transaction_id',
        'message',
        'is_anonymous',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'is_anonymous' => 'boolean',
        ];
    }

    // Szűrők scope-ok
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', now()->year);
    }

    // Fizetési mód magyarul
    public function getPaymentMethodLabelAttribute(): string
    {
        return match ($this->payment_method) {
            'card' => 'Bankkártya',
            'transfer' => 'Átutalás',
            'cash' => 'Készpénz',
            'tax_percent' => 'Adó 1%',
            default => $this->payment_method,
        };
    }

    // Státusz magyarul
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Függőben',
            'completed' => 'Teljesítve',
            'failed' => 'Sikertelen',
            'refunded' => 'Visszatérítve',
            default => $this->status,
        };
    }

    // Státusz szín (Bootstrap badge)
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'completed' => 'success',
            'failed' => 'danger',
            'refunded' => 'secondary',
            default => 'light',
        };
    }
}
