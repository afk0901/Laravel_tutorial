<?php

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

use App\Task;


//$stripe = App::make('App\Billing\Stripe');

//dd($stripe);

//Controllers


Route::get('/tasks','TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/posts','PostsController@index');

Route::post('/posts','PostsController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

//We need to have a wildcard so the controller knows what we are refering to.

//then we can do in controller Post $post in the method and then $post->id.
//we need to do this so the controller knows what id we are using as it's not in the post array.

Route::post('/comment/{post}','PostsController@store_comment');

Route::get('ulala', 'PostsController@ulala');

Route::get('posts/create','PostsController@create');

Route::get('posts/{post}','PostsController@show');

Route::get('register','RegistrationController@create');

Route::post('register','RegistrationController@store');

Route::get('/login','SessionsController@create')->name('login');

Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');


//controller => PostsController

//Eloquent model => Post

//migration => create_posts_table

//Very Basic routing stuff...

Route::get('about', function(){

return view('about');

});






