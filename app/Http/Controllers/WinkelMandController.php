<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use Illuminate\Http\Request;

class WinkelMandController extends Controller
{


    public function addToCart(Request $request)
    {
        // Haal invoerwaarden uit het formulier
        $id = $request->input('id');
        $hoeveelheid = $request->input('hoeveelheid', 1); // standaardwaarde = 1
        $type = $request->input('type', 'fiets');

        // Vind het product op basis van type
        if ($type == "fiets") {
            $product = Fiets::where('FietsId', $id)->first();
        } elseif ($type == "accessoire") {
            $product = Accessoire::where('id', $id)->first();
        } else {
            return response()->json(['error' => 'Ongeldig producttype.']);
        }

        // Controleer of het product bestaat
        if (!$product) {
            return response()->json(['error' => 'Product niet gevonden.']);
        }

        // Zorg ervoor dat je de juiste kolomnamen gebruikt
        $productData = [
            "id" => $product->FietsId ?? $product->id,  // Use 'FietsId' for 'Fiets', 'id' for 'Accessoire'
            "naam" => $product->Naam ?? $product->naam,  // Match your model column names exactly
            "prijs" => $product->Prijs ?? $product->prijs,
            "hoeveelheid" => $hoeveelheid,
            "type" => $type,
            "imageUrl" => $product->imageUrl ?? null
        ];

        // Haal huidige winkelmand uit sessie
        $cart = session()->get('winkelmand', []);

        // Voeg toe of update hoeveelheid indien product bestaat
        $key = $type . '_' . $productData['id'];

        if (isset($cart[$key])) {
            $cart[$key]['hoeveelheid'] += $hoeveelheid;
        } else {
            $cart[$key] = $productData;
        }

        // Bewaar winkelmand in sessie
        session()->put('winkelmand', $cart);

        return response()->json(['success' => 'Product toegevoegd aan winkelmand.']);
    }


    public function showCart()
    {
        $cart = session()->get('winkelmand', []);
        return view('cart', compact('cart'));
    }

    public function getCartItems()
    {
        $cart = session()->get('winkelmand', []);

        return response()->json([
            'success' => true,
            'items' => $cart
        ]);
    }

    public function checkout()
    {
        $cart = session()->get('winkelmand', []);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Je winkelmand is leeg.']);
        }n

        $KlantId = auth()->id() ?? null; // Assuming you have user authentication
        $Datum = Carbon::now(); // Capture the current date

        foreach ($cart as $item) {
            // Separate fiets and accessoire orders
            if ($item['type'] === 'fiets') {
                Order::create([
                    'KlantId' => $KlantId,
                    'FietsId' => $item['id'],
                    'AccessoireId' => null,
                    'Datum' => $Datum,
                ]);
            } elseif ($item['type'] === 'accessoire') {
                Order::create([
                    'KlantId' => $KlantId,
                    'FietsId' => null,
                    'AccessoireId' => $item['id'],
                    'Datum' => $Datum,
                ]);
            }
        }

        // Clear the cart from session
        session()->forget('winkelmand');

        return response()->json(['success' => true, 'message' => 'Bestelling succesvol geplaatst!']);
    }

    public function removeItem(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');

        // Retrieve the current cart from the session
        $cart = session()->get('winkelmand', []);

        // Create the key used to identify the item in the session
        $key = $type . '_' . $id;

        if (isset($cart[$key])) {
            unset($cart[$key]); // Remove the item from the cart array
            session()->put('winkelmand', $cart); // Save the updated cart back to the session
        }

        return response()->json(['success' => true, 'message' => 'Product verwijderd.']);
    }


}
