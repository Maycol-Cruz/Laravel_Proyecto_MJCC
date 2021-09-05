<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class InicioController extends Controller
{
    public function index(){
        $list_categorias = Categoria::all();
        $lista_productos = Producto::where('pro_estado', '1')->paginate(3);
        return view('publico.Inicio', ['categorias'=>$list_categorias, 'productos'=>$lista_productos]);
    }

    public function buscar_producto(Request $request){
        $list_categorias = Categoria::all();
        $clave_busqueda = "%".$request->input('palabra')."%";
        if($request->input('cat_id') == '0'){
            $lista_productos = Producto::where('pro_estado', '1')
                                        ->where('pro_nombre', 'LIKE', $clave_busqueda)
                                        ->paginate(3);
        }else{
            $lista_productos = Producto::where('pro_estado', '1')
                                        ->where('cat_id', $request->input('cat_id'))
                                        ->where('pro_nombre', 'LIKE', $clave_busqueda)
                                        ->paginate(3);
        }
        return view('publico.Inicio', ['categorias'=>$list_categorias, 'productos'=>$lista_productos]);
    }
}