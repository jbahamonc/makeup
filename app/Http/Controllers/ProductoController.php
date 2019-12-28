<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos = \App\Producto::all();
      foreach ($productos as $pro) {
         $pro->imagenes;
         $pro->promocion;
      }
      // return $productos;
      return view('home', [
         'titulo'    => 'Panel de Gestion de Productos',
         'productos' => $productos
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
      $producto = null;
      $accion = 'actualizar';
      if ($codigo == '0') {
          $codigo = 'euDYCJQMId';
          $accion = 'nuevo';
      }
      $producto = \App\Producto::where('codigo' , $codigo)->first(); // validar si no existe el producto
      $producto->imagenes;
      $producto->colores;
      $categorias = \App\Categoria::all();
      $subcategorias = \App\Subcategoria::where('categoria_id', $producto->categoria_id)->get();
      return view("register_product", [
        'producto' => $producto,
        'categorias' => $categorias,
        'subcategorias' => $subcategorias,
        'titulo' => 'Guardar informacion de  productos',
        'accion' => $accion
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
      //dd($request->input());
        $producto = \App\Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->referencia = $request->input('referencia');
        $producto->precio_normal = $request->input('precio');
        $producto->cantidad = $request->input('stock');
        $producto->categoria_id = $request->input('categoria');
        $producto->subcategoria_id = $request->input('subcategoria');
        $producto->save();

        $nameColorArr = $request->input('color');
        $imgArr = $request->input('imgColor');
        $colorArr = $request->input('codigoColor');
        $opeArr = $request->input('ope');
        $idColorArr = $request->input('idColor');
        for ($i = 0; $i < sizeof($colorArr); $i++) {
           if ($opeArr[$i] == 'insert') {
             $col = new \App\Presentacion();
           } else {
             $col = \App\Presentacion::find($idColorArr[$i]);
           }
           $col->nombre =  $nameColorArr[$i];
           $col->imagen = $imgArr[$i];
           $col->color = $colorArr[$i];
           $col->producto_id = $id;
           $col->save();
        }

        $accion =  $request->input('accion');
        if ( $accion == 'nuevo' ) {
          $newId =  $this->generateRandomString();
          $producto->codigo = $newId;
          $producto->save();

          $newPro = new \App\Producto();
          $newPro->codigo = 'euDYCJQMId';
          $newPro->save();
        }

        return redirect('productos/editar/' . $producto->codigo)->with('status', 200);
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

    }

    public function uploadImg (Request $req) {
        $files = $req->file('file');
        $cod = $req->input('codigo');
        $url = $files->store('productos', 'public');
        $imagen = new \App\Imagen();
        if ($_SERVER['SERVER_NAME'] != '127.0.0.1') {
            $url = 'https://files.mundomaquillajecolombia.com/' . $url; 
        }
        else {
            $url = 'http://localhost:8000/storage/' . $url; 
        }
        $imagen->url = $url;
        $imagen->producto_id = $cod;
        $imagen->save();

        $arr = [
            'message'   => 'Image saved Successfully',
            'imagen'    => $url,
            'codigo'    => $cod,
            'id'        => $imagen->id
        ];
        return response()->json($arr, 200);
    }
}
