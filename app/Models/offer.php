<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class offer extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'accepted_at', 'rejected_at'];

    // establish relationship
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
    // establish relationship
    public function bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }

    public function scopeByMe(Builder $query): Builder
    {
        return $query->where('bidder_id', Auth::user()?->id);
    }
}
