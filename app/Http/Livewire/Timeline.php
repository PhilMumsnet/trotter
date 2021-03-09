<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Timeline extends Component
{
    public $trotts;
    public $user;

    protected $listeners = ['trottCreated' => 'updateTrotts'];

    public function mount()
    {
        $this->updateTrotts();
    }

    public function updateTrotts()
    {
        $this->trotts = $this->user->timeline();
    }

    public function render()
    {
        return view('livewire.timeline');
    }
}
