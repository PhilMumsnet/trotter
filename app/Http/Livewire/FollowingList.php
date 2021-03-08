<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowingList extends Component
{
    public $follows;

    protected $listeners = ['followsUpdated' => 'updateFollows'];

    public function mount()
    {
        $this->follows = Auth::user()->follows;
    }

    public function updateFollows()
    {
        $this->follows = Auth::user()->follows;
    }

    public function render()
    {
        return view('livewire.following-list');
    }
}
