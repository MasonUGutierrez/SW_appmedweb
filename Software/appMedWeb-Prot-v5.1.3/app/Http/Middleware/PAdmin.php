<?php

namespace appMedWeb\Http\Middleware;

use Closure;
use Auth;

class PAdmin
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
        if (Auth::check() && Auth::user()->Rol=='P') 
        {
            return $next($request);
        }
        // return back()->with('flash','Por favor, inicia sesión');
        return redirect('accesodenegado');
    }
}
