<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioClienteTelefono extends Model
{
    protected $fillable = ['comercio_id', 'cliente_id', 'telefono_id'];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class); //Un Ingrediente tiene una Marca
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); //Un Ingrediente tiene una Marca
    }

    public function telefono()
    {
        return $this->belongsTo(Telefono::class); //Un Ingrediente tiene una Marca
    }
}
