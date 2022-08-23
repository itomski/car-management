<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class BisDannMiddleware
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
        //dd('BisDannMiddleware: handle');
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Erledigt aufgaben direkt vor dem Response
        Log::info('Bis zum nächsten mal: '.$response);
        return $response;
    }
}
