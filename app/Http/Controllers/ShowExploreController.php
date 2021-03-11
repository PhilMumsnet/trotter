<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShowExploreController extends Controller
{
    public function __invoke()
    {
        return view('explore', [
            'title' => 'Explore',
            'users' => User::where('id', '!=', Auth::id())->get(),
        ]);
    }
}
