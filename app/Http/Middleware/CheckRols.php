<?php

namespace App\Http\Middleware;

use Closure;
class CheckRols
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
        $rols=func_get_args();
        $rols=array_slice($rols,2);
        
        foreach ($rols as $rol) {
            if (auth()->user()->rol->name===$rol){
                return $next($request);
            }
        }
        
        return redirect('/home');
    }
}
