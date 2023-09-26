<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;

class Participate extends Component
{
    public Activity $activity;
    public bool $showModal = false;

    public function toggleShow(): void
    {
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.participate');
    }
}
