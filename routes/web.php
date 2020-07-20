<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get($uri, $callback);
// $router->post($uri, $callback);
// $router->put($uri, $callback);
// $router->patch($uri, $callback);
// $router->delete($uri, $callback);
// $router->options($uri, $callback);

// localhost:8000/

use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Author
$router->post('/author', function (Request $request) use ($router) {

    $data = [
        'id' => $request->input('id'),
        'username' => $request->input('username'),
        'password' => $request->input('password'),
        'salt' => $request->input('salt'),
        'email' => $request->input('email'),
        'profile' => $request->input('profile')
    ];
    return response()->json($data, 201);
});

$router->get('/author', function () use ($router) {
    $data = [
        'id' => 1,
        'username' => "wahyu",
        'password' => "wahyu",
        'salt' => "garam",
        'email' => "wahyu@gmail.com",
        'profile' => "wahyu.jpg"
    ];
    return response()->json($data, 200);
});

$router->get('/author/{id}', function ($id) use ($router) {
    return "id - $id";
});

$router->patch('/author/{id}', function ($id, Request $request) use ($router) {
    $data = [
        'id' => $request->$id,
        'username' => $request->input('username'),
        'password' => $request->input('password'),
        'salt' => $request->input('salt'),
        'email' => $request->input('email'),
        'profile' => $request->input('profile')
    ];
    return response()->json($data, 201);
});

$router->delete('/author/{id}', function ($id) use ($router) {
    return "id - $id";
});

// end Author

// Post

$router->post('/post', function (Request $request) use ($router) {

    $data = [
        'id' => $request->input('id'),
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'tags' => $request->input('tags'),
        'status' => $request->input('status'),
        'create_time' => $request->input('create_time'),
        'update_time' => $request->input('update_time'),
        'author_id' => $request->input('author_id')

    ];
    return response()->json($data, 201);
});

$router->get('/post', function () use ($router) {
    $data = [
        'id' => 1,
        'title' => 'jauh di mata dekat ditelinga',
        'content' => 'content',
        'tags' => 'tags',
        'status' => 200,
        'create_time' => 'create_time',
        'update_time' => 'update_time',
        'author_id' => 'author_id'

    ];
    return response()->json($data, 200);
});

$router->get('/post/{id}', function ($id) use ($router) {
    return "id - $id";
});

$router->patch('/post/{id}', function ($id) use ($router) {
    return "id - $id";
});

$router->delete('/post/{id}', function ($id) use ($router) {
    return "id - $id";
});

// end Post

// Comment

$router->post('/comment', function (Request $request) use ($router) {

    $data = [
        'id' => $request->input('id'),
        'content' => $request->input('content'),
        'status' => $request->input('status'),
        'create_time' => $request->input('create_time'),
        'author_id' => $request->input('author_id'),
        'email' => $request->input('email'),
        'url' => $request->input('url'),
        'post_id' => $request->input('post_id')
    ];
    return response()->json($data, 201);
});

$router->get('/post', function () use ($router) {
    $data = [
        'id' => 1,
        'content' => 'content',
        'status' => 200,
        'create_time' => 'create_time',
        'author_id' => 'author_id',
        'email' => 'wahyu@gmail.com',
        'url' => 'http/wahyu.com',
        'post_id' => '020'
    ];
    return response()->json($data, 200);
});

$router->get('/comment/{id}', function ($id) use ($router) {
    return "id - $id";
});

$router->patch('/comment/{id}', function ($id) use ($router) {
    return "id - $id";
});

$router->delete('/comment/{id}', function ($id) use ($router) {
    return "id - $id";
});