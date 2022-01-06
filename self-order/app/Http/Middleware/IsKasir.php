<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isKasir
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
        if (!auth()->check() || auth()->user()->jabatan !== 'kasir' && auth()->user()->jabatan !== 'admin') {
            abort(403);
        }
        return $next($request);
    }
}