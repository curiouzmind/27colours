@extends('layout.master')
    @section('title')
        <title>Home | 27Colours</title>
    @stop
    
    @section('description')
    Looking for the next singing, dancing and modelling talents
    @section('menu')
       <!-- menu navigation -->
                <div class="collapse navbar-collapse col-md-8" id="navbar-collapse-1">                    
                    
                    <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a data-ajax="false" href="/">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a data-ajax="false" href="/song"><i class=""></i> Music</a></li>
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li><a data-ajax="false" href="/galleries"><i class=""></i> Gallery</a></li>
                        <li><a data-ajax="false" href="/talents"><i class=""></i> Talents</a></li>
                    </ul>
                </div> <!-- ./ menu navigation -->
    @stop
    @section('content')

    <!-- carousel full/page-height -->
    <div id="section-2" class="home-slider">
        <!-- Banner Slider -->
      <section id="banner">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="container">
                        <h1>GOT TALENT? GET DISCOVERED.</h1>
                        <p>27 Colours<sup>&reg;</sup> is where talent lives and potential gets transformed into profit. Become a part of this growing community of budding and award winning artistes and industry players looking for the next prodigy. </p>
                        <a data-ajax="false" href="users/register" class="action-button">Join Now</a>
                    </div>
                </li> <!-- end slide 1 -->
                <li>
                    <div class="container">
                        <h1>CONNECT AND GROW.</h1>
                        <p>Looking to meet with that big producer or manager, find them here.  </p>
                        <a data-ajax="false" href="users/register" class="action-button">Join Now</a>
                    </div>
                </li> <!-- end slide 2 -->
                <li>
                    <div class="container">
                        <h1>YOUR WORLD, YOUR WAY.</h1>
                        <p>Create, upload and manage your content, your way. Invite your friends and fans through your favourite social media channels to view your content.</p>
                        <a data-ajax="false" href="users/register" class="action-button">Join Now</a>
                    </div>
                </li> <!-- end slide 3 -->
            </ul>
        </div>
      </section>
    </div>
    <!-- call-to-action -->
    <div id="section-3" class="call-to-action">
        <div class="container">
        <!-- welcome message -->
            <div class="welcome-message">
                <h2 class="section-heading ">Welcome to 27 Colours<sup>&reg;</sup></h2>
                <p>Share your latest creation with everyone - <span>music, videos, pictures, comedy</span> and <span>dance</span> skits. <br>The world is waiting to meet you. </p>
            </div> <!-- end welcome message -->
        <div class="row square-tabs" style="margin: 40px 0;">
            <div class="col-md-5 col-sm-5">
                <h4 class="text-center">New User?</h4>
                <a data-ajax="false" href="{{ action('UsersController@getCreate')}}" 
                    class="btn btn-default btn-block btn-lg">
                    Create a Profile <i class="fa fa-user"></i></a>
            </div>
            <div class="divider col-md-2"><h2>OR</h2></div>
            <div class="col-md-5 col-sm-5">
                <h4 class="text-center">Just a Fan?</h4>
                <a data-ajax="false" href="/song" 
                    class="btn btn-default btn-block btn-lg">Listen to Songs <i class="fa fa-music fa-fw"></i></a>
                <a data-ajax="false" href="/videos" 
                    class="btn btn-default btn-block btn-lg">Watch Videos <i class="fa fa-video-camera fa-fw"></i></a>
                <a data-ajax="false" href="/galleries" 
                    class="btn btn-default btn-block btn-lg">View Pictures <i class="fa fa-camera fa-fw"></i></a>
            </div>
        </div>
        </div> <!-- ./ container ends -->
    </div>
    <!-- featured posts -->
	<div id="section-3a" class="featured-posts">
    
        <div class="container">
            
            <div class="featured-tab">
                <h2 class="section-heading text-left">Featured</h2>
                <ul class="nav nav-pills nav-stacked col-md-3 padding-2px square-tabs">
                    <li class="active">
                        <a class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-audio" 
                            href="#songs" data-toggle="tab"><i class="fa fa-music fa-fw"></i> Songs</a>
                    </li>
                    <li>
                        <a class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-video"
                         href="#videos" data-toggle="tab"><i class="fa fa-video-camera fa-fw"></i> Videos</a>
                    </li>
                    <li>
                        <a class="ui-btn"
                         href="#pictures" data-toggle="tab"><i class="fa fa-camera fa-fw"></i>  Pictures</a>
                    </li>
                </ul>
                <div class="tab-content col-md-9 padding-2px my-page">
                    <!-- featured songs -->
                    <div class="tab-pane fade active in" id="songs">
						<div class="marker">
							@include('partials.song')
                       </div>
                    </div>
                    <!-- featured videos -->
                    <div class="tab-pane fade in" id="videos">
						<div class="marker">
                        @include('partials.video') 
                        </div>
                    </div>
                     <!-- featured pictures -->
                    <div class="tab-pane fade in" id="pictures">
					<div class="marker">
						@include('partials.gallery') 
					   </div>
						
                    </div>
                </div>
            </div>
        </div>
   
	 </div>
    <!-- Global exposure -->
    <div id="section-4" class="our-partners">
        <div id="demo">
            <div class="container">
                <h2 class="text-center section-heading">Let's expose you to the World <i class="fa fa-globe"></i></h2>   
              <div class="row">
                <div class="span12">
                  <div id="owl-demo" class="owl-carousel"> 
                    <div class="item"><img src="{{asset('img/music-labels/sonymusiclogo.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/soundcity.png')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/starboy.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/Trace_Urban.png')}}" alt=""></div>               
                    <div class="item"><img src="{{asset('img/music-labels/1.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/2.png')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/11.png')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/12.png')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/Bet_logo.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/channelO.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/chocolate.png')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/eme.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/HKN1.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/Konvict_Muzik_Logo.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/mavin.jpeg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/music-labels/mtvbase.png')}}" alt=""></div>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    @stop
    
 @section('scripts')
    <script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getRecords(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {          
            getRecords($(this).attr('href').split('page=')[1]);
            e.preventDefault();
           
           
        });
    });
    function getRecords(page) {
        $.ajax({
            url : "{{ URL::to('/ajax/posts') }}?page=" + page,
            dataType: "json",
            type: "GET",
        }).done(function (data) {
           // if data= 
           $('.marker').html(data);
          //  console.log(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
     </script>    
 @stop