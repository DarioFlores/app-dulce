<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteTelefono extends Model
{
    protected $fillable = ['cliente_id', 'telefono'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); //Un Ingrediente tiene una Marca
    }
}
