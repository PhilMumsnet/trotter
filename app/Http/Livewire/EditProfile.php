<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditProfile extends Component
{
    public $user;

    public function rules()
    {
        return [
            'user.profile_introduction' => ['string', 'max:500'],
            'user.username' => ['required', 'string', 'max:20', 'alpha_num', function ($attribute, $value, $fail) {
                if ($value === User::find($this->user->id)->username || ! User::where('username', $value)->exists()) {
                    return;
                }

                $fail('Username is already taken');
            }],
        ];
    }

    public function cancel()
    {
        $this->emit('profileEditCancelled');
    }

    public function submit()
    {
        $this->validate();
        $this->user->save();

        $this->emit('profileSaved');

        redirect()->to(route('user', ['user' => $this->user->username]));
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
