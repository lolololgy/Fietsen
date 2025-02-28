<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view()
    {
        $userId = session('user_id');

        if ($userId) {
            $user = User::find($userId);
            return view('home', compact('user'));
        }

        return redirect('/login')->with('error', 'Log eerst in.');
    }
}
