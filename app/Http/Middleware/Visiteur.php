<?php

namespace App\Http\Middleware;

use App\Models\Roles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Visiteur
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
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;

        if ($permission == 3) {
            return $next($request);
        }
        else {
            return $next($request); //TODO mettre message erreur
        }
    }
}
