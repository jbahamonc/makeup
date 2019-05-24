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
Route::delete('/imagenes/{id}', 'ImagenController@destroy');

// Rutas de la api
Route::prefix('api/v1')->group(function () {
    Route::get('productos', 'IndexController@index');
    Route::get('promociones', 'IndexController@promociones');
    Route::get('promociones/{id}', 'IndexController@productoPromociones');
    Route::get('categorias', 'IndexController@categorias');
    Route::get('productos/{id}', 'IndexController@detalleProducto');
    Route::get('categoria_producto/{id}', 'IndexController@productosCategoria');
    Route::get('subcategorias', 'IndexController@subcategorias');
    Route::get('subcategoria_productos/{id}', 'IndexController@productosSubcategoria');
    Route::get('favoritos', 'IndexController@mostrarFavoritos'); // pendiente agregar middleware auth
});
