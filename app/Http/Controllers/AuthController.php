<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class AuthController extends Controller
{

    // public $request;
    /**
     * The user repository instance.
     */
    // protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }

    public function generate(Request $request)
    {
        $key = "example_key";
        $payload = [
            "iss" => "lumen",
            "sub" => $request->input("name"),
            "pass" => $request->input("password"),
            "iat" => time(),
            "nbf"=> time()
        ];
        return response()->json(["token" => JWT::encode($payload, env($key))]);
        // return response()->json(["token" => "wahyu"]);
    }

    // public function getUserByToken(Request $request)
    // {
    //     $token = $request->bearerToken('token');
    //     $decoded = JWT::decode($token, $key = "example_key", array('HS256'));
    //     return response()->json($decoded);
    // }

    // public function valid(Request $request)
    // {
    //     if ($this->request->input("name") == "wahyu") {
    //         return $this->generate($request);
    //     }
    //     return abort(401);
    // }

}
