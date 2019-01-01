<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = ['telefono', 'tipo'];

    public function comercio_cliente(){    //marca + _id
        return $this->hasMany(ComercioClienteTelefono::class);
    }
}
