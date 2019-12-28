<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos =\App\Promocion::whereNotIn('codigo', ['', '0000000000'])->get();
        return view('promociones', [
           'titulo' => 'Promociones',
           'promos' => $promos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
         $promocion = null;
         $accion = 'actualizar';
         if ($id == '0') {
             $id = '0000000000';
             $accion = 'nuevo';
         }

         $promocion = \App\Promocion::where('codigo' , $id)->first();
         $promocion->productos;

         //Validar el estado de la promo
         $estado = ( (strtotime($promocion->fecha_inicio)  <= strtotime(date('Y-m-d'))) and
                      strtotime($promocion->fecha_fin) >= strtotime(date('Y-m-d')) ) ? 1 : 0;
         $promocion->estado = $estado;

         $productos = \App\Producto::where('codigo', '<>', 'euDYCJQMId')->get();
         // dd($promocion);
         return view('register_promo', [
            'titulo'    => 'Registro de informacion de Promociones',
            'promocion' => $promocion,
            'productos' => $productos,
            'accion'    => $accion
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
       // dd($request->input());
        $promo = \App\Promocion::find($id);
        $promo->nombre = $request->input('nombre');
        $promo->fecha_inicio = $request->input('fecha_ini');
        $promo->fecha_fin = $request->input('fecha_fin');
        $promo->estado = ($request->input('estado'))? $request->input('estado') : 0;
        $promo->descuento = $request->input('descuento');
        $imagen = $request->file('imagen');
        if ($imagen) {
            $url = $imagen->store('promociones', 'public');
            if ($_SERVER['SERVER_NAME'] != '127.0.0.1') {
                $url = 'https://files.mundomaquillajecolombia.com/' . $url; 
            }
            else {
                $url = 'http://localhost:8000/storage/' . $url; 
            }
            $promo->imagen = $url;
        }        
        $promo->save();

        // Quitamos todos los productos de esta promo
        foreach ($promo->productos as $producto) {
           $producto->promocion_id = 1;
           $producto->save();
        }

        if ($request->input('productosPromo') !== null) {
           $productos = $request->input('productosPromo');
           foreach ($productos as $p) {
              $prod = \App\Producto::find($p);
              $prod->promocion_id =  $promo->id;
              $prod->save();
           }
        }

        $accion =  $request->input('accion');
        if ( $accion == 'nuevo' ) {
           $newCod =  $this->generateRandomString();
           $promo->codigo = $newCod;
           $promo->save();

           $newPromo = new \App\Promocion();
           $newPromo->codigo = '0000000000';
           $newPromo->save();
       }

       return redirect('promociones/editar/' . $promo->codigo)->with('status', 200);
    }

    private function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
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
}
