<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showUserRegistrationForm()
    {
        return view('userAuth.userRegister');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/userLogin')->with('success', 'Registratie succesvol! log nu in.');
    }

    public function showUserLoginForm()
    {
        return view('userAuth.userLogin');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('userAuth')->attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect('/userLogin')->with('error', 'Ongeldige inloggegevens. Probeer het opnieuw.');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('userAuth')->logout();
        Auth::guard('customerAuth')->logout();
        session()->flush();
        session()->regenerateToken();

        return redirect('/userLogin')->with('success', 'Je bent uitgelogd.');
    }
}
