<?php

namespace App\Models;

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
        'start_date' => 'date'
    ];

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function is_participating(): bool
    {
        $user_id = auth()->user()->id;
        return $this->participants()->where('user_id', $user_id)->exists();
    }
}
