<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $uuid = $request->header('Authorization');
        
        if($role === null)
            return $next($request);
        
        $user = User::with('role')->where('uuid',$uuid)->first();
        if($role == $user->role->name)
            return $next($request);
    }
}
