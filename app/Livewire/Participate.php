<?php

namespace App\Livewire;

use App\Models\Activity;
use Illuminate\View\View;
use Livewire\Component;

class Participate extends Component
{
    public bool $showModal = false;
    public bool $participates = false;
    public Activity $activity;
    public string $comment = '';

    public function participate(): void
    {
        auth()->user()->participate($this->activity, $this->comment);
        $this->toggleShow();
        $this->participates = true;
    }

    public function toggleShow(): void
    {
        if ($this->participates) {
            $this->resign();
        } else {
            $this->showModal = !$this->showModal;
        }
    }

    public function resign(): void
    {
        auth()->user()->resign($this->activity);
        $this->participates = false;
    }

    public function render(): View
    {
        return view('livewire.participate');
    }

    public function mount(): void
    {
        $this->participates = auth()->user()->isParticipating($this->activity);
    }
}
