<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    public $user;
    public $newPassword;

    public function rules()
    {
        return [
            'user.profile_introduction' => ['string', 'max:500'],
            'user.name' => [
                'required',
                'string',
                'min:4',
                'max:50',
                'regex:/^[a-zA-Z0-9_ ]+$/i',
                Rule::unique('users', 'name')->ignore($this->user),
            ],
            'user.username' => [
                'required',
                'string',
                'max:20',
                'alpha_dash',
                Rule::unique('users', 'username')->ignore($this->user),
            ],
            'user.email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
        ];
    }

    public function cancel()
    {
        $this->emit('profileEditCompleted');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();
        $this->emit('profileEditCompleted');

        redirect()->to(route('user', ['user' => $this->user->username]));
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
