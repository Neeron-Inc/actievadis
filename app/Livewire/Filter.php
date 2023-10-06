<?php

namespace App\Livewire;

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
use Livewire\Component;

class Filter extends Component
{
    public Activity $activity;
    public bool $showModal = false;

    public bool $all = false;
    public bool $participating = false;

    public function mount()
    {
        $this->all = request()->input('all') == 'on';``
        $this->participating = request()->input('participating') == 'on';
    }

    public function toggleShow(): void
    {
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.filter');
    }
}
