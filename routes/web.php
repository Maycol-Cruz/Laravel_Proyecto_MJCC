<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\OrdenController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


/* 
-----------------------------------------------------------------------------------------
RUTAS SECCION PUBLICA
-----------------------------------------------------------------------------------------
*/
Route::get('/', [InicioController::class, 'index']);
Route::post('/buscar_producto', [InicioController::class, 'buscar_producto']);


Route::get('/login', [UsuarioController::class, 'login'])->middleware('guest');
Route::post('/login', [UsuarioController::class, 'autenticar']);

Route::get('/logout', [UsuarioController::class, 'logout']);



// Route::get('/registro', function(Request $req){
//     return view('publico.registro');
// });
Route::get('/usuarios/{id}/editar_password',[UsuarioController::class, 'editar_password']);
Route::put('/usuarios/update_password/{id}', [UsuarioController::class, 'update_password']);
Route::resource('/usuarios', UsuarioController::class);

//Route::get('/panel_usuario', [PanelController::class, 'panel_usuario']);
/* 
-----------------------------------------------------------------------------------------
RUTAS SECCION USUARIO
-----------------------------------------------------------------------------------------
*/



Route::get('/buscar_productos', function(Request $req){
    return view('usuario.buscar_producto');
});

Route::get('/ordenes/compras', [OrdenController::class, 'compras']);
Route::post('/ordenes/buscar_producto', [OrdenController::class, 'buscar_producto']);
Route::post('/ordenes/agregar_producto/{id}', [OrdenController::class, 'buscar_producto']);

Route::get('/ordenes/carrito', [OrdenController::class, 'carrito']);

Route::get('/panel_usuario', [PanelController::class, 'panel_usuario'])->middleware('auth');



/* 
-----------------------------------------------------------------------------------------
RUTAS SECCION ADMINISTRADOR
-----------------------------------------------------------------------------------------
*/
Route::resource('/categorias', CategoriaController::class);

Route::resource('/productos', ProductoController::class);

Route::get('/panel_admin', [PanelController::class, 'panel_admin'])->middleware('auth');


/* 
-----------------------------------------------------------------------------------------
RUTAS EJEMPLOS ANTERIORES
-----------------------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/panel', function (Request $req) {
//     return view('panel', ['titulo'=>'BIENVENIDO A MI APLICACION EN LARAVEL',
//                           'enlaces'=> ['INICIO', 'OPCION 1', 'OPCION 2', 'OPCION 3']
//     ]);
// })->middleware('valida_usuario');


// Route::get('/panel', [PanelController::class, 'show'])->middleware('valida_usuario');

// Route::get('/productos/remate',[ProductoController::class, 'remate']);
// Route::get('/productos/remate',[ProductoController::class, 'remate']);
// Route::resource('/productos', ProductoController::class);


// Route::resource('/productos', ProductoController::class)->only(['index']);
// Route::resource('/productos', ProductoController::class)->except(['index']);

// Route::get('/foto', [FotoController::class, 'index']);

// Route::get('/foto', [FotoController::class, 'uploadFile'])->name('upload-file');
