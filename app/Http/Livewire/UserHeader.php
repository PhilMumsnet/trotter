<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserHeader extends Component
{
    public $user;

    protected $listeners = ['userFollowed' => '$refresh'];

    public function follow()
    {
        Auth::user()->toggleFollowStatus($this->user);
        $this->emit('userFollowed');
    }

    public function render()
    {
        return view('livewire.user-header');
    }
}
