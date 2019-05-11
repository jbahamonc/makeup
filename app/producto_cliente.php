<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_cliente extends Model
{
    public function producto()
    {
        return $this->bolongsTo('App\Producto');
    }

    public function cliente()
    {
        return $this->belongsToMany('App\Cliente');
    }
}
