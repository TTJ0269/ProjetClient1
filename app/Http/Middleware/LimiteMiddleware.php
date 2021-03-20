<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LimiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $type_id=(Auth::user()->type_utilisateur_id);

        if($type_id==2 || $type_id==3)
        {
        return redirect('users')->with('messagealert','Désolé pas de droit nécessaire pour accéder a la page');
        }
        return $next($request);
    }
}
