<?php

namespace App\Http\Controllers;

use App\Models\Trott;

class HomeController extends Controller
{
    public function index()
    {
        $trotts = Trott::query()
            ->where('user_id', auth()->user()->id)
            ->with('user')
            ->get()
        ;

        return view('home', [
            'trotts' => $trotts,
        ]);
    }
}
