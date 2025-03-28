<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FietsController extends Controller
{
//        return response()->json(['message' => 'SUCCESS'], 200);
//        return response()->json(['message' => 'ERROR'], 404);
    public function createBike()
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            return view('create-bike');
        } else {

            return redirect('/home');
        }
    }

    public function storeBike(Request $request)
    {
        $fiets = new Fiets();

        $fiets->naam = $request->input('Naam');
        $fiets->prijs = $request->input('Prijs');
        $fiets->voorraad = $request->input('Voorraad');
        $fiets->productcategorieën = $request->input('Productcategorieën');
        $fiets->merk = $request->input('Merk');
        $fiets->sn = $request->input('SN');
        $fiets->FrameMateriaal = $request->input('FrameMateriaal');
        $fiets->BatterijTypen = $request->input('BatterijTypen');
        $fiets->WielMaat = $request->input('WielMaat');
        $fiets->versnelling = $request->input('Versnelling');
        $fiets->KleurVarianten = $request->input('KleurVarianten');
        $fiets->GarantieInMaand = $request->input('GarantieInMaand');

        $fiets->save();

        return response()->json(['message' => 'Fiets is succesvol aangemaakt'], 200);
    }
}

