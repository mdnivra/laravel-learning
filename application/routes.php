<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{	$name ="name";
	$bio ="bio";
	// DB::query("INSERT into authors (name,bio) VALUE (:title,:bio)",array($name,$bio ));
	// $authors =DB::only("SELECT name from authors where id=1");
	
	// $authors =DB::table('authors')->where_id_or_name(1,'Author 2')
	// ->get();//SELECT * from authors
	$user =Author::where_id_and_name(1,'Arvind');
	print_r($user);
	//print_r($authors); //dumping output and die
	// return View::make('home.index');
});
Route::get('authors', array('as'=>'authors','uses' => 'authors@index' ));
Route::get('authors/(:any)', array('as'=>'author','uses' => 'authors@view' ));
Route::get('authors/(:any)/edit', array('as'=>'edit_author','uses' => 'authors@edit' ));
Route::get('authors/new',array('as'=>'new_author','uses'=>'authors@new'));
Route::post('authors/create', array('before'=>'csrf','uses'=>'authors@create'));
Route::put('authors/update', array('before'=>'csrf','uses'=>'authors@update'));
Route::delete('authors/delete', array('before'=>'csrf','uses'=>'authors@destroy'));
// Route::controller(controller::detect());//will create routes like cake 

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});