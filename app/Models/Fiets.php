<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fiets extends Model
{
    protected $table = 'fietsen';
    protected $primaryKey = 'FietsId';
    protected $fillable = [
        'Naam',
        'Prijs',
        'Beschrijving',
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

    public function images()
    {
        return $this->hasMany(Image::class, 'FietsId', 'FietsId');
    }

}
