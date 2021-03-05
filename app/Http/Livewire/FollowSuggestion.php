<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowSuggestion extends Component
{
    public $suggestion;

    public function render()
    {
        return view('livewire.follow-suggestion');
    }
}
