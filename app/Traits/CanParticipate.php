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
        return $this->hasMany(Participant::class)
            ->with('activity');
    }

    public function activities(): Collection
    {
        return $this->participants->map(function ($participant) {
            return $participant->activity;
        });
    }

    public function isParticipating(Activity $activity): bool
    {
        return $this->activities()->contains($activity);
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

    public function commentFor(Activity $activity): string
    {
        return $this->participants()->where('activity_id', $activity->id)->first()->comment ?? '';
    }
}
