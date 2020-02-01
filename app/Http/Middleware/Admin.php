<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!empty(auth()->user()->role_id)) {

            if (auth()->user()->role_id != 1) {
            return redirect()->back()->withErrors("You Can't view this page!");
        }
        } else {
            return redirect()->to('/')->withErrors("You Can't view this page!");
        }
        
        
        return $next($request);
    }
}
