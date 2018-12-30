<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    protected $fillable = ['nombre'];

    public function domicilios(){    //marca + _id
        return $this->hasMany(ComercioDomicilio::class);
    }

    public function telefonos(){    //marca + _id
        return $this->hasMany(ComercioTelefono::class);
    }
}
