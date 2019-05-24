<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
