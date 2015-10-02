@extends('layout.master')
     @section('title')
        <title>Profile | 27Colours</title>
     @stop
    @section('menu')
       <!-- menu navigation -->
                <div class="collapse navbar-collapse col-md-8" id="navbar-collapse-1">                    
                    
                    <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a data-ajax="false" href="/">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a data-ajax="false" href="/songs"><i class=""></i> Music</a></li>
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li><a data-ajax="false" href="/galleries"><i class=""></i> Gallery</a></li>
                        <li class="active"><a data-ajax="false" href="/talents"><i class=""></i> Talents</a></li>
                    </ul>
                </div> <!-- ./ menu navigation -->
    @stop
    @section('content') 
    <!-- breadcrumbs -->
    <div class="breadcrumb">
     <div class="overlay-img">
      <div class="row padding-5">
       <div class="container">
        <div class="btn-group pull-left margin-25-0">
            <a data-ajax="false" href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="/talents" class="btn btn-danger-reverse"><i class="fa fa-user"></i> Talents</a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- Profile page LoggedOut -->
    <div class="container featured-posts"> 
    <div class="row">
    <div class="col-md-8 padding-0">
        <div class="profile-header">
          <div class="row">
            <div class="col-md-6 col-sm-6 padding-2px">
                <div class="row margin-0">
                    <div class="col-md-6 col-sm-6 col-xs-6 padding-0 profile-pic" style="margin:0 10px">
                        {{HTML::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg', 
                        'Profile Image', array('class'=>'img-responsive'))}}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 padding-2px btn-socials profile-util">
                        <a data-toggle="tooltip" data-placement="right" title="Coming soon" data-ajax="false" class="btn btn-facebook btn-block btn-sm" href="{{$user->facebook_url}}"><i class="fa fa-facebook fa-xs"></i> | Facebook</a>
                        <a data-toggle="tooltip" data-placement="right" title="Coming soon" data-ajax="false" class="btn btn-twitter btn-block btn-sm" href="{{$user->twitter_url}}"><i class="fa fa-twitter fa-xs"></i> | Twitter</a>
                        <a data-toggle="tooltip" data-placement="right" title="Coming soon" data-ajax="false" class="btn btn-soundcloud btn-block btn-sm" href="{{$user->soundcloud_url}}"><i class="fa fa-soundcloud fa-xs"></i> | Soundcloud</a>
                        <a data-toggle="tooltip" data-placement="right" title="Coming soon" data-ajax="false" class="btn btn-youtube btn-block btn-sm" href="{{$user->youtube_url}}"><i class="fa fa-youtube fa-xs"></i> | Youtube</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 padding-2px">
                <h3 class="userinfo-name info-overflow">{{$user->username}}</h3> 
                <p class="userinfo-details info-overflow">Real Name: <span class="">{{ $user->full_name }}</span></p>
                <p class="userinfo-details info-overflow">Talent: <span class="">{{$user->talents}}</span></p>
                <!-- <hr class="hr5">                                 
                <span class="description userinfo-details">{{$user->tagline}}</span>  -->
            </div>
          </div>
        </div>
        <div class="profile-body padding-2px">
            <ul class="nav nav-tabs nav-justified padding-2px square-tabs">
                    <li class="active">
                        <a class="ui-btn" 
                            href="#songs" data-toggle="tab">
                            <span class="badge">{{$s_count}}</span> Songs <i class="fa fa-music"></i>
                        </a>
                    </li>
                    <li>
                        <a class="ui-btn"
                         href="#videos" data-toggle="tab">
                         <span class="badge">{{$v_count}}</span> Videos <i class="fa fa-video-camera"></i>
                        </a>
                    </li>
                    <li>
                        <a class="ui-btn"
                         href="#pictures" data-toggle="tab">
                         <span class="badge">{{$g_count}}</span> Pictures <i class="fa fa-camera"></i>
                        </a>
                    </li>
            </ul>
            <div class="tab-content">
                    <!-- featured songs -->
                    <div class="tab-pane active fade in songs" id="songs">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($songs->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Songs!</p>
                        @else
                        <!-- Fetch Songs -->
                        @foreach ($songs as $song)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $song->id))}}">
                                        <figure>
                                          <div class="post-img-boxed">
                                            @if($song->image!=='')
                               {{HTML::image($song->image, $song->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-music fa-fw"></i> 
                                            {{ HTML::linkAction('SongController@getShow', $song->title, array('id'=> $song->id), 
                                            array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{$song->user->username}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                        
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                        <!-- pagination -->    
                    </div>
                    <!-- featured videos -->
                    <div class="tab-pane fade in" id="videos">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($videos->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Videos!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a data-ajax="false" href="{{ action('VideoController@getShow', array('id'=> $video->id))}}">
                                        <figure>
                                          <div class="post-img-boxed">
                                            @if($video->image != '')
                                 {{HTML::image($video->image, $video->title,array('class'=>'img-responsive thumbnail center-block'))}}
                                @else
                                {{HTML::image('img/video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-video-camera fa-fw"></i> 
                                            {{ HTML::linkAction('VideoController@getShow', $video->title, array('id'=> $video->id), 
                                            array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ $video->user->username}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                           <!-- <li><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                        </ul>
                                        
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <!-- pagination -->
                        
                    </div>
                     <!-- featured pictures -->
                    <div class="tab-pane fade in" id="pictures">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($galleries->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Pictures!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($galleries as $gallery)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a data-ajax="false" href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">
                                        <figure>
                                          <div class="post-img-boxed">
                                            {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive thumbnail center-block')) }}
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera fa-fw"></i> 
                                            {{ HTML::linkAction('GalleryController@getShow', $gallery->caption, array('id'=> $gallery->id), 
                                            array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ $gallery->user->username}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                        </ul>
                                        
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                        <!-- pagination -->
                        
                    </div>
            </div>
        </div>
    </div> 
    <div class="col-md-4 col-xs-12 padding-5 sidebar">
        <!-- Celebrity Endorsements -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- Facebook Like box -->
                        <div class="fb-widget">
                          <div class="fb-page" data-href="https://www.facebook.com/27colours" 
                            data-width="250" data-height="250" data-hide-cover="false" 
                            data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/27colours">
                            <a href="https://www.facebook.com/27colours">27 colours</a></blockquote>
                            </div>
                          </div>
                        </div>  
                                                 
                                              
    </div> 
    </div> <!-- ./ row ends -->
    </div> <!-- ./ container ends -->
    @stop

    
    