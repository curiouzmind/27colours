@extends('layout.master')
     @section('title')
        <title>Music | 27Colours</title>
     @stop
     @section('css-links')
        
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
                        <li class="active"><a data-ajax="false" href="/song"><i class=""></i> Music</a></li>
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li><a data-ajax="false" href="/galleries"><i class=""></i> Gallery</a></li>
                        <li><a data-ajax="false" href="/talents"><i class=""></i> Talents</a></li>
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
            <a href="/songs" class="btn btn-danger-reverse">Music <i class="fa fa-music"></i></a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container padding-0">
          <div class="row margin05">
              <div class="col-md-8 col-xs-12 padding-2px my-page">
                
                <div class="featured-tab">
                    <ul class="nav nav-tabs padding-2px pages-tabs">
                        <li class="active">
                            <a class="" href="#afrobeat" data-toggle="tab">Afrobeat</a>
                        </li>
                        <li>
                            <a class="" href="#hiphop" data-toggle="tab">Hiphop</a>
                        </li>
                        <li>
                            <a class="" href="#rnb" data-toggle="tab">RnB</a>
                        </li>
                        <li>
                            <a class="" href="#gospel" data-toggle="tab">Gospel</a>
                        </li>
                        <li>
                            <a class="" href="#highlife" data-toggle="tab">Highlife</a>
                        </li>
                        <li>
                            <a class="" href="#others" data-toggle="tab">Others</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured songs -->

                        <!-- afrobeats -->
                        <div class="tab-pane fade active in" id="afrobeat">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($afrobeats->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Afrobeats songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($afrobeats as $afrobeat)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $afrobeat->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            @if($afrobeat->image!=='')
                               {{HTML::image($afrobeat->image, $afrobeat->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                         <i class="fa fa-music fa-fw"></i>
                                            {{ HTML::linkAction('SongController@getShow', $afrobeat->title, 
                                             array('id'=> $afrobeat->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $afrobeat->user->username, array('id'=>$afrobeat->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left padding-0" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            
                                            
                                            
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$afrobeat->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                             {{$afrobeats -> links() }}
                        </div>
                        <!-- hiphop -->
                        <div class="tab-pane fade in" id="hiphop">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($hips->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Hiphop songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($hips as $hiphop)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $hiphop->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                             @if($hiphop->image!=='')
                               {{HTML::image($hiphop->image, $hiphop->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i>
                                        {{ HTML::linkAction('SongController@getShow', $hiphop->title, 
                                        array('id'=> $hiphop->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $hiphop->user->username, array('id'=>$hiphop->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$hiphop->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{ $hips-> links() }}
                        </div>
                        <!-- rnb -->
                        <div class="tab-pane fade in" id="rnb">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($rnbs->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Rnb songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($rnbs as $rnb)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $rnb->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                           @if($rnb->image!=='')
                               {{HTML::image($rnb->image, $rnb->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i>
                                        {{ HTML::linkAction('SongController@getShow', $rnb->title, 
                                        array('id'=> $rnb->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $rnb->user->username, array('id'=>$rnb->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left padding-0" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$rnb->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{ $rnbs-> links() }}
                        </div>
                        <!-- gospels -->
                        <div class="tab-pane fade in" id="gospel">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($gospels->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Gospel songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($gospels as $gospel)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $gospel->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                           @if($gospel->image!=='')
                               {{HTML::image($gospel->image, $gospel->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          <div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i>
                                        {{ HTML::linkAction('SongController@getShow', $gospel->title, 
                                        array('id'=> $gospel->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $gospel->user->username, array('id'=>$gospel->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$gospel->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{$gospels->links()}}
                        </div>
                        <!-- highlifes -->
                        <div class="tab-pane fade in" id="highlife">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($highlifes->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Highlife songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($highlifes as $highlife)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $highlife->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                             @if($highlife->image!=='')
                               {{HTML::image($highlife->image, $highlife->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i>
                                        {{ HTML::linkAction('SongController@getShow', $highlife->title, 
                                        array('id'=> $highlife->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $highlife->user->username, array('id'=>$highlife->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$highlife->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{ $highlifes->links() }}
                        </div>
                        <!-- others -->
                        <div class="tab-pane fade in" id="others">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($others->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Other songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($others as $other)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('SongController@getShow', array('id'=> $other->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                             @if($other->image!=='')
                               {{HTML::image($other->image, $other->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i>
                                        {{ HTML::linkAction('SongController@getShow', $other->title, 
                                        array('id'=> $other->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $other->user->username, array('id'=>$other->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$other->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{$others->links()}}
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-xs-12 padding-0 sidebar">
                  @include('song.song-sidebar')
              </div>
          </div> <!-- ./ row ends -->            
        </div>
    </div>
    @stop
    @section('script')
       
    @stop
    