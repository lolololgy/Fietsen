<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FietsController extends Controller
{
    public function createBike()
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            return view('create-bike');
        } else {

            return redirect('/home');
        }
    }

    public function storeBike()
    {
        return "a";
    }
}
