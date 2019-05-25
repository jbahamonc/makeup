<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductoController@index');
Route::get('/productos/editar/{id}', 'ProductoController@edit');
Route::get('/categorias', 'CategoriaController@index');
Route::get('/promociones', 'PromocionController@index');
Route::get('/promociones/crear', 'PromocionController@create');
Route::get('/pedidos', 'PedidoController@index');
Route::post('/uploads', 'ProductoController@uploadImg');
Route::post('/productos/{id}', 'ProductoController@update')->name('updateProduct');
Route::delete('/productos/{id}', 'ProductoController@destroy');
Route::delete('/imagenes/{id}', 'ImagenController@destroy');

// Rutas de la api
Route::prefix('api/v1')->group(function () {
    Route::get('productos', 'IndexController@index'); // lista de productos
    Route::get('promociones', 'IndexController@promociones'); // listado de promociones
    Route::get('promociones/{id}', 'IndexController@productoPromociones'); // Productos por promociones
    Route::get('categorias', 'IndexController@categorias'); // Listado de categorias
    Route::get('productos/{id}', 'IndexController@detalleProducto'); // Detalle del producto
    Route::get('categoria_producto/{id}', 'IndexController@productosCategoria'); // Prodduccctos de una categoria
    Route::get('subcategorias', 'IndexController@subcategorias'); // Listado de subcategorias
    Route::get('subcategoria_productos/{id}', 'IndexController@productosSubcategoria'); // Producos por subcategorias
    Route::get('favoritos', 'IndexController@mostrarFavoritos'); // Listado de productos favoritos pendiente agregar middleware auth
});
