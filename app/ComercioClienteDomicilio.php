<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioClienteDomicilio extends Model
{
    protected $fillable = ['comercio_id', 'cliente_id', 'domicilio_id'];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class); //Un Ingrediente tiene una Marca
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); //Un Ingrediente tiene una Marca
    }

    public function domicilio()
    {
        return $this->belongsTo(Domicilio::class); //Un Ingrediente tiene una Marca
    }
}
