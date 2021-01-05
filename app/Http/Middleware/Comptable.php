<?php

namespace App\Http\Middleware;

use App\Models\Roles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comptable
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     *
     * @return string|null
     */

    public function handle($request, Closure $next)
    {
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;

        if ($permission == 1) {
            return $next($request);
        }
        else {
            return $next($request);
        }
    }
}
