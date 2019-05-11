<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = "Promociones";

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
