@extends('layout.master')
     @section('title')
        <title>Talents | 27Colours</title>
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
            <a href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="/talents" class="btn btn-danger-reverse">Talents <i class="fa fa-user"></i></a>
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
                            <a class="" href="#modelling" data-toggle="tab">Models</a>
                        </li>
                        <li>
                            <a class="" href="#singing" data-toggle="tab">Music</a>
                        </li>
                        <li>
                            <a class="" href="#dancing" data-toggle="tab">Dance</a>
                        </li>
                        <li>
                            <a class="" href="#comedy" data-toggle="tab">Comedy</a>
                        </li>
                        <li>
                            <a class="" href="#fans" data-toggle="tab">Fans</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured songs -->

                        <!-- modelling -->
                        <div class="tab-pane fade active in" id="modelling">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($models->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Models profiles!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($models as $model)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                        <div class="featured-post1">
                                           <a data-ajax="false" href="{{ action('ProfileController@getShow', $model->id)}}">
                                            <figure>
                                              <div class="post-img-boxed center-block">
                                                @if($model->profilePhoto->image !== '')
                               {{HTML::image($model->profilePhoto->image, $model->username,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/user.jpg','thumbnail',array('width' => 100 , 'height' => 100, 'class'=>'center-block'))}}
                               @endif
                                              </div>
                                            </figure>
                                           </a>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@getShow', $model->username, array('id'=>$model->id),
                                                array('data-ajax'=>'false'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <!--<li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                                <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                                <li class="post-time"><i class="fa fa-clock-o"></i> {{$model->timeago}}</li>
                                            </ul>
                                       </div>										
                                    </div>
																
                            @endforeach							
                            @endif 
							
                            
                        </div>
                        <!-- singing -->
                        <div class="tab-pane fade in" id="singing">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($musicians->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Singers profiles!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($musicians as $musician)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                        <div class="featured-post1">
                                           <a data-ajax="false" href="{{ action('ProfileController@getShow', $musician->id)}}">
                                            <figure>
                                              <div class="post-img-boxed center-block">
                                              @if(isset($musician->profilePhoto->image))
                               {{HTML::image($musician->profilePhoto->image, $musician->username,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/user.jpg','thumbnail',array('width' => 100 , 'height' => 100, 'class'=>'center-block'))}}
                               @endif
                                              </div>
                                            </figure>
                                           </a>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@getShow', $musician->username, array('id'=>$musician->id),
                                                array('class'=>'', 'data-ajax'=>'false'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <!--<li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                                <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                                <li class="post-time"><i class="fa fa-clock-o"></i> {{$musician->timeago}}</li>
                                            </ul>
                                        </div>
										 
                                    </div>
							
                            @endforeach
                            @endif 
                            {{ $musicians -> links() }}
                           
                            
                        </div>
                        <!-- dancing -->
                        <div class="tab-pane fade in" id="dancing">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($dancers->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Dancers profiles!</p>
                            @else
                            <!-- Fetch Profiles -->
                            @foreach ($dancers as $dancer)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                        <div class="featured-post1">
                                           <a data-ajax="false" href="{{ action('ProfileController@getShow', $dancer->id)}}">
                                            <figure>
                                              <div class="post-img-boxed center-block">
                                                  @if(isset($dancer->profilePhoto->image))
                               {{HTML::image($dancer->profilePhoto->image, $dancer->username,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/user.jpg','thumbnail',array('width' => 100 , 'height' => 100, 'class'=>'center-block'))}}
                               @endif
                                              </div>
                                            </figure>
                                           </a>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@getShow', $dancer->username, array('id'=>$dancer->id),
                                                array('class'=>'', 'data-ajax'=>'false'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                               <!-- <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                                <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                                <li class="post-time"><i class="fa fa-clock-o"></i> {{$dancer->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
							@endforeach
                            @endif 
                            
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
                            @if ($comedians->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Comedians profiles!</p>
                            @else
                            <!-- Fetch Profiles -->
                            @foreach ($comedians as $comedian)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                        <div class="featured-post1">
                                           <a data-ajax="false" href="{{ action('ProfileController@getShow', $comedian->id)}}">
                                            <figure>
                                              <div class="post-img-boxed center-block">
                                               @if(isset($comedian->profilePhoto->image))
                               {{HTML::image($comedian->profilePhoto->image, $comedian->username,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/user.jpg','thumbnail',array('width' => 100 , 'height' => 100, 'class'=>'center-block'))}}
                               @endif
                                               </div>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@getShow', $comedian->username, array('id'=>$comedian->id),
                                                array('class'=>'', 'data-ajax'=>'false'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <!--<li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                                <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                                <li><i class="fa fa-clock-o"></i> {{$comedian->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
							
                            @endforeach
                            @endif 
                             
                        </div>
						<!-- fans -->
                        <div class="tab-pane fade in" id="fans">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($fans->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Fans profiles!</p>
                            @else
                            <!-- Fetch Profiles -->
                            @foreach ($fans as $fan)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                        <div class="featured-post1">
                                           <a data-ajax="false" href="{{ action('ProfileController@getShow', $fan->id)}}">
                                            <figure>
                                              <div class="post-img-boxed center-block">
                                               @if(isset($fan->profilePhoto->image))
                               {{HTML::image($fan->profilePhoto->image, $fan->username,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/user.jpg','thumbnail',array('width' => 100 , 'height' => 100, 'class'=>'center-block'))}}
                               @endif
                                               </div>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@getShow', $fan->username, array('id'=>$fan->id),
                                                array('class'=>'', 'data-ajax'=>'false'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <!--<li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                                <li  data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                                <li><i class="fa fa-clock-o"></i> {{$fan->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
							
                            @endforeach
                            @endif 
                             {{ $fans-> links() }}
                           
							
                        </div>
                       
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-xs-12 padding-0 sidebar">
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
                        <!-- Featured Uploads-->
              </div>
          </div>
        </div>
        </div>    
    @stop
    @section('script')
       
    @stop
    