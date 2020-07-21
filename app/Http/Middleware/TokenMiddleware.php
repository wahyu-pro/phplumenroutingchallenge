<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken('token');
        if (!$token) {
            Log::error("Not token");
            abort(403);
        }
        // $key = "example_key";
        // $payload = [
        //     "iss" => "lumen",
        //     "sub" => "wahyu",
        //     "pass" => "wahyu",
        //     "iat" => time(),
        //     "nbf" => time()
        // ];
        // $decode = JWT::decode($payload, $key);
        // if (JWT::decode($token, $key) == $decode) {
        //     Log::error("Token hasn't created");
        //     return abort(403);
        // }
        Log::info("Token provided ...");
        return $next($request);
    }
}
