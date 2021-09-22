<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuthentication
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
        $token = $request->bearerToken();

        if (is_null($token)) {
            return response(['message' => 'Unauthenticated'], 403);
        }
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            auth()->login($user);
            return $next($request);
        }
        return response(['message' => 'Unauthenticated'], 403);
    }
}
