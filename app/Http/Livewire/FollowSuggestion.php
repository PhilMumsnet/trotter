<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowSuggestion extends Component
{
    public $suggestion;

    public function follow()
    {
        User::find(Auth::id())->follow($this->suggestion);
        $this->emit('userFollowed');
    }

    public function render()
    {
        return view('livewire.follow-suggestion');
    }
}
