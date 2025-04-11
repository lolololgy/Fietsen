<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessoire extends Model
{
    protected $table = 'accessoires';

    protected $fillable = [
        'Naam',
        'Prijs',
        'Beschrijving',
    ];
}
