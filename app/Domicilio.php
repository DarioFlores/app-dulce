<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $fillable = ['latitud', 'longitud', 'calle', 'numero', 'entre_calles'];

    public function comercio_cliente(){    //marca + _id
        return $this->hasMany(ComercioClienteDomicilio::class);
    }
}
