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
    <div id="section-3a">
        <div class="container padding-2px">
          <div class="row">
              <div class="col-md-8 col-xs-12" style="padding:0;">
                   <!-- post-content -->
                   <div class="post-content">
                       <div class="">
                            @if( isset($song->soundcloud))
                            <div class="">
                                <iframe width="100%" height="100px" scrolling="no" frameborder="no"
                                 src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$song->soundcloud}}&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false">
                                </iframe>
                            </div>
                            @elseif ( isset($song->song))
                            <div id="wrapper">
                                <audio class="audioplayer" preload="auto" controls style="width: 100%; height:50px; margin-top:5px;">
                                    <source src="{{asset($song->song)}}" type="audio/mp3"> <!-- .mp3 -->
                                </audio>                        
                            </div>
                                @else
                                <p class="text-center alert alert-info"  role="alert"> You added an invalid Audio track/ soundcloud link!!! </p>
                                @endif
                       </div>
                       <div class="post-details">
                          <div class="post-page-title">
                            <h2 class="title" style="margin: 5px 0;">{{$song->title}}</h2>
                          </div>
                          <div class="">
                            @if($song->image!=='')
                               {{HTML::image($song->image, $song->title,array('class'=>'img-responsive pull-left center-block','width' => '48px', 'height' => '48px'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => '48px', 'height' => '48px','class'=>'pull-left'))}}
                               @endif
                                              <div class="post-thumb-text">
                                                <h2 class="post-title"><i class="fa fa-music fa-fw"></i> {{$song->title}}</h2>
                                                <p class="post-uploader"><i class="fa fa-user fa-fw"></i> {{$song->user->username}}</p>  
                                                
                                                    <div class="dropdown ui-li-aside text-right"><a id="dLabel" data-target="#" class="btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="">Share</span> <i class="fa fa-share-alt fa-lg"></i></a>
                                                    <ul class="dropdown-menu pull-right list-inline" aria-labelledby="dLabel" style="padding: 10px 0 !important;">
                                                         <li><span class='st_facebook_large' displayText='Facebook'></span></li>
<li><span class='st_twitter_large' displayText='Tweet'></span></li>
<li class="hidden"><span class='st_whatsapp_large' displayText='WhatsApp'></span></li>
<li class="hidden"><span class='st_instagram_large' displayText='Instagram Badge' st_username='27colours'></span></li>
<li><span class='st_plusone_large' displayText='Google +1'></span></li>
  </ul>
</div>
                              </div>                     
                                              </div>
                       </div>
                   </div>
                   <!-- Post AD -->
                   <div class="post-ad hidden">
                       
                   </div>
                   <!-- related posts -->
                   <div class="related-posts">
                       <h3 class="text-left post-section-title"><span>Related Songs</span></h3>
                        <div id="owl-demo" class="owl-carousel"> 
                            
                        </div>
                    </div>
                   <!-- comments section -->
                   <div class="post-comments">
                        @include('discomment')
                   </div>
              </div>
              <div class="col-md-4 col-xs-12 sidebar">
                  @include('song.song-sidebar')
              </div>
          </div>
        </div>
    </div>     
@stop
@section('script')
       
    @stop
    