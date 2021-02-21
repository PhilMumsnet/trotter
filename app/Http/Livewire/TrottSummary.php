<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TrottSummary extends Component
{
    public $trott;

    public function like()
    {
        $this->trott->like();
    }

    public function dislike()
    {
        $this->trott->dislike();
    }

    public function render()
    {
        return view('livewire.trott-summary');
    }
}
