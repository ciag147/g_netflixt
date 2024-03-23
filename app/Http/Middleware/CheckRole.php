<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $role = Role::where('name', $role)->first();
        if (Auth::user()->roleId == $role->id) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('admin.login');
    }
}
