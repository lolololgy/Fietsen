<?php

namespace App\Http\Controllers;

use App\Models\Fiets;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FietsController extends Controller
{
//        return response()->json(['message' => 'SUCCESS'], 200);
//        return response()->json(['message' => 'ERROR'], 404);
    public function overviewBike()
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }

        if (Auth::user()->is_admin == 1) {
            $fietsen = Fiets::with('images')->get();
            return view('overview-bike', compact('fietsen'));
        } else {
            return redirect('/home');
        }
    }
//fiets logica
    public function createBike()
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }

        if (Auth::user()->is_admin == 1) {
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
        $fiets->Beschrijving = $request->input('Beschrijving');

        $fiets->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = time() . '_' . $image->getClientOriginalName();

                $image->move(storage_path('app/private/assets/fietsen'), $filename);

                Image::create([
                    'FietsId' => $fiets->FietsId,
                    'Src' => 'private/assets/fietsen/' . $filename,
                    'Positie' => $index + 1
                ]);
            }
        }


        return response()->json(['message' => 'Fiets is succesvol aangemaakt'], 200);
    }

    public function updateBike($id)
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }

        if (Auth::user()->is_admin == 1) {
            $fiets = Fiets::where('FietsId', $id)->first();
            $images = Image::where('FietsId', $id)->get();
            return view('update-bike', compact('fiets', 'images'));
        } else {
            return redirect('/home');
        }
    }

    public function updatingBike($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }
        if (Auth::user()->is_admin == 1) {
            $fiets = Fiets::where('FietsId', $id)->first();

            if (!$fiets) {
                return response()->json(['message' => 'Fiets niet gevonden'], 404);
            }

            // Update fietsgegevens
            $fiets->update($request->except('images'));

            // Afbeeldingen uploaden
            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('private/assets/fietsen');
                    $images[] = basename($path);
                }
                $fiets->images = json_encode($images);
            }

            $fiets->save();
            return response()->json(['message' => 'Fiets is succesvol bijgewerkt'], 200);
        } else {
            return redirect('/home');
        }
    }

    public function deleteBikeImage($id, $filename)
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }
        if (Auth::user()->is_admin == 1) {
            $fiets = Fiets::where('FietsId', $id)->first();

            if (!$fiets) {
                return response()->json(['message' => 'Fiets niet gevonden'], 404);
            }

            $images = json_decode($fiets->images, true);
            if (($key = array_search($filename, $images)) !== false) {
                unset($images[$key]);
                Storage::delete("private/assets/fietsen/{$filename}");
            }

            $fiets->images = json_encode(array_values($images));
            $fiets->save();

            return response()->json(['message' => 'Afbeelding verwijderd'], 200);
        } else {
            return redirect('/home');
        }
    }

    public function destroyBike($id)
    {
        if (!Auth::check()) {
            return redirect('/userLogin');
        }
        if (Auth::user()->is_admin == 1) {
            $fiets = Fiets::where('FietsId', $id)->first();

            if (!$fiets) {
                return response()->json(['message' => 'Fiets niet gevonden'], 404);
            }

            // Verwijder de fiets
            $fiets->delete();

            // Verwijder de bijbehorende afbeeldingen
            $images = Image::where('FietsId', $id)->get();
            foreach ($images as $image) {
                Storage::delete($image->Src);
                $image->delete();
            }

            return redirect()->back(200);
        } else {
            return redirect('/home');
        }
    }
    public function showWebshop()
    {
        $fietsen = Fiets::all();

        return view('webshop', compact('fietsen'));
    }
}

