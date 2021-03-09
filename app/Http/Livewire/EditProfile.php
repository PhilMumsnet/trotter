<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $user;

    protected $rules = [
        'user.profile_introduction' => 'string|max:500',
    ];

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->emit('profileSaved');
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
