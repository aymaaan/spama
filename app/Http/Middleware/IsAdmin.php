<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if ( \Auth::check() && \Auth::user()->role == 'admin' && \Auth::user()->status == 1 )
        {
            return $next($request);

        } elseif (\Auth::check() && \Auth::user()->role == 'member' && \Auth::user()->status == 1) {
            return Redirect('/');
        } else {
            return redirect('/login');
        }

    }
}
