<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProtectApiWithPassword
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
        if($request->api_password !== env('API_PASSWORD','12345678')){
            return \response()->json(['message'=>'UnAuthenticated']);
        }
        return $next($request);
    }
}
