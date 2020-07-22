<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
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
            'content' => 'content',
            'status' => 200,
            'create_time' => 'create_time',
            'author_id' => 'author_id',
            'email' => 'wahyu@gmail.com',
            'url' => 'http/wahyu.com',
            'post_id' => '020'
        ];
        $data['uses'] = "CommentController";
        Log::info('CommentControllerMethodIndex');
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function create(Request $request)
    {
        $data['status'] = "success";
        $data['result'] = [
            'id' => $request->input('id'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'create_time' => $request->input('create_time'),
            'author_id' => $request->input('author_id'),
            'email' => $request->input('email'),
            'url' => $request->input('url'),
            'post_id' => $request->input('post_id')
        ];
        $data['uses'] = 'CommentController';
        Log::info('CommentControllerMethodCreate');
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data['status'] = "success";
        $data = [
            'id' => $id,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'create_time' => $request->input('create_time'),
            'author_id' => $request->input('author_id'),
            'email' => $request->input('email'),
            'url' => $request->input('url'),
            'post_id' => $request->input('post_id')
        ];
        $data['uses'] = 'CommentController';
        Log::info('CommentControllerMethodUpdate');
        return response()->json($data, 201);
    }

    public function getByid(Request $request)
    {
        $id = $request->route('id');
        $data['status'] = "success";
        $data['result'] = [
            'id' => $id,
            'content' => 'content',
            'status' => 200,
            'create_time' => 'create_time',
            'author_id' => 'author_id',
            'email' => 'wahyu@gmail.com',
            'url' => 'http/wahyu.com',
            'post_id' => '020'
        ];
        $data['uses'] = "CommentController";
        Log::info('CommentControllerMethodGetById');
        return response($data, 200)
            ->header("content-type", "application/json")
            ->header("author", "wahyu");
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        Log::info('CommentControllerMethodDelete');
        return 'id = ' . $id;
    }
}
