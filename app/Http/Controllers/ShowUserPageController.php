<?php

namespace App\Http\Controllers;

use App\Models\User;

class ShowUserPageController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user', [
            'user' => $user,
        ]);
    }
}
