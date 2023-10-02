<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'needs' => 'array',
    ];

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('start_date', '>', now());
    }

    public function scopeParticipating(Builder $query): Builder
    {
        return $query->whereHas('participants', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
    }
}
