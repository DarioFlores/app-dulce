<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $fillable = ['nombre', 'simbolo'];

    public function ingredientes(){    //marca + _id
        return $this->hasMany(Ingrediente::class); //Un Ingrediente tiene una Marca
    }
}
