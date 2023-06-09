<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Illuminate\Http\Request;

class language
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
        if(Session::has('language')){
            App::setLocale(Session::get('language'));
        }
        return $next($request);
    }
}
