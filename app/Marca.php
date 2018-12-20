<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre', 'calidad'];

    public function ingredientes(){    //marca + _id
        return $this->hasMany(Ingrediente::class); //Un Ingrediente tiene una Marca
    }
}
