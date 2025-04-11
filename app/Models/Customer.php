<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'klanten';
    protected $primaryKey = 'KlantId';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'password',
        'Telefoon',
        'Adres',
        'Postcode',
        'Rechten',
    ];

    protected $attributes = [
        'Rechten' => 'klant',
    ];

    public $timestamps = true;
}


