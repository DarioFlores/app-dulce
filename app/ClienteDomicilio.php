<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDomicilio extends Model
{
    protected $fillable = ['cliente_id', 'latitud', 'longitud', 'calle', 'numero', 'entre_calles'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); //Un Ingrediente tiene una Marca
    }
}
