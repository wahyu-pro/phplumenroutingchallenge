<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Exception;
use Firebase\JWT\JWT;
// use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class TokenMiddleware
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
        $token = $request->bearerToken('token');
        if (!$token) {
            Log::error("Not token");
            abort(403);
        }
        // $tokenReady = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbiIsInN1YiI6bnVsbCwicGFzcyI6bnVsbCwiaWF0IjoxNTk1Mzg2NzQwLCJuYmYiOjE1OTUzODY3NDB9.EkHUVX0I-B1haifn0QBNluZ4ClVP-mHHam2-TQe_eCU";
        // if ($token != $tokenReady) {
        //     Log::error("Token not registered");
        //     abort(403);
        // }
        try {
            $decode = JWT::decode($token, 'example_key', array('HS256'));
            if (!$decode) {
                Log::error("Not decode");
                abort(403);
            }
            Log::info("Token provided ...");
            return $next($request);
        } catch (Exception $e) {
            Log::error('Token not provided');
            abort(403);
        }
    }
}
