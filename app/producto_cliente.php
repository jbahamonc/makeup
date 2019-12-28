<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_cliente extends Model
{

	protected $table = 'favoritos';

	public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function cliente()
    {
        return $this->belongsToMany('App\Cliente');
    }
}
