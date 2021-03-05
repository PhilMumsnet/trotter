<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowingSummary extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.following-summary');
    }
}
