<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NewTrottForm extends Component
{
    public $trottBody;

    public function submit()
    {
        $trott = new Trott([
            'user_id' => Auth::id(),
            'body' => $this->trottBody,
        ]);

        $trott->save();

        return redirect()->to(route('home'));
    }

    public function render()
    {
        return view('livewire.new-trott-form');
    }
}
