<?php

namespace appMedWeb\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->Rol=='A') 
        {
            return $next($request);
        }
        // return back()->with('flash','Por favor, inicia sesión'); 
        return redirect('accesodenegado');
    }
}
