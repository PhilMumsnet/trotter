<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Timeline extends Component
{
    public $trotts;

    public function mount()
    {
        $trotts = Trott::query()
            ->where('user_id', Auth::id())
            ->with('user')
            ->get()
        ;
    }

    public function render()
    {
        return view('livewire.timeline');
    }
}
