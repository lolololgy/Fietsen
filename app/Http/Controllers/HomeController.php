<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        if ($user) {
            return view('home', compact('user'));
        }

        return redirect('/login')->with('error', 'Log eerst in.');
    }
}
