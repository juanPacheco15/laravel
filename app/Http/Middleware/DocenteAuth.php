<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class DocenteAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->tipoUsuario == 'Docente' || auth()->user()->tipoUsuario == 'docente' ) {
                return $next($request);
            }
            
        }
        return redirect()->to('login');
    }
}
