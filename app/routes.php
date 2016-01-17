<?php

/*
|-------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user','User');
Route::model('blog','Blog');
Route::model('song','Song');
Route::model('gallery', 'Gallery');
Route::model('video', 'Video');


Route::get('/privacyPolicy', 'ProfileController@privacyPolicy');

Route::get('/song/show/{song}', 'SongController@getShow');
Route::controller('/song', 'SongController');

Route::get('/video/show/{video}', 'VideoController@getShow');

Route::controller('/video', 'VideoController');

Route::get('/gallery/show/{gallery}', 'GalleryController@getShow');
Route::controller('/gallery', 'GalleryController');


Route::get('/user/show/{id}', 'ProfileController@getShow');
Route::controller('/profile', 'ProfileController');


// Confide routes
Route::get('users/register',['as'=> 'register', 'uses' =>'UsersController@getCreate']);
Route::post('users', 'UsersController@postCreate');
Route::get('users/login', ['as'=>'login', 'uses'=> 'UsersController@getLogin']);
Route::post('users/login', 'UsersController@postLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@getForgotPassword');
Route::post('users/forgot_password', 'UsersController@postForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@getResetPassword');
Route::post('users/reset_password', 'UsersController@postResetPassword');
Route::get('users/logout', ['as' => 'logout', 'uses' => 'UsersController@getLogout']);

Route::get('/upload', 'UploadController@index');


    Route::get('fbauth/{auth?}', function($auth = NULL)
        {
            if ($auth == 'auth') {
                try {
        Hybrid_Endpoint::process();
    } catch (Exception $e) {
        return Redirect::to('fbauth');
    }
        return;
    }
    try {
            $oauth = new Hybrid_Auth(app_path(). '/config/fb_auth.php');
            $provider = $oauth->authenticate('Facebook');
            $profile = $provider->getUserProfile();
        }
    catch(Exception $e) {
        return $e->getMessage();
        }
        $email= $profile->email;
        $checkUser = User::where('email', '=', $email)->confirmed()->first();
        if (empty($checkUser)) {

        $user = new User;
        if(is_null($profile->identifier))
        {
       // dd($profile->identifier);
        $id = $profile->identifier;
        $user->fb_id= $id;
        }
        if(is_null($profile->email))
        {
       //  dd($profile->email);
        $user->email= $profile->email;
        }
        if(is_null($profile->profileURL))
        {
       //  dd($profile->profileURL);
        $user->facebook=$profile->profileURL;
        }
        $user->confirmed=1;
         if(is_null($profile->firstName ))
         {
         // dd($profile->firstName);
        $user->first_name= $profile->firstName;
        }
         if(is_null($profile->lastName))
         {
        //  dd($profile->lastName);
        $user->last_name=$profile->lastName;
        }
         //if(is_null($provider->getAccessToken))
       //  {
        //  dd($provider->getAccessToken);
       // $user->access_token = $provider->getAccessToken();
        //}
        $user->save();

         $new = User::where('email', '=', $profile->email)->first();

                //  Auth::login($new);


     //   if($user->save())
      //  {
      //  $photo='https://graph.facebook.com/'.$id.'/picture?width=150&height=150';
      //  $profilePhoto= new ProfilePhoto;
      //  $profilePhoto->image = $photo;
       // $profilePhoto= $user->profilePhoto()->save($profilePhoto);
      //  $profilePhoto->user_id= $user->id;
      //  $profilePhoto->save();
        //$user= $profilePhoto->user;
     // Auth::loginUsingId($new->id);
        return View::make('profile.edit', array('user'=>$new));
      //  }
      //  return Redirect::to('users/login');


        } else {
         $checkUser->access_token = $provider->getAccessToken();
         if ($checkUser->save())
 		Auth::loginUsingId($checkUser->id);
 		return Redirect::to('/profile', 'Logged in with Facebook');
 		}


       // print_r($adapter->getTokens());
      //  echo 'Welcome ' . $profile->firstName . ' '. $profile->lastName . '<br>';
      //  echo 'Your email: ' . $profile->email . '<br>';
      //  dd($profile);
        });


Route::get('users/login/fb', ['as' => 'fblogin', 'uses'=> 'HomeController@loginWithFacebook']);
Route::get('users/login/go', ['as' => 'gologin', 'uses'=> 'HomeController@loginWithGoogle']);

Route::get('/ajax/posts', array('uses'=>'HomeController@getPosts'));
Route::get('/', array('uses'=>'HomeController@getIndex'));
Route::controller('/', 'HomeController');




//Route::get('/search/song', 'SongController@search');


//Route::get('/search/gallery', 'GalleryController@search');