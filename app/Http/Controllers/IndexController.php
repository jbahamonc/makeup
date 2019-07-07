<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = \App\Producto::all();
        foreach ($productos as $prod) {
            $prod->imagenes;
            $prod->promocion;
        }
        return $productos;
    }

    public function promociones()
    {
        $promociones = \App\Promocion::where('estado', 1)->get();
        return $promociones;
    }

    public function categorias()
    {
        $categorias = \App\Categoria::all();
        return $categorias;
    }

    public function detalleProducto($id) {
        $producto = \App\Producto::find($id);
        if ($producto) {
            $producto->imagenes;
            $producto->colores;
            $producto->promociones;
            return $producto;
        }
        return new \App\Producto;
    }

    public function productosCategoria($id) {
        $productos = \App\Producto::where('categoria_id', $id)->get();
        foreach ($productos as $prod) {
            $prod->imagenes;
            $prod->promocion;
        }

        return $productos;
    }

    public function subcategorias() {
        $subcategorias = \App\Subcategoria::all();
        return $subcategorias;
    }

    public function productosSubcategoria($id) {
        $productos = \App\Producto::where('subcategoria_id', $id)->get();
        foreach ($productos as $prod) {
            $prod->imagenes;
            $prod->promocion;
        }

        return $productos;
    }

    public function mostrarFavoritos() {
        if ( !Auth::check() ) {
            $favoritos = \App\Producto_cliente::where('cliente_id', Auth::id())->get();
            foreach($favoritos as $prod) {
                $prod->productos;
            }
            return $favoritos;
        }
        else {
            return response()->json([
                'status' => false,
                'error' => 'El usuario no ha iniciado sesión'
            ]);
        }
    }

    function productoPromociones($id) {
        $promo = \App\promocion::where('id', $id)->first();
        $promo->productos;
        foreach ($promo->productos as $pro) {
           $pro->imagenes;
           $pro->promocion;
        }
        return $promo;
    }

    function subcategoriasPorCategoria($id) {
        $subcategorias = \App\Subcategoria::where('categoria_id', $id)->get();
        return $subcategorias;
    }

    // Funcion que guarda el pedido realizado por el cliente
    function guardarPedido (Request $req) {
         try {
            $pedido = new \App\Pedido();
            $pedido->num_orden = $this->generateRandomString();
            $pedido->cliente_id = $req->input('user_id');
            $pedido->total = 0;
            $pedido->save();

            $productos = $req->input('productos');
            // var_dump($productos);
            foreach ($productos as $pro) {
                // echo($pro['id']);
               $detPedido = new \App\Detalle_pedido();
               $detPedido->pedido_id = $pedido->id;
               $detPedido->producto_id = $pro->id;
               $detPedido->cantidad = $pro->cantidad;
               $detPedido->save();


            }

         } catch (\Exception $e) {
            return array(
               "status" => 500,
               "msg"    => "Lo sentimos!, ocurrrio un error en la aplicacion",
               "error"  => $e
            );
         }
         return array(
            "status" => 200,
            "msg"    => "El pedido ha sido registrado"
         );
    }

    private function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
