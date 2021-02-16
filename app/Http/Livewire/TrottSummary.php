<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TrottSummary extends Component
{
    public $trott;

    public function render()
    {
        return view('livewire.trott-summary');
    }
}
