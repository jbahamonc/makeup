<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'App\Producto_cliente');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
