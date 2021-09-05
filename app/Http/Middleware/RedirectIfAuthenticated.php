<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $usuario = Auth::user();
                if($usuario->usu_rol == '1'){
                    return redirect('panel_admin');
                    //return "AUTENTICADO COMO ADMINISTRADOR";
                }
                if($usuario->usu_rol == '2'){
                    return redirect('panel_usuario');
                    //return "AUTENTICADO COMO USUARIO";
                }
                //return redirect(RouteServiceProvider::HOME);
            }
        }
        return $next($request);
    }
}