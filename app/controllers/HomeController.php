<?php

class HomeController extends BaseController {

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

	public function getIndex()
	{
     	$songs = Song::orderBy('id','desc')->paginate(4);
		  $tags = Tag::lists('name', 'id');
        $videos= Video::orderBy('id', 'desc')->paginate(3);
        $galleries = Gallery::orderBY('id', 'desc')->paginate(8);
        $talents = User::orderBY('created_at', 'desc')
            ->whereNotNull('talents')
            ->paginate(15);

 	if (Request::ajax()) {
 	    $content= ['songs' => $songs, 'videos'=> $videos,'galleries'=> $galleries, 'talents'=>'$talents'];
             return Response::json($content, 200);
       	 }

		 return View::make('layout.home')
		 ->with('songs', $songs)
		 ->with('videos', $videos)
		 ->with('tags',$tags)
         ->with('galleries', $galleries)
        ->with('talents', $talents);

	}

    public function getPosts()
	{
	$songs = Song::orderBy('id','desc')->paginate(4);
	$videos= Video::orderBy('id', 'desc')->paginate(4);
	$galleries = Gallery::orderBy('id', 'desc')->paginate(4);
    $talents = Talent::orderBY('id', 'desc')->paginate(6);
          if (Request::ajax())
           {
                //$content= ['galleries' => $galleries];
                // return Response::json($content, 200);
           	 return Response::json(View::make('partials.gallery', array('galleries' => $galleries, 'songs'=>$songs, 'videos'=>$videos, 'talents'=>$talents ))->render());
           }
	 }

	 public function getSong()
    {
        $songs =    Song::orderBy('id','desc')->take(8)->get();
        $afrobeats= Song::where('genre', '=', 'Afrobeat')->orderBy('id','desc')->paginate(6);
        $highlifes= Song::where('genre', '=', 'highlife')->orderBy('id','desc')->paginate(6);
        $rnbs=      Song::where('genre', '=', 'RnB')->orderBy('id','desc')->paginate(6);
        $hips=      Song::where('genre', '=', 'Hip-hop')->orderBy('id','desc')->paginate(6);
        $gospels=   Song::where('genre', '=', 'Gospel')->orderBy('id','desc')->paginate(6);
        $others=    Song::where('genre', '=', 'Others')->orderBy('id','desc')->paginate(6);

        return View::make('song.index',['songs'=>$songs,'afrobeats'=>$afrobeats,'highlifes'=>$highlifes, 'rnbs'=>$rnbs,
         'hips'=>$hips, 'gospels'=>$gospels,'others'=>$others]);
    }

    	public function getGalleries()
    {
       $modelling =  Gallery::where('cat', '=', 'modelling')->orderBy('id','desc')->paginate(6);
          $others =  Gallery::where('cat', '=', 'others')->orderBy('id','desc')->paginate(6);
            $gals =  Gallery::orderBy('id', 'desc')->paginate(6);

        return View::make('gallery.index',['modelling'=>$modelling, 'others'=>$others,'gals'=>$gals]);

      }

      public function getVideos()
    {
     //   $videos = Video::orderBy('id','desc')->paginate(10);
        $musics=  Video::where('video_type', '=', 'Music video')->orderBy('id','desc')->paginate(6);
        $dances=  Video::where('video_type', '=', 'Dance')->orderBy('id','desc')->paginate(6);
        $comedies=Video::where('video_type', '=', 'Comedy')->orderBy('id','desc')->paginate(6);

        return View::make('video.index', ['musics'=>$musics,'dances'=>$dances, 'comedies'=>$comedies]);
    }

    	public function getTalents()
    {

      $musicians = User::where('talents', '=','singing')->confirmed()->paginate(6);
      $models =    User::where('talents', '=','modelling')->confirmed()->paginate(6);
      $dancers =   User::where('talents', '=', 'dancing')->confirmed()->paginate(6);
      $comedians=  User::where('talents', '=', 'comedy')->confirmed()->paginate(6);
      $tops =      User::orderBy('id', 'desc')->confirmed()->paginate(6);
      $fans =      User::where('talents', '=',NULL)->confirmed()->paginate(6);

        return View::make('profile.talents')
        ->with('musicians',$musicians)
        ->with('models', $models)
        ->with('tops', $tops)
        ->with('dancers', $dancers)
        ->with('fans', $fans)
        ->with('comedians',$comedians);
    }

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