<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'KlantId',
        'FietsId',
        'AccessoireId',
        'Datum',
    ];
}
