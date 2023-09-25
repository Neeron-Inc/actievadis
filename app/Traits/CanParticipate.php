<?php

namespace App\Traits;

use App\Models\Activity;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CanParticipate
{
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function activities(): Collection
    {
        return $this->participants->map(function ($participant) {
            return $participant->activity;
        });
    }

    public function participate(Activity $activity, string $comment = null): Participant
    {
        return $this->participants()->create([
            'activity_id' => $activity->id,
            'comment' => $comment,
        ]);
    }

    public function resign(Activity $activity): void
    {
        $this->participants()->where('activity_id', $activity->id)->delete();
    }
}
