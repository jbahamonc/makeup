<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $productos = \App\Producto::all();
      foreach ($productos as $pro) {
         $pro->imagenes;
         $pro->promocion;
      }
      return view('home', [
         'titulo'    => 'Panel de Gestion de Productos',
         'productos' => $productos
      ]);
    }
}
