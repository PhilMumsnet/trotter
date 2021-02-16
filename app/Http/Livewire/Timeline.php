<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Timeline extends Component
{
    public $trotts;

    protected $listeners = ['trottCreated' => 'updateTrotts'];

    public function mount()
    {
        $this->updateTrotts();
    }

    public function updateTrotts()
    {
        $this->trotts = Auth::user()->timeline();
    }

    public function render()
    {
        return view('livewire.timeline');
    }
}
