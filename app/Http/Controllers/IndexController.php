<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    function productoPromociones($id) {
        $promo = \App\Promocion::where('id', $id)->first();
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
            $pedido->estado = $req->input('estado');
            $pedido->total = 0;
            $pedido->save();

            $productos = $req->input('productos');
            //print_r($productos);
            for ($i=0; $i < sizeof($productos); $i++) { 
               $detPedido = new \App\Detalle_pedido();
               $detPedido->pedido_id = $pedido->id;
               $detPedido->producto_id = $productos[$i]['id'];
               $detPedido->cantidad = $productos[$i]['cantidad'];
               $detPedido->save();
               //echo $detPedido;
            }

         } catch (\Exception $e) {
            return response()->json(
                [
                    'mensaje' => 'Ocurrio un error al registrar el pedido',
                    'codeError' => 401,
                    'error' => $e->getMessage()
                ]
                , 401);
         }
         return response()->json(
            [
                "codeError" => 201,
                "mensaje"    => "El pedido ha sido registrado"
            ], 201
         );
    }

    private function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    // metodos para la app**************************************************************************************

    public function mostrarFavoritos(Request $req) {
        $user = $req->input('user_id');
        $token = $req->input('token');
        $usr = $this->validateUserByIdAndToken($user, $token);
        if ( $usr ) {
            $favoritos = \App\Producto_cliente::where('cliente_id', $user)->get();
            foreach($favoritos as $prod) {
                $prod->producto;
            }
            return $favoritos;
        }
        else {
            return response()->json(
                [
                    "codeError" => 401,
                    "mensaje"    => "El usuario no ha iniciado sesion"
                ], 401
            );
        }
    }

    private function validateUserByIdAndToken($user, $token) {
        $user = \App\User::find($user);
        if ($user and $user->api_token == $token) {
            return $user;
        }
        return null;
    }

    function guardarFavoritos (Request $req) {
        $user = $req->input('user_id');
        $token = $req->input('token');
        $usr = $this->validateUserByIdAndToken($user, $token);
        if ( $usr ) {
            $newFavorite = new  \App\Producto_cliente();
            $newFavorite->producto_id = $req->input('producto_id');
            $newFavorite->cliente_id = $usr->id;
            $newFavorite->estado = '1';

            $newFavorite->save();

            return response()->json(
                [
                    "codeError" => 201,
                    "mensaje"    => "El producto se ha guardado como favorito"
                ], 201
            );
        }
        else {
            return response()->json(
                [
                    "codeError" => 401,
                    "mensaje"    => "El usuario no ha iniciado sesion"
                ], 401
            );
        }
    }

    function login(Request $req) {
        
        if (!empty($req->input('email')) and !empty($req->input('password')) ) {

            $credentials = $req->only('email', 'password');
            if ( !Auth::attempt($credentials) ) {
                return response()->json(
                    [
                        'mensaje' => 'El usuario no se encuentra registrado en la base de datos',
                        'codeError' => 401
                    ]
                    , 401);
            }
            else {
                return $req->user();
            }
        }
        else {
            return response()->json(
                [
                    'mensaje'   => 'Por favor, ingrese el usuario y contraseña',
                    'codeError' => 401
                ]
                , 401);
        }
    }

    function registrarUserApp(Request $req) {
        if (!empty($req->input('email')) and 
            !empty($req->input('password')) and
            !empty($req->input('phone')) and
            !empty($req->input('name')) ) {

            if ( !filter_var($req->input('email'), FILTER_VALIDATE_EMAIL) ) {
                return response()->json(
                    [
                        'mensaje'   => 'Debe ingresar un correo electronico válido',
                        'codeError' => 401
                    ]
                    , 401);
            }

            $credentials = $req->only('email', 'password');
            if ( Auth::attempt($credentials) ) {
                return response()->json(
                    [
                        'mensaje'   => 'El usuario ya se encuentra registrado en la base de datos',
                        'codeError' => 200
                    ]
                    , 200);
            }
            else {
                $user = new \App\User();
                $user->name         = $req->input('name');
                $user->email        = $req->input('email');
                $user->password     = Hash::make($req->input('password'));
                $user->telefono     = $req->input('phone');
                $user->api_token    = $this->generateRandomString(60);
                $user->save();

                return response()->json($user);
            }
        }
        else {
            return response()->json(
                [
                    'mensaje'   => 'Por favor, ingrese todos los campos',
                    'codeError' => 401
                ]
                , 401);
        }
    }
}
