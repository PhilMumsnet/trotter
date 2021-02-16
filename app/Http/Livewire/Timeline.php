<?php

namespace App\Http\Livewire;

use App\Models\Trott;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Timeline extends Component
{
    public $trotts;

    protected $listeners = ['trottCreated' => 'updateTrotts'];

    public function mount()
    {
        $this->trotts = Trott::query()
            ->where('user_id', Auth::id())
            ->with('user')
            ->get()
        ;
    }

    public function updateTrotts()
    {
        $this->trotts = Trott::query()
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
