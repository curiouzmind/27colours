@extends('layout.master')
     @section('title')
        <title>Videos | 27Colours</title>
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
                        <li><a data-ajax="false" href="/song"><i class=""></i> Music</a></li>
                        <li class="active"><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
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
            <a data-ajax="false" href="/videos" class="btn btn-danger-reverse">Videos <i class="fa fa-video-camera"></i></a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container padding-0">
          <div class="row margin05">
              <div class="col-md-8 col-xs-12 padding-2px">
                
                <div class="featured-tab">
                    <ul class="nav nav-tabs padding-2px pages-tabs">
                        <li class="active">
                            <a class="" href="#music" data-toggle="tab">Music</a>
                        </li>
                        <li>
                            <a class="" href="#dance" data-toggle="tab">Dance</a>
                        </li>
                        <li>
                            <a class="" href="#comedy" data-toggle="tab">Comedy</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured videos -->

                        <!-- music -->
                        <div class="tab-pane fade active in" id="music">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($musics->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Music videos!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($musics as $music)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                       <a data-ajax="false" href="{{ action('VideoController@getShow', array('id'=> $music->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                             @if($music->image!=='')
                               {{HTML::image($music->image, $music->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          <div>
                                        </figure>
                                        </a>
                                        <h4 class="post-title userinfo-details ui-icon-video">
                                            <i class="fa fa-video-camera"></i> {{ HTML::linkAction('VideoController@getShow', 
                                            $music->title, array('id'=> $music->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $music->user->username, array('id'=>$music->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$music->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{$musics-> links() }}
                        </div>
                        <!-- dance -->
                        <div class="tab-pane fade in" id="dance">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($dances->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Dance videos!</p>
                            @else
                            <!-- Fetch Videos -->
                            @foreach ($dances as $dance)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('VideoController@getShow', array('id'=> $dance->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            @if($dance->image!=='')
                               {{HTML::image($dance->image, $dance->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img//video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                       </a>
                                        <h4 class="post-title userinfo-details ui-icon-video">
                                            <i class="fa fa-video-camera"></i> {{ HTML::linkAction('VideoController@getShow', 
                                            $dance->title, array('id'=> $dance->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $dance->user->username, array('id'=>$dance->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                           <!-- <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$dance->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{ $dances-> links() }}
                        </div>
                        <!-- comedy -->
                        <div class="tab-pane fade in" id="comedy">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($comedies->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Comedy videos!</p>
                            @else
                            <!-- Fetch videos -->
                            @foreach ($comedies as $comedy)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('VideoController@getShow', array('id'=> $comedy->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                             @if($comedy->image!=='')
                               {{HTML::image($comedy->image, $comedy->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details ui-icon-video">
                                            <i class="fa fa-video-camera"></i> {{ HTML::linkAction('VideoController@getShow', 
                                            $comedy->title, array('id'=> $comedy->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $comedy->user->username, array('id'=>$comedy->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <!--<li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$comedy->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{ $comedies-> links() }}
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-xs-12 padding-0 sidebar">
                  @include('video.video-sidebar')
              </div>
          </div> <!-- ./ row ends -->            
        </div>
    </div>
    @stop
   @section('script')
       
    @stop