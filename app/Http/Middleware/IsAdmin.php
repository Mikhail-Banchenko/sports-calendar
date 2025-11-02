<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

//this class is used to give access for admin functions like add a new event
class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        //denying access to unauthorized users or non-admins
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Access denied');
        }
        
        return $next($request);
    }
}
