<?php

namespace App\Http\Controllers;

use App\Models\Trott;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $trotts = Trott::query()
            ->where('user_id', Auth::id())
            ->with('user')
            ->get()
        ;

        return view('home', [
            'trotts' => $trotts,
        ]);
    }
}
