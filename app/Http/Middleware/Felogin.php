<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Felogin
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
        $feauth = session('felogin');

        if (isset($feauth) && ($feauth)) {
            return $next($request);
        }

        return redirect(route("login"))->with('status', 'Please login to continue !');

    }
}
