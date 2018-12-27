<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'preparacion', 'peso', 'num_porcion', 'categoria_id', 'molde_id', 'descripcion'];

    public function molde(){    //marca + _id
        return $this->belongsTo(Molde::class); //Un Ingrediente tiene una Marca
    }

    public function categoria(){    //marca + _id
        return $this->belongsTo(Categoria::class); //Un Ingrediente tiene una Unidad
    }

    public function recetas(){    //marca + _id
        return $this->hasMany(Receta::class);

        //return Receta::where('producto_id', '=', $this->id)->get();
    }
}
