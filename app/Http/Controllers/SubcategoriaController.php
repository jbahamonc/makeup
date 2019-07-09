<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $img = $request->file('img-subcat');
         $url = $img->store('subcategorias', 'public');
         $sub = new \App\Subcategoria();
         $sub->categoria_id = $request->input('categoria');
         $sub->nombre = $request->input('subcategoria');
         $sub->imagen = $url;
         $sub->save();

         return redirect('categorias')->with('msg', 'La nueva subcategoria ha sido creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sub = \App\Subcategoria::find($id);
         return response()->json($sub, 200);
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
         // dd($request->input());
           $sub = \App\Subcategoria::find($id);
           $sub->nombre = $request->input('subcategoria');
           $sub->categoria_id = $request->input('categoria');

           if ( $request->file() ) {
              $img = "";
              $imgOld = $request->input('old-img-sub');
              Storage::disk('public')->delete($imgOld);
              $img = $request->file('img-subcat');
              $sub->imagen = $img->store('subcategorias', 'public');
           }

           $sub->save();

           return redirect('categorias')->with('msg', 'La informacion ha sido actualizada');
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

    public function listarSub($id)
    {
      $subs = \App\Subcategoria::where('categoria_id', $id)->get();
      return response()->json($subs, 200);
   }
}
