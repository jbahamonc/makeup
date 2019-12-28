<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de la api
/*Route::prefix('api/v1')->group(function () {
    Route::get('productos', 'IndexController@index'); // lista de productos
    Route::get('promociones', 'IndexController@promociones'); // listado de promociones
    Route::get('promociones/{id}', 'IndexController@productoPromociones'); // Productos por promociones
    Route::get('categorias', 'IndexController@categorias'); // Listado de categorias
    Route::get('productos/{id}', 'IndexController@detalleProducto'); // Detalle del producto
    Route::get('categoria_producto/{id}', 'IndexController@productosCategoria'); // Productos de una categoria
    Route::get('subcategorias', 'IndexController@subcategorias'); // Listado de subcategorias
    Route::get('subcategoria_productos/{id}', 'IndexController@productosSubcategoria'); // Producos por subcategorias
    Route::get('favoritos', 'IndexController@mostrarFavoritos'); // Listado de productos favoritos pendiente agregar middleware auth
    Route::get('categorias/{id}', 'IndexController@subcategoriasPorCategoria'); // Listado de subcategorias por categoria
    Route::post('pedido', 'IndexController@guardarPedido'); // Guarda el pedido realizado por el cliente
});
*/