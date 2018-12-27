<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Molde extends Model
{
    protected $fillable = ['nombre', 'medidas', 'detalles'];

    public function productos(){    //marca + _id
        return $this->hasMany(Producto::class); //Un Ingrediente tiene una Marca
    }
}
