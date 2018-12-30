<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioTelefono extends Model
{
    protected $fillable = ['comercio_id', 'telefono'];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class); //Un Ingrediente tiene una Marca
    }
}
