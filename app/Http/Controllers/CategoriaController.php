<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_categorias = DB::table('categoria')->get();
        return view('admin.lista_categorias', ['categorias'=>$lista_categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.form_crear_categoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'cat_nombre'=>'required|min:2|max:50',
        ]);

        //CON MODELO
        $categoria = new Categoria();
        $categoria->cat_nombre = $request->input('cat_nombre');
        $categoria->cat_descripcion = $request->input('cat_descripcion'); 
        $categoria->save();
        return redirect('/categorias');
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
        //
        $categoria = Categoria::where('cat_id', $id)->first();
        return view('admin.form_editar_categoria', ['categoria'=>$categoria]);
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
        //
        $validacion = $request->validate([
            'cat_nombre'=>'required|min:2|max:50',
        ]);

        $categoria = Categoria::where('cat_id', $id)->first();
        $categoria->cat_nombre = $request->input('cat_nombre');
        $categoria->cat_descripcion = $request->input('cat_descripcion'); 
        $categoria->save();
        
        return redirect('/categorias');
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
        $categoria = Categoria::where('cat_id', $id)->first();
        $categoria->delete();
        return redirect('/categorias');
    }
}
