<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }

    public function colores()
    {
        return $this->hasMany('App\Presentacion');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function promocion()
    {
        return $this->belongsTo('App\Promocion');
    }

    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }

    public function favoritos()
    {
        return $this->belongsTo('App\User');
    }
}
