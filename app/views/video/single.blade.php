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
                        <li><a data-ajax="false" href="/song"><i class=""></i> Songs</a></li>
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
            <a href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <span href="/videos" class="btn btn-danger-reverse">Videos <i class="fa fa-video-camera"></i></span>
        </div>
        
       </div>
      </div>
     </div>
    </div>
    <!-- posts -->   
       <!-- section for Video player, Sharing widget, related contents, comment -->
      <div id="section-3a">
       <div class="container padding-2px">
           <div class="row">
               <div class="col-md-8 col-xs-12" style="padding:0;">
                 <div class="post-content">
                   <!-- post-content -->
                   <div class="" style="margin-bottom:10px;">
                            @if( isset($video->youtube))
                            <div class="">
                                <iframe width="100%" height="400px" src="//www.youtube.com/embed/{{$video->youtube}}?rel=0" 
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                            @elseif ( isset($video->video))
                                <div id="wrapper">                                  
                                  <video class="video-js" preload="auto" poster="" data-setup="{}">
                                    <source src="{{asset($video->video)}}" type="video/mp4">
                                    <source src="{{asset($video->video)}}" type="video/webm">
                                  </video>                       
                                </div>
                                @else
                                <p class="text-center alert alert-info"  role="alert"> You added an invalid Video or YouTube link!!! </p>
                                @endif
                   </div>
                   <div class="post-details">
                      <div class="post-page-title">
                        <h2 class="title" style="margin: 5px 0;">{{$video->title}}</h2>
                      </div>
                        <div class="">
                                              {{HTML::image(isset($video->image) ? $video->image : null,'thumbnail',
                                                array('class'=>'post-thumb-img'))}}
                                              <div class="post-thumb-text">
                                                <h2 class="post-title"><i class="fa fa-camera fa-fw"></i> {{$video->title}}</h2>
                                                <p class="post-uploader"><i class="fa fa-user fa-fw"></i> {{$video->user->username}}</p>  
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
                   <div class="post-ad hidden" style="padding:10px;">
                       
                   </div>
                   <!-- related posts -->
                   <div class="related-posts">
                       <h3 class="text-left post-section-title"><span>Related Videos</span></h3>
                        <div id="owl-demo" class="owl-carousel"> 
                            @if ($reVideos->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> There are no Related Videos!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </p>
                            @else
                            @foreach ($reVideos as $reVideo)
                                
                        @endforeach
                        @endif 
                        </div>
                    </div>
                   <!-- comments section -->
                   <div class="post-comments" style="padding:10px;">
                        @include('discomment')
                   </div>
               </div>
               <div class="col-md-4 col-xs-12 sidebar">
                  @include('video.video-sidebar') 
               </div>
           </div>
       </div>
      </div>
    @stop
    @section('script')
       
    @stop