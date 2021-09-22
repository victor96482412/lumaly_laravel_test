<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiMiddleware
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
        $executionStart = microtime(true);
        $response = $next($request);

        if ($request->header('Content-Type') != 'application/json') {
            return response()->json([], 406);
        }

        $executionTime = microtime(true) - $executionStart;
        $response->header('X-Execution-Time', $executionTime);
        return $response;
    }
}
