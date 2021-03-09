<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserHeader extends Component
{
    public $user;
    public $editing = false;

    protected $listeners = [
        'followsUpdated' => '$refresh',
        'profileSaved' => 'refreshHeader',
        'profileEditCancelled' => 'refreshHeader',
    ];

    public function follow()
    {
        Auth::user()->toggleFollowStatus($this->user);
        $this->emit('followsUpdated');
    }

    public function editProfile()
    {
        $this->emitUp('editingProfile');
        $this->editing = true;
    }

    public function refreshHeader()
    {
        $this->user->refresh();
        $this->editing = false;
    }

    public function render()
    {
        return view('livewire.user-header');
    }
}
