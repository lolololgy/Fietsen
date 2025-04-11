<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KlantController extends Controller
{
    public function getCustomer($id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['message' => 'Klant niet gevonden'], 404);
        }
        return response()->json($customer);

    }
    public function getAllCustomer()
    {


    }


    public function showRegistrationForm()
    {
        return view('customerAuth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:klanten,Email',
            'password' => 'required|min:6|confirmed',
            'telefoon' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
            'adres' => 'required|string|max:255',
            'postcode' => ['required', 'regex:/^[1-9][0-9]{3}\s?[A-Z]{2}$/'],
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "Telefoon" => $request->telefoon,
            "Adres" => $request->adres,
            "Postcode" => $request->postcode,
        ]);

        return redirect('/login')->with('success', 'Registratie succesvol! log nu in.');
    }

    public function showLoginForm()
    {
        return view('customerAuth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customerAuth')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home');
        }

        return redirect('/login')->with('error', 'Ongeldige inloggegevens. Probeer het opnieuw.');
    }



    public function logout(Request $request)
    {
        Auth::guard('userAuth')->logout();
        Auth::guard('customerAuth')->logout();
        session()->flush();
        session()->regenerateToken();

        return redirect('/login')->with('success', 'Je bent uitgelogd.');
    }

    public function account()
    {
        if (!Auth::guard('customerAuth')->check()) {
            return redirect('/login');
        }

        $customer = Auth::guard('customerAuth')->user();  // Get the authenticated customer

        return view('account', compact('customer'));  // Pass the customer data to the view
    }


}
