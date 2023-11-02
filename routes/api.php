<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('post/', function(){
    return response()->json([
        'Post1' => [
            ['title' => 'Post 1'],
            ['body' => 'Body of post one']
        ],
        'Post 2' => [
            ['title' => 'Post 2'],
            ['body' => 'Body of post two']
        ]
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
