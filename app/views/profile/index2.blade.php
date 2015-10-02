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
                            <a href="/">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a href="/song"><i class=""></i> Music</a></li>
                        <li><a href="/videos"><i class=""></i> Videos</a></li>
                        <li><a href="/galleries"><i class=""></i> Gallery</a></li>
                        <li class="active"><a href="/talents"><i class=""></i> Talents</a></li>
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
            <a href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <span class="btn btn-danger-reverse"> <i class="fa fa-user"></i> Talents</span>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- Profile page LoggedIn -->
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
                    <div class="col-md-6 col-sm-6 col-xs-6 btn-socials profile-util padding-2px">
                        <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@getPhoto')}}"><i class="fa fa-user fa-xs"></i> | Change Picture</a>
                        <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@getEdit', $user->id)}}"><i class="fa fa-cog fa-xs"></i> | Edit Profile</a>
                        <a href="/song/upload" class="upload btn btn-soundcloud btn-block btn-sm"><i class="fa fa-music fa-xs"></i> | Add Songs</a>
                        <a href="/video/upload" class="upload btn btn-youtube btn-block btn-sm"><i class="fa fa-video-camera fa-xs"></i> | Add Videos</a>
                        <a href="/gallery/upload" class="upload btn btn-facebook btn-block btn-sm"><i class="fa fa-camera fa-xs"></i> | Add Pictures</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 padding-2px">
                <h3 class="userinfo-name info-overflow">{{$user->username}}</h3> 
                <p class="userinfo-details info-overflow">Real Name: <span class="">{{ $user->full_name }}</span></p>
                <p class="userinfo-details info-overflow">Talent: <span class="">{{$user->talents}}</span></p>
                <div>
                    <a class="btn btn-facebook btn-sm" href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook fa-xs"></i></a>
                    <a class="btn btn-twitter btn-sm" href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter fa-xs"></i></a>
                    <a class="btn btn-soundcloud btn-sm" href="{{$user->soundcloud}}" target="_blank"><i class="fa fa-soundcloud fa-xs"></i></a>
                    <a class="btn btn-youtube btn-sm" href="{{$user->youtube}}" target="_blank"><i class="fa fa-youtube fa-xs"></i></a>
                </div>
                <!-- <hr class="hr5">                                 
                <span class="description">{{$user->tagline}}</span>  -->
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
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('errors') }}}</p>
                            </div>
                        @endif
                        @if (Session::get('notices'))
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('notices') }}}</p>
                            </div>
                        @endif
                        @if ($songs->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Songs!</p>
                            <div class="alert alert-info fade in">
<a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
<p> Coming soon!</p>
</div>
                        @else
                        <!-- Fetch Songs -->
                        @foreach ($songs as $song)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a href="{{ action('SongController@getShow', array('id'=> $song->id))}}">
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
                                            array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::link('user/show', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                        <!-- delete button -->
                                        <span class="pull-right">
                                            <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteModal_{{$song->id }}">
                                                      <i class="fa fa-trash-o"></i> <span class="hidden">Delete</span>
                                                    </button>

                                                <div id="deleteModal_{{ $song->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form role="form" action="song/delete" method="post">
						 <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                             <input type="hidden" name="id" value="{{{ $song->id }}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" style="color:IndianRed;">Delete Song?</h4>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <p>Do you want to delete the file {{$song->title }} </a>permanently?</p>
                                <p class="text-primary"><small>If you click yes, the file will be deleted from our database permanently.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-primary" data-dismiss="modal">No</button>
                                <input type="submit" class="btn btn-danger btn-flat" style="width:90px;" value="submit">
								
                            </div>
							</form>
                        </div>
                    </div>
                </div>
                                        </span>
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
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('errors') }}}</p>
                            </div>
                        @endif
                        @if (Session::get('notices'))
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('notices') }}}</p>
                            </div>
                        @endif
                        @if ($videos->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Videos!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a href="{{ action('VideoController@getShow', array('id'=> $video->id))}}">
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
                                            array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::link('user/show', $video->user->username, array('id'=>$video->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li class="hidden"><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li class="hidden"><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                        </ul>
                                        <!-- delete button -->
                                        <span class="pull-right">
                                            <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteModal_{{$video->id }}">
                                                      <i class="fa fa-trash-o"></i> <span class="hidden">Delete</span>
                                                    </button>

                                           <!--    <a href="#deleteModal_{{ $video->id }}" data-toggle="modal" class="btn btn-flat btn-danger">Delete</a> -->
                                                    
                    <div id="deleteModal_{{ $video->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form role="form" action="video/delete" method="post">
						 <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                             <input type="hidden" name="id" value="{{{ $video->id }}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" style="color:IndianRed;">Delete Video?</h4>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <p>Do you want to delete the file {{$video->title }} </a>permanently?</p>
                                <p class="text-primary"><small>If you click yes, the file will be deleted from our database permanently.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-primary" data-dismiss="modal">No</button>
                                <input type="submit" class="btn btn-danger btn-flat" style="width:90px;" value="submit">
								
                            </div>
							</form>
                        </div>
                    </div>
                </div>
                                        </span>
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
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('errors') }}}</p>
                            </div>
                        @endif
                        @if (Session::get('notices'))
                            <div class="alert alert-info fade in alert-dismissable">
                            <a class="close fa fa-close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                            <p>{{{ Session::get('notices') }}}</p>
                            </div>
                        @endif
                        @if ($galleries->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Pictures!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($galleries as $gallery)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post">
                                      <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">
                                        <figure>
                                          <div class="post-img-boxed">
                                            {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive thumbnails center-block')) }}
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera fa-fw"></i> 
                                            {{ HTML::linkAction('GalleryController@getShow', $gallery->caption, array('id'=> $gallery->id), 
                                            array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::link('user/show', $gallery->user->username, array('id'=>$gallery->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li><i class="fa fa-comments"></i> 20 </li>                                            
                                            <li><i class="fa fa-heart"></i> 20 </li> -->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                        </ul>
                                        <!-- delete button -->
                                        <span class="pull-right">

                                                 
                                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteModal_{{ $gallery->id }}">
                                                      <i class="fa fa-trash-o"></i> <span class="hidden">Delete</span>
                                                    </button>
                                                    
                    <div id="deleteModal_{{ $gallery->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form role="form" action="gallery/delete" method="post">
						 <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                             <input type="hidden" name="id" value="{{{ $gallery->id }}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" style="color:IndianRed;">Delete Picture?</h4>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <p>Do you want to delete the file {{ $gallery->caption }} </a>permanently?</p>
                                <p class="text-primary"><small>If you click yes, the file will be deleted from our database permanently.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-flat btn-primary" data-dismiss="modal">No</button>
                                <input type="submit" class="btn btn-danger btn-flat" style="width:90px;" value="submit">
								
                            </div>
							</form>
                        </div>
                    </div>
                </div>

                                                                                         
                                        </span>
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
                         <!-- recent uploads end -->                        
    </div> 
    </div> <!-- ./ row ends -->
    </div> <!-- ./ container ends -->
    @stop
    @section('script')
        <script>
            $(".alert-dismissable").fadeTo(2000, 500).slideUp(300, function(){
                $(".alert-dismissable").alert('close');
            });
        </script>
        <script>

        </script>
    @stop
    