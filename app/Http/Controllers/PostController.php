<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Post;

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

    public function index()
    {
        // $post = Post::all();
        $results = Post::with(array('author' => function($query){
            $query->select();
        }))->get();
        Log::info('PostControllerMethodIndex');
        return response()->json($results, 200);
    }

    // public function getAuthor()
    // {
    //     $results = Post::with(array('author' => function($query){
    //         $query->select();
    //     }))->get();

    //     return response()->json($results, 200);
    // }

    public function create(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tags = $request->input('tags');
        $post->status = $request->input('status');
        $post->author_id = $request->input('author_id');
        $post->save();
        Log::info('add data success');
        return "success";
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $post = Post::find($id);
        if (!$post) {
            return "not post";
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tags = $request->input('tags');
        $post->status = $request->input('status');
        $post->author_id = $request->input('author_id');
        $post->save();
        Log::info('update data success');
        return "success";
    }

    public function findById(Request $request)
    {
        $id = $request->route('id');
        $post = Post::find($id);
        if (!$post) {
            return "not post";
        }
        return response()->json($post, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $post = Post::find($id);
        if (!$post) {
            return "not post";
        }
        $post->delete();
        Log::info("delete success");
        return "success";
    }
}
