@extends('layout.master')
     @section('title')
        <title>Gallery | 27Colours</title>
     @stop
     @section('css-links')
         <link rel="stylesheet" href="{{asset('plugins/bootstrap-lightbox/bootstrap-lightbox.css')}}">
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
            <span href="/pictures" class="btn btn-danger-reverse">Gallery <i class="fa fa-camera"></i></span>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- posts -->   
    <div id="section-3a" class="featured-posts">
        <div class="container padding-2px">
          <div class="row">
            <div class="col-md-8 col-xs-12">
                <!-- post-content -->
                   <div class="post-content">
                       <div class="post-picture">
                          <a type="button" class="" data-toggle="modal" href="#myModal">
                            {{ HTML::image($gallery->image, $gallery->caption, array('class' => 'popphoto')) }}
                          </a>
                          
                          <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      {{ HTML::image($gallery->image, $gallery->caption, array('class' => '', 'style'=>'')) }}</div>
      
      <div class="modal-footer" style="padding:3px;"><h2 class="text-left"><i class="fa fa-camera fa-fw"></i> {{$gallery->caption}}</h2></div>
    </div>
  </div>
</div>                            
                       </div>
                       <p class="small text-left">*click on or touch picture to enlarge.</p>
                       <div class="post-details">
                           <div class="post-page-title">
                            <h2 class="title" style="margin: 5px 0;">{{$gallery->caption}}</h2>
                          </div>
                          <div class="">
                                              {{HTML::image(isset($gallery->image) ? $gallery->image : null,'thumbnail',
                                                array('class'=>'post-thumb-img'))}}
                                              <div class="post-thumb-text">
                                                <h2 class="post-title"><i class="fa fa-camera fa-fw"></i> {{$gallery->caption}}</h2>
                                                <p class="post-uploader"><i class="fa fa-user fa-fw"></i> {{$gallery->user->username}}</p>  
                                                
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
                       <h3 class="text-left post-section-title"><span>Advertisement</span></h3>
                   </div>
                   <!-- related posts -->
                   <div class="related-posts hidden">
                       <h3 class="text-left post-section-title"><span>Related Pictures</span></h3>
                        <div id="owl-demo" class="owl-carousel"> 
                            
                        </div>
                    </div>
                   <!-- comments section -->
                   <div class="post-comments">
                        @include('discomment')
                   </div> 
            </div>
            <div class="col-md-4 col-xs-12 sidebar">
                @include('gallery.gallery-sidebar')
            </div>
          </div>
        </div>
    </div>     
@stop
@section('script')
       <script src="{{ asset('plugins/bootstrap-lightbox/bootstrap-lightbox.js') }}"></script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    @stop