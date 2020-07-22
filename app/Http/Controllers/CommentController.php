<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Comment;

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

    public function index()
    {
        $comment = Comment::all();
        Log::info('CommentControllerMethodIndex');
        return response()->json($comment, 200);
    }

    public function getPostAndAuthor()
    {
        $results = Comment::with(array('author' => function($query){
            $query->select();
        }))->with(array('post' => function($query){
            $query->select();
        }))->get();

        return response()->json($results, 200);
    }

    public function create(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->status = $request->input('status');
        $comment->author_id = $request->input('author_id');
        $comment->email = $request->input('email');
        $comment->url = $request->input('url');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        Log::info('add data success');
        return "success";
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $comment = Comment::find($id);
        $comment->content = $request->input('content');
        $comment->status = $request->input('status');
        $comment->author_id = $request->input('author_id');
        $comment->email = $request->input('email');
        $comment->url = $request->input('url');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        Log::info('update data success');
        return "success";
    }

    public function getByid(Request $request)
    {
        $id = $request->route('id');
        $commentId = Comment::find($id);
        return response()->json($commentId, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $comment = Comment::find($id);
        $comment->delete();
        Log::info("delete success");
        return "success";
    }
}
