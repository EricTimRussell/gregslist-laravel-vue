<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price'];

    protected $sortable = ['price', 'created_at'];

    // establish relationship
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            // foreign key
            'by_user_id'
        );
    }

    // establish relationship
    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    // establish relationship
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'listing_id');
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->latest('created_at');
    }


    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            // ?? false is the default value if no value is present
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value)
        )
            ->when(
                $filters['priceTo'] ?? false,
                fn ($query, $value) => $query->where('price', '<=', $value)
            )
            ->when(
                $filters['beds'] ?? false,
                fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
            )
            ->when(
                $filters['baths'] ?? false,
                fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
            )
            ->when(
                $filters['areaFrom'] ?? false,
                fn ($query, $value) => $query->where('area', '>=', $value)
            )
            ->when(
                $filters['areaTo'] ?? false,
                fn ($query, $value) => $query->where('area', '<=', $value)
            )->when(
                $filters['deleted'] ?? false,
                fn ($query, $value) => $query->withTrashed()
            )->when(
                $filters['by'] ?? false,
                fn ($query, $value) =>
                !in_array($value, $this->sortable) ? $query :
                    $query->orderBy($value, $filters['order'] ?? 'desc')
            );
    }
}
