<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['nombre', 'marca_id', 'unidad_id', 'num_porcion', 'has_tacc', 'cod_barra', 'detalles'];

    public function marca(){    //marca + _id
        return $this->belongsTo(Marca::class); //Un Ingrediente tiene una Marca
    }

    public function unidad(){    //marca + _id
        return $this->belongsTo(Unidad::class); //Un Ingrediente tiene una Unidad
    }
}
