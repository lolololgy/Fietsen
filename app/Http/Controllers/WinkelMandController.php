<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use Illuminate\Http\Request;

class WinkelMandController extends Controller
{


    public function addToCart(Request $request)
    {
        //add product to the cart
        $id = $request->input('id');
        $hoeveelheid = $request->input('hoeveelheid', 1); // standaardwaarde is 1
        $type = $request->input('type','fiets');

        $product =null;
        if($type == "fiets"){

            $product = Fiets::find($id);
        }

        // Controleer of product bestaat
        if(!$product){
            return back()->with('error', 'Product niet gevonden.');
        }

        // Bouw array met benodigde productinformatie
        $productData = [
            "id"=>$product->id,
            ''



            ]
            // Haal huidige cart uit sessie
            $cart = session()->get('winkelmand', []);

        if(isset($cart[$id])){
            // Als het product al in de winkelwagen zit, verhoog de hoeveelheid
            $cart[$id]['hoeveelheid'] += $hoeveelheid;
        } else {
            // Voeg nieuw product toe aan cart
            $cart[$id] = $productData;
        }

        session()->put('winkelmand', $cart);

        return back()->with('success', 'Product toegevoegd aan winkelmand.');

    }
}
