<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;

class TrottSummary extends Component
{
    public $trott;

    public function like()
    {
        $this->trott->like();
        $this->trott = Trott::with('user')->withLikes()->find($this->trott->id);
    }

    public function dislike()
    {
        $this->trott->dislike();
        $this->trott = Trott::with('user')->withLikes()->find($this->trott->id);
    }

    public function render()
    {
        return view('livewire.trott-summary');
    }
}
