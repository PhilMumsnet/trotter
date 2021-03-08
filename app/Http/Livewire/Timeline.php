<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Timeline extends Component
{
    public $trotts;
    public $userId;

    protected $listeners = ['trottCreated' => 'updateTrotts'];

    public function mount()
    {
        $this->updateTrotts();
    }

    public function updateTrotts()
    {
        $this->trotts = User::find($this->userId)->timeline();
    }

    public function render()
    {
        return view('livewire.timeline');
    }
}
