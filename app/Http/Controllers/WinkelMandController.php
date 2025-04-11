<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WinkelMandController extends Controller
{


    public function addToCart(Request $request)
    {
        //add product to the cart
        $product = [
            "id" => $request->input('id'),
            "naam" => $request->input('naam'),
            "prijs" => $request->input('prijs'),
            "beschrijving" => $request->input('beschrijving'),
            "hoeveelheid" => $request->input("hoeveelheid",1),
            "imageUrl" => $request->input("imageUrl")
        ];

        //create session storage
        $cart = session()->get('winkelmand',[]);

        if(isset($cart[$product['id']])){
            $cart[$product['id']]['hoeveelheid'] += $product['hoeveelheid'];
        }else{
            $cart[$product['id']] = $product;
        }

        session()->put('winkelmand', $cart);

        return back()->with('success', 'Product toegevoegd aan winkelmand.');

    }
}
