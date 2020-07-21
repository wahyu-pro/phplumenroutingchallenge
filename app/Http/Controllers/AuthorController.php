<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
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
    public function __construct()
    {

    }

    public function index()
    {
        $data['status'] = "success";
        $data['result'] = [
            "fistname" => "wahyu",
            "lastname" => "wibowo"
        ];
        $data['uses'] = "AuthorController";
        Log::info('AuthorControllerMethodIndex');
        return response($data, 200)
                ->header("content-type", "application/json")
                ->header("author", "wahyu");
    }

    public function create(Request $request)
    {
        $data['status'] = "success";
        $data['result'] = [
            "name" => $request->input('name'),
            "class" => $request->input('class')
        ];
        Log::info("AuthorControllerMethodCreate");
        return response($data, 200)
                ->header("content-type", "application/json")
                ->header("author", "wahyu");
    }

}