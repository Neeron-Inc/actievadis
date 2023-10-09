<?php

namespace App\Livewire;

use App\Models\Activity;

use Illuminate\View\View;
use Livewire\Component;

class Softdelete extends Component
{
    public bool $showModal = false;
    public Activity $activity;

    public function toggleShow(): void
    {
        $this->showModal = !$this->showModal;
    } 
    
    public function render() : View
    {
        return view('livewire.softdelete');
    }
}
