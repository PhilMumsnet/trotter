<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowSuggestionList extends Component
{
    public $suggestions;

    protected $listeners = ['followsUpdated' => 'updateSuggestions'];

    public function mount()
    {
        $this->updateSuggestions();
    }

    public function updateSuggestions()
    {
        $this->suggestions = User::where('id', '!=', Auth::id())
            ->whereNotIn('id', Auth::user()->follows->pluck('id'))
            ->get()
        ;
    }

    public function render()
    {
        return view('livewire.follow-suggestion-list');
    }
}
