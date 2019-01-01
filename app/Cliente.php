<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'apellido', 'user_id'/*, 'confianza'*/];

    public function domicilios(){    //marca + _id
        return $this->hasMany(ComercioClienteDomicilio::class);
    }

    public function telefonos(){    //marca + _id
        return $this->hasMany(ComercioClienteTelefono::class);
    }

    public function pedidos(){    //marca + _id
        return $this->hasMany(Pedido::class);
    }

    public function user(){    //marca + _id
        return $this->belongsTo(User::class); //Un Ingrediente tiene una Unidad
    }
}
