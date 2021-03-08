<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserHeader extends Component
{
    public $user;

    protected $listeners = ['followsUpdated' => '$refresh'];

    public function follow()
    {
        Auth::user()->toggleFollowStatus($this->user);
        $this->emit('followsUpdated');
    }

    public function render()
    {
        return view('livewire.user-header');
    }
}
