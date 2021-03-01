<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TrottSummary extends Component
{
    public $trott;

    public function like()
    {
        $this->trott->isLikedBy(Auth::user()) ?
            $this->trott->clearLikeStatus() :
            $this->trott->like()
        ;

        $this->trott = Trott::with('user')->withLikes()->find($this->trott->id);
    }

    public function dislike()
    {
        $this->trott->isDislikedBy(Auth::user()) ?
            $this->trott->clearLikeStatus() :
            $this->trott->dislike()
        ;

        $this->trott = Trott::with('user')->withLikes()->find($this->trott->id);
    }

    public function render()
    {
        return view('livewire.trott-summary');
    }
}
