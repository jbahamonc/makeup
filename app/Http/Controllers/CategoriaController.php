<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = \App\Categoria::where('id', '<>', 1)->get();
        $subcategorias = \App\Subcategoria::where('id', '<>', 1)->get();
        foreach ($subcategorias as $sub) {
           $sub->categoria;
        }
        return view('categories', [
           'titulo'     => 'Gestion de categorias',
           'categorias' => $categorias,
           'subcategorias' => $subcategorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('img');
        $url = $img->store('categorias', 'public');
        $cat = new \App\Categoria();
        $cat->nombre = $request->input('categoria');
        if ($_SERVER['SERVER_NAME'] != '127.0.0.1') {
            $url = 'https://files.mundomaquillajecolombia.com/' . $url; 
        }
        else {
            $url = 'http://localhost:8000/storage/' . $url; 
        }
        $cat->imagen = $url;
        $cat->save();

        return redirect('categorias')->with('msg', 'La nueva categoria ha sido creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = \App\Categoria::find($id);
        return response()->json($cat, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cat = \App\Categoria::find($id);
        $cat->nombre = $request->input('categoria');

        if ( $request->file() ) {
           $img = "";
           $imgOld = $request->input('old-img');
           Storage::disk('public')->delete($imgOld);
           $img = $request->file('img');
           $url = $img->store('categorias', 'public');
           if ($_SERVER['SERVER_NAME'] != '127.0.0.1') {
                $url = 'https://files.mundomaquillajecolombia.com/' . $url; 
            }
            else {
                $url = 'http://localhost:8000/storage/' . $url;
            }
           $cat->imagen = $url;
        }

        $cat->save();

        return redirect('categorias')->with('msg', 'La nueva categoria ha sido creada');
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
