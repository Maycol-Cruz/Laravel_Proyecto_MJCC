<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Orden;
use App\Models\DetalleOrden;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    //
    public function compras(){
        $lista_categorias = Categoria::all();
        $lista_productos = Producto::where('pro_estado', '1')->paginate(3);
        //$usuario = Usuario::where('usu_id', $id_usuario)->first();
        $usuario = Auth::user();    
        return view('usuario.buscar_producto', ['categorias'=>$lista_categorias,
                                                'productos'=>$lista_productos,
                                                'usuario'=>$usuario]);
    }

    public function buscar_producto(Request $request){
        //$id_usuario = 2;
       // $usuario = Usuario::where('usu_id', $id_usuario)->first();
        $usuario = Auth::user();
        $lista_categorias = Categoria::all();
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
        return view('usuario.buscar_producto', ['categorias'=>$lista_categorias,
                                                'productos'=>$lista_productos,
                                                'usuario'=>$usuario]);
    }

    public function agregar_producto(Request $request, $id_producto){
        $id_usuario = Auth::user()->usu_id;
        $orden = Orden::where('usu_id', $id_usuario)
                       ->where('ord_confirmado', '0')
                       ->where('ord_fecha', date('Y-m-d'))->latest()->first();
        if(is_null($orden)){
            $orden = new Orden();
            $orden->ord_codigo = Str::random(5);
            $orden->usu_id = $id_usuario;
            $orden->ord_fecha = date('Y-m-d');
            $orden->ord_confirmado = 0;
            $orden->ord_precio_total = 0;
            $orden->save();

        }
        
        $id_orden = $orden->ord_id;
 
        $detalle = new DetalleOrden();
        $detalle->pro_id = $id_producto;
        $detalle->ord_id = $id_orden;

        $producto = Producto::where('pro_id', $id_producto)->first();

        $detalle->dor_precio_unitario = $producto->pro_precio;
        $cant_input_nombre = 'cant_'.$id_producto;
        $detalle->dor_cantidad = $request->input($cant_input_nombre);
        $detalle->save();

        $detalles = DetalleOrden::where('ord_id', $id_orden);
        $total = 0;
        foreach($detalles as $item){
            $total = $total + ($item->dor_precio_unitario * $item->dor_cantidad);
        }
        $orden->ord_precio_total = $total;
        $orden->save();

        $producto->pro_stock = (int) $producto->pro_stock - (int) $request->input($cant_input_nombre);
        $producto->save();

        return back();
    }

    public function carrito(){
        $id_usuario = Auth::user()->usu_id;
        $orden = Orden::where('usu_id', $id_usuario)
                       ->where('ord_confirmado', '0')
                       ->where('ord_fecha', date('Y-m-d'))->latest()->first();
        if(is_null($orden)){
            $datelles = null;
        }else{
            $detalles = $orden->detalles;
        }
        return view('usuario.lista_carrito', ['orden'=>$orden, 'detalles'=>$detalles, 'usuario'=>Auth::user()]);
    }
}