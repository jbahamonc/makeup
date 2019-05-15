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
        //$subcategorias = \App\Subcategoria::where('categoria_id', $id)->get();
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
        $promo = \App\promocion::where('id', $id)->get();
        foreach($promo as $p) {
            $p->productos;
        }

        return $promo;
    }
}
