<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fiets extends Model
{
    protected $table = 'fietsen';

    protected $fillable = [
        'Naam',
        'Prijs',
        'Voorraad',
        'Productcategorieën',
        'Merk',
        'SN',
        'FrameMateriaal',
        'BatterijTypen',
        'WielMaat',
        'Versnelling',
        'KleurVarianten',
        'GarantieInMaand',
    ];
}
