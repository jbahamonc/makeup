<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
   public $timestamps = false;

   public function cliente()
   {
      return $this->belongsTo('App\User');
   }

   public function estadoPago()
   {
      return $this->belongsTo('App\Pago');
   }

   public function estadoEnvio()
   {
      return $this->belongsTo('App\Envio');
   }

   public function productos()
   {
        return $this->belongsToMany('App\Producto', 'detalle_pedido')->withPivot('cantidad');
   }
}
