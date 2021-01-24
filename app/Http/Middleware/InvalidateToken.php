<?php

namespace App\Http\Middleware;

use Closure;

class InvalidateToken
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
        $user = auth()->user();

        if (empty($user->id)) {
            return response()->json([
                'errors' => [
                    'message' => 'Unauthorize',
                    'status'  => false,
                    'code'    => 401,
                ]
            ]);
        }
        return $next($request);
    }
}
