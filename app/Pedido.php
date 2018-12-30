<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id', 'envio', 'fecha', 'hora', 'pagado', 'senia'];

    public function cliente(){
        return $this->belongsTo(Cliente::class); //Un Ingrediente tiene una Marca
    }

    public function productos(){    //marca + _id
        return $this->hasMany(ProductosPedido::class);
    }
}
