<?php

namespace App\Http\Middleware;

use Closure;
use Gate;

class AccountCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        switch ($role) {

            case 'customer':
                Gate::authorize('customer');
                break;

            case 'staff':
                Gate::authorize('staff');
                break;
            
            default:
                # code...
                break;
        }

        return $next($request);
    }
}
