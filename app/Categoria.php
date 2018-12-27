<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    public function productos(){    //marca + _id
        return $this->hasMany(Producto::class); //Un Ingrediente tiene una Marca
    }
}
