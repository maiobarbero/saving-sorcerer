<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'description',
        'date',
        'bank_account'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bank_account(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['search'] ?? false,
            fn($query, $value) => $query->where('description', 'like', "%{$value}%")
        )->when(
                $filters['category'] ?? false,
                fn($query, $value) => $query->where('category_id', $value)
            )->when(
                $filters['dateFrom'] ?? false,
                fn($query, $value) => $query->where('date', '>=', $value)
            )->when(
                $filters['dateto'] ?? false,
                fn($query, $value) => $query->where('date', '<=', $value)
            )->when(
                $filters['bank'] ?? false,
                fn($query,$value) => $query->where('bank_account_id', $value)
            );
    }
}