<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function view()
    {
        $fietsen = Fiets::with('images')->take(3)->get();
        return view('home', compact('fietsen'));
    }
}
