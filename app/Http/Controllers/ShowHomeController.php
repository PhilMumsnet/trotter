<?php

namespace App\Http\Controllers;

class ShowHomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'title' => 'Home',
        ]);
    }
}
