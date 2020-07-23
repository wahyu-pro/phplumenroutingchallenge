<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Author;

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
        $authors = Author::all();
        Log::info('AuthorControllerMethodIndex');
        return response()->json($authors, 200);
    }

    // public function getPostAndComment()
    // {
    //     $results = Author::with(array('author' => function($query){
    //         $query->select();
    //     }))->get();

    //     return "ok";
    // }

    public function create(Request $request)
    {

        $author = new Author();
        $author->name = $request->input('name');
        $author->password = $request->input('password');
        $author->salt = $request->input('salt');
        $author->email = $request->input('email');
        $author->profile = $request->input('profile');
        $author->save();

        Log::info('add data success');
        return "Add data success";
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $author = Author::find($id);
        $authorId = Author::find($id);
        if (!$authorId) {
            return "not Author";
        }
        $author->name = $request->input('name');
        $author->password = $request->input('password');
        $author->salt = $request->input('salt');
        $author->email = $request->input('email');
        $author->profile = $request->input('profile');
        $author->save();

        Log::info('update success');
        return "success";
    }

    public function findById(Request $request, $id)
    {
        // $id = $request->route('id');
        $authorId = Author::find($id);
        if (!$authorId) {
            return "not Author";
        }
        return response()->json($authorId, 200);
        // return "ok";
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $user = Author::find($id);
        if (!$user) {
            return "not Author";
        }
        $user->delete();
        Log::info('AuthorControllerMethodDelete');

        return "delete success";
    }
}
