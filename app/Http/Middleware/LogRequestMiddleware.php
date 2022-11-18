<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->all()) {
            \Log::channel('incoming')->info('----------------------------------------------------------------------------------------');
            \Log::channel('incoming')->info(['request' => $request->all()]);
            \Log::channel('incoming')->info('----------------------------------------------------------------------------------------');
        }

        return $next($request);
    }
}
