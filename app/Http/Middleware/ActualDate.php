<?php

namespace App\Http\Middleware;

use Closure;

class ActualDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $str = false)
    {
        if($str) {
            // Before - Zuerst führe ich meine Aktion aus und springe dann zur nächsten Middleware
            $request->actDate = now()->format('Y-m-d');
        }
        else {
            $request->actDate = now();
        }
        return $next($request);

        // After - Zuerst wird die nächste Middleware abgearbeitet und anschließend wird meine Aktion ausgeführt
        // $response = $next($request);
        // $request->actDate = now();
        // return $response;
    }

    // Von dieser Middleware gibt es nur eine Instanz
    // public function register() {
    //     $this->app->singleton(ActualDate::class);
    // }
}
