<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioDomicilio extends Model
{
    protected $fillable = ['comercio_id', 'latitud', 'longitud', 'calle', 'numero', 'entre_calles'];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class); //Un Ingrediente tiene una Marca
    }
}
