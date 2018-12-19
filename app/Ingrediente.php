<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['nombre'];

    public function marca(){    //marca + _id
        return $this->belongsTo(Marca::class); //Un Ingrediente tiene una Marca
    }
}
