<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

   public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function productos()
    {
        return $this->hasMany('App\Producuto');
    }
}
