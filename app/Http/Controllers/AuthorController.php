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
            'id' => 1,
            'username' => "wahyu",
            'password' => "wahyu",
            'salt' => "garam",
            'email' => "wahyu@gmail.com",
            'profile' => "wahyu.jpg"
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
            'id' => $request->input('id'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'salt' => $request->input('salt'),
            'email' => $request->input('email'),
            'profile' => $request->input('profile')
        ];
        $data['uses'] = "AuthorControllerCreate";
        Log::info("AuthorControllerMethodCreate");
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = [
            'id' => $id,
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'salt' => $request->input('salt'),
            'email' => $request->input('email'),
            'profile' => $request->input('profile')
        ];
        $data['uses'] = "AuthorController";
        Log::info('AuthorControllerUpdate');
        return response()->json($data, 201);
    }

    public function getByid(Request $request)
    {
        $id = $request->route('id');
        $data['status'] = "success";
        $data['result'] = [
            'id' => $id,
            'username' => "wahyu",
            'password' => "wahyu",
            'salt' => "garam",
            'email' => "wahyu@gmail.com",
            'profile' => "wahyu.jpg"
        ];
        $data['uses'] = "AuthorController";
        Log::info('AuthorControllerMethodGetById');
        return response()->json($data, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        Log::info('AuthorControllerMethodDelete');
        return "id = " . $id;
    }
}
