<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\Request;

/**
 * Class APIVersion
 * @package App\Http\Middleware
 */
class ApiAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value = $request->header('Bearer');
        $token = env('APP_TOKEN');

        if ($value != $token) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return $next($request);
    }
}
