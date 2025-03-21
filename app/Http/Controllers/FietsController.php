<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FietsController extends Controller
{
//        return response()->json(['message' => 'SUCCESS'], 200);
//        return response()->json(['message' => 'ERROR'], 404);
    public function overviewBike()
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            $fietsen = Fiets::all();
            return view('overview-bike', compact('fietsen'));
        } else {
            return redirect('/home');
        }
    }
//fiets logica
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

    public function updateBike($id)
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            $fiets = Fiets::where('FietsId', $id)->first();
            return view('update-bike', compact('fiets'));
        } else {
            return redirect('/home');
        }
    }

    public function updatingBike($id, Request $request)
    {
        $fiets = Fiets::where('FietsId', $id)->first();

        if (!$fiets) {
            return response()->json(['message' => 'Fiets niet gevonden'], 404);
        }

        $fiets->update($request->all());
        $fiets->save();

        return response()->json(['message' => 'Fiets is succesvol Bijgewerkt'], 200);
    }
}

