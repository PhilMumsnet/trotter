<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserMain extends Component
{
    public $user;
    public $editing = false;

    protected $listeners = [
        'editingProfile' => 'setEditing',
        'profileSaved' => 'setNotEditing',
    ];

    public function setEditing()
    {
        $this->editing = true;
    }

    public function setNotEditing()
    {
        $this->editing = false;
    }

    public function render()
    {
        return view('livewire.user-main');
    }
}
