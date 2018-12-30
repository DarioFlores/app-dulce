<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosPedido extends Model
{
    protected $fillable = ['pedido_id', 'producto_id', 'cantidad', 'precio'];

    public function pedido(){
        return $this->belongsTo(Pedido::class); //Un Ingrediente tiene una Marca
    }

    public function producto(){
        return $this->belongsTo(Producto::class); //Un Ingrediente tiene una Marca
    }
}
