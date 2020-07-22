<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
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
            'title' => 'jauh di mata dekat ditelinga',
            'content' => 'content',
            'tags' => 'tags',
            'status' => 200,
            'create_time' => 'create_time',
            'update_time' => 'update_time',
            'author_id' => 'author_id'
        ];
        $data['uses'] = "PostController";
        Log::info('PostControllerMethodIndex');
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function create(Request $request)
    {
        $data['status'] = "success";
        $data['result'] = [
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
            'status' => $request->input('status'),
            'create_time' => $request->input('create_time'),
            'update_time' => $request->input('update_time'),
            'author_id' => $request->input('author_id')
        ];
        Log::info("PostControllerMethodCreate");
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data['status'] = "success";
        $data['result'] = [
            "id" => $id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
            'status' => $request->input('status'),
            'create_time' => $request->input('create_time'),
            'update_time' => $request->input('update_time'),
            'author_id' => $request->input('author_id')
        ];
        $data['uses'] = "PostController";
        Log::info("PostControllerMethodUpdate");
        // return response($data, 200)
        //     ->header("content-type", "application/json");
        return response()->json($data, 201);
    }

    public function getByid(Request $request)
    {
        $id = $request->route('id');
        $data = [
            'id' => $id,
            'title' => 'jauh di mata dekat ditelinga',
            'content' => 'content',
            'tags' => 'tags',
            'status' => 200,
            'create_time' => 'create_time',
            'update_time' => 'update_time',
            'author_id' => 'author_id'

        ];
        Log::info("PostControllerMethodGetById");
        return response()->json($data, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        Log::info("PostControllerMethodDelete");
        return "id = ".$id;
    }
}
