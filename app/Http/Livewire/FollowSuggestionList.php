<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowSuggestionList extends Component
{
    public $suggestions;

    public function mount()
    {
        $this->suggestions = User::where('id', '!=', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.follow-suggestion-list');
    }
}
