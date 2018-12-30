<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = ['ingrediente_id', 'comercio_id', 'precio', 'cantidad', 'vencimiento'];

    public function ingrediente(){    //marca + _id
        return $this->belongsTo(Ingrediente::class); //Un Ingrediente tiene una Marca
    }

    public function comercio(){    //marca + _id
        return $this->belongsTo(Comercio::class); //Un Ingrediente tiene una Unidad
    }
}
