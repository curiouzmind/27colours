<?php

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

//    Admin controllers
    public function getAdmin()
    {
        $songs = Song::all();
        $tags = Tag::lists('name', 'id');
        $videos= Video::all();
        $galleries = Gallery::all();
        $talents = User::all();

        return View::make('admin.dashboard')
            ->with('songs', $songs)
            ->with('galleries', $galleries)
            ->with('videos', $videos)
            ->with('tags',$tags)
            ->with('talents', $talents);
    }

    public function getAdminUsers()
    {
        $talents = User::all();

        return View::make('admin.users.blade.php', ['talents', $talents]);
    }

   }