<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function login(){
        return view('publico.login');
    }

    public function autenticar(Request $request){
        $usr = $request->input('usr');
        $pwd = $request->input('pwd');
        $credenciales = $request->validate([
            'usr' => 'required',
            'pwd' => 'required'
        ]);

        if(Auth::attempt(['usu_username' => $usr, 'password' => $pwd])){
            $request->session()->regenerate();
            $usuario = Auth::user();
            if($usuario->usu_rol == '1'){
                return redirect('panel_admin');
                //return "AUTENTICADO COMO ADMINISTRADOR";
            }
            if($usuario->usu_rol == '2'){
                return redirect('panel_usuario');
                //return "AUTENTICADO COMO USUARIO";
            }
        }

        return redirect('/login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lista_usuarios = Usuario::paginate(3);
        return view('admin.lista_usuarios',['usuarios'=>$lista_usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Auth::user();
        if($usuario->usu_rol == 2){
        }
        return view('publico.registro_usuario');
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
            'usu_username'=>'required|min:2|max:50',
            'usu_password'=>'required|min:2|max:50',
            'usu_email'=>'required|min:2|max:50',
            'usu_nombres'=>'required|min:2|max:50',
            'usu_apellidos'=>'required|min:2|max:50',
        ]);

        //CON MODELO
        $usuario = new Usuario();
        $usuario->usu_username = $request->input('usu_username');
        $usuario->password = Hash::make($request->input('usu_password'));
        $usuario->usu_email = $request->input('usu_email');
        $usuario->usu_nombres = $request->input('usu_nombres');
        $usuario->usu_apellidos = $request->input('usu_apellidos');
        $usuario->usu_foto = '/storage/foto_usuarios/default_foto_usuarios.jpg';
        $usuario->usu_rol = 2;
        $usuario->save();
        //return redirect('/categorias');
        return view('publico.registro_usuario_ok', ['usuario'=>$request->input('usu_username'), 'password'=>$request->input('usu_password')]);
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
        $usuario = Usuario::where('usu_id', $id)->first();
        return view('usuario.form_editar_usuario',['usuario'=>$usuario]);
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
            'usu_email'=>'required|min:2|max:50',
            'usu_nombres'=>'required|min:2|max:50',
            'usu_apellidos'=>'required|min:2|max:50',
        ]);

        //CON MODELO
        $usuario = Usuario::where('usu_id', $id)->first();
        $usuario->usu_email = $request->input('usu_email');
        $usuario->usu_nombres = $request->input('usu_nombres');
        $usuario->usu_apellidos = $request->input('usu_apellidos');
        $usuario->save();
        //return redirect('/categorias');
        //return view('publico.registro_usuario_ok', ['usuario'->$request->input('usu_username'), 'password'->$request->input('usu_password')]);
        return back();
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

    public function editar_password($id){
        $usuario = Usuario::where('usu_id', $id)->first();
        return view('usuario.form_editar_password', ['usuario'=>$usuario]);

    }

    public function update_password(Request $request, $id){
        $validacion = $request->validate([
            'usu_password_antiguo'=>'required|min:2|max:50',
            'usu_password_nuevo'=>'required|min:2|max:50',
        ]);

        //CON MODELO
        $usuario = Usuario::where('usu_id', $id)->first();
        if(Hash::check($request->input('usu_password_antiguo'), $usuario->usu_password)){
            $usuario->password = Hash::make($request->input('usu_password_nuevo'));
            $usuario->save();
            return back();
        }else{
            return view('usuario.form_editar_password_error',['usuario'=>$usuario]);
        }
        
        //return redirect('/categorias');
        //return view('publico.registro_usuario_ok', ['usuario'->$request->input('usu_username'), 'password'->$request->input('usu_password')]);
        return back();

    }

}