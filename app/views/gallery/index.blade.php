@extends('layout.master')
     @section('title')
        <title>Gallery | 27Colours</title>
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
                        <li class="active"><a data-ajax="false" href="/galleries"><i class=""></i> Gallery</a></li>
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
            <a href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="/galleries" class="btn btn-danger-reverse">Gallery <i class="fa fa-camera"></i></a>
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
                            <a class="" href="#modelling" data-toggle="tab">Modelling</a>
                        </li>
                        <li>
                            <a class="" href="#others" data-toggle="tab">Others</a>
                        </li>
                        <li>
                            <a  data-toggle="tooltip" data-placement="right" title="Coming soon" class="" href="#" data-toggle="tab">More Categories</a>
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
                            @if ($modelling->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no pictures!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($modelling as $model)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('GalleryController@getShow', array('id'=> $model->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            {{ HTML::image($model->image, $model->title, array('class'=>'img-responsive thumbnail center-block')) }}
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera"></i> {{ HTML::linkAction('GalleryController@getShow', 
                                            $model->caption, array('id'=> $model->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $model->user->username, array('id'=>$model->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                            <!--<li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$model->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{$modelling-> links() }}
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
                                <p class="text-center alert alert-info"  role="alert"> There are no pictures!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($others as $other)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a data-ajax="false" href="{{ action('GalleryController@getShow', array('id'=> $other->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            {{ HTML::image($other->image, $other->title, array('class'=>'img-responsive thumbnail center-block')) }}
                                          </div>
                                        </figure>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera"></i> {{ HTML::linkAction('GalleryController@getShow', 
                                            $other->caption, array('id'=> $other->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $other->user->username, array('id'=>$other->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                           <!-- <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>-->
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$other->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                            {{$others-> links() }}
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-xs-12 padding-0 sidebar">
                  @include('gallery.gallery-sidebar')
              </div>
          </div> <!-- ./ row ends -->            
        </div>
    </div>       
    @stop
     @section('script')
       
    @stop