<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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

        $this->emit('trottCreated');
    }

    public function render()
    {
        return view('livewire.new-trott-form');
    }
}
