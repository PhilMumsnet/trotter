<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowingSummary extends Component
{
    public $user;

    public function unfollow()
    {
        User::find(Auth::id())->unfollow($this->user);
        $this->emit('followsUpdated');
    }

    public function render()
    {
        return view('livewire.following-summary');
    }
}
