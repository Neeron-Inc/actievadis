<?php

namespace App\Livewire;

use App\Models\Activity;
use App\Models\Participant;
use Illuminate\View\View;
use Livewire\Component;

class ParticipantComments extends Component
{
    public bool $showModal = false;
    public Activity $activity;

    public function toggleShow(): void
    {
        $this->showModal = !$this->showModal;
    }

    public function render(): View
    {
        $activityId = $this->activity->id;

        $participants = Participant::with('user')
            ->where('activity_id', $activityId)
            ->get();

        return view('livewire.participant-comments', compact('participants'));
    }
}
