<?php

use App\Http\Controllers\PagesController;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('welcome');
});

Route::get('/pages', 'PagesController@index');

Route::get('pages/about', 'PagesController@about');

Route::get('pages/services', 'PagesController@services');

// Route::get('pages/services', function(){
//     return response('<h1>Hello World</h1>')
//         ->header('foo', 'bar');    
// });

// Route::get('pages/services/{id}', function($id){
//     return response("<h1>I'm " .$id. " years old</h1>");
// })->where('id', '[0-9]+');

// Route::get('pages/services', function(Request $request){
//     return $request->Name. ' ' .$request->City;
// });

Route::resource('posts', 'postsController');

// Route::get('/demo', function(){
//     return response('<h1>Hello World</h1>');
// });

//Dynamic Routes
// Route::get('/users/{id}/{name}', function($id, $name){
//     return 'This is user '. $name. ' with an Id of ' .$id ;
// });  
Auth::routes();

Route::get('/home', 'HomeController@index');
 