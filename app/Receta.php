<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['producto_id', 'ingrediente_id', 'cantidad'];

    public function producto(){    //marca + _id
        return $this->belongsTo(Producto::class); //Un Ingrediente tiene una Marca
    }

    public function ingrediente(){    //marca + _id
        return $this->belongsTo(Ingrediente::class); //Un Ingrediente tiene una Unidad
    }
}
