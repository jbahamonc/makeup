<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = \App\Pedido::all();
        foreach ($pedidos as $ped) {
           $ped->cliente;
           $ped->estadoPago;
           $ped->estadoEnvio;
        }
        // return $pedidos;
        return view('pedidos', [
           'titulo' => 'Ordenes de Pedido',
           'pedidos' => $pedidos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = \App\Pedido::where('num_orden', $id)->first();
        $pedido->cliente->datos_envio;
        $pedido->estadoPago;
        $pedido->estadoEnvio;
        foreach($pedido->productos as $pro) {
           $pro->imagenes;
        }
        // return $pedido;
        return view('detalle_pedido', [
           'titulo' => 'Detalle del Pedido # ' . $id,
           'pedido'  => $pedido
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeEstate ($orden, $estado)
    {
         $pedido = \App\Pedido::find($orden);
         $pedido->estado_pago_id = $estado;
         $pedido->save();

         $estado = \App\Pago::find($estado);
         return $estado;
    }

    public function searchOrder($tipo, $id)
    {
         $pedidos = null;
         if ($tipo == "orden") {
            $pedidos = \App\Pedido::where('num_orden', $id)->get();
         }
         else if ($tipo == "pago") {
            $pedidos = \App\Pedido::where('estado_pago_id', $id)->get();
         }
         else if ($tipo == "envio") {
            $pedidos = \App\Pedido::where('estado_envio_id', $id)->get();
         }

         foreach ($pedidos as $p) {
            $p->cliente;
            $p->estadoPago;
            $p->estadoEnvio;
         }
         return $pedidos;
    }
}
