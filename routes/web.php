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
Route::get('/categorias/{id}', 'CategoriaController@show');
Route::post('/categorias', 'CategoriaController@store');
Route::post('/categorias/{id}', 'CategoriaController@update');
Route::get('/promociones', 'PromocionController@index');
Route::get('/promociones/editar/{id}', 'PromocionController@edit');
Route::post('/promociones/{id}', 'PromocionController@update');
Route::get('/pedidos', 'PedidoController@index');
Route::get('/pedidos/{id}', 'PedidoController@edit');
Route::post('/uploads', 'ProductoController@uploadImg');
Route::post('/productos/{id}', 'ProductoController@update')->name('updateProduct');
Route::delete('/productos/{id}', 'ProductoController@destroy');
Route::delete('/imagenes/{id}', 'ImagenController@destroy');
Route::delete('/colores/{id}', 'PresentacionController@destroy');
Route::post('/colores/{id}', 'PresentacionController@update');
Route::get('/subcategorias/{id}', 'SubcategoriaController@listarSub');
Route::get('/subcategorias/edit/{id}', 'SubcategoriaController@edit');
Route::post('/subcategorias', 'SubcategoriaController@store');
Route::post('/subcategorias/{id}', 'SubcategoriaController@update');
Route::post('/estado-pedido/{orden}/{estado}', 'PedidoController@changeEstate');
Route::get('/buscar-orden/{tipo}/{id}', 'PedidoController@searchOrder');

// Rutas de la api
Route::prefix('api/v1')->group(function () {
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
