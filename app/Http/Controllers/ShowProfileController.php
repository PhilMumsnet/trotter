<?php

namespace App\Http\Controllers;

use App\Models\User;

class ShowProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return view('profile', [
            'user' => $user,
        ]);
    }
}
