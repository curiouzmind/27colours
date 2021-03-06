@extends('layout.master')
@section('title')
    <title>{{$song->title}} - {{$song->user->username}} | 27Colours</title>
@stop
@section('css-links')
    <link rel="stylesheet" href="{{asset('/plugins/soundmanager/css/bar-ui.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/soundmanager/css/demo.css')}}">
@stop
@section('header')
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
@stop
@section('content')
            <!-- page header -->
    <div class="page-banner well">
        <div class="overlay-bg text-center">
            <div class="container">
                <div class="thumbnail center-block" style="width: 100px; height: 100px;border-radius:50%;overflow: hidden;">
                    @if($song->image!=='')
                        {{HTML::image($song->image, $song->title,array('class'=>'img-responsive center-block','width' => 'auto', 'height' => '100%'))}}
                    @else
                        {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('width' => '100px', 'height' => '100px', 'style'=>'padding:10px;'))}}
                    @endif
                </div>
                <h2 class="text-uppercase bold"><i class="fa fa-music fa-fw"></i> {{$song->title}}</h2>
                <h4 class="text-capitalize"><i class="fa fa-user fa-fw"></i> {{$song->user->username}}</h4>
            </div>
        </div>
    </div>
    <!-- posts -->
    <div class="">
        {{--categories nav-tabs bar --}}
        <div class="row categories-bar well">
          <div class="col-md-12">
            <div class="container">
                <ul class="list-inline pull-right m5">
                    <li>
                        <a href="{{asset($song->song)}}" download="download" title="Download &quot;{{$song->title}}&quot;"
                           class="btn btn-default text-capitalize"><i class="fa fa-download"></i> Download this track</a>
                    </li>
                    <li>
                        <a data-placement="bottom" data-toggle="popover" data-container="body" data-placement="left" type="button"
                           data-html="true" href="#">Share <i class="fa fa-share-alt"></i>
                        </a>
                        <div id="popover-content" class="hide">
                            <span class='st_facebook_large' displayText='Facebook'></span>
                            <span class='st_twitter_large' displayText='Tweet'></span>
                            <span class='st_googleplus_large' displayText='Google +'></span>
                        </div>
                    </li>
                </ul>
            </div>
          </div>
        </div>
        <div class="container">
            <div class="row">
                {{--player--}}
                <div class="col-md-12">
                    @if( isset($song->soundcloud))
                        <div class="">
                            <iframe width="100%" height="100px" scrolling="no" frameborder="no"
                                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$song->soundcloud}}&amp;color=ff5500&amp;
                                    auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false">
                            </iframe>
                        </div>
                    @elseif ( isset($song->song))
                        <div class="sm2-bar-ui compact full-width playlist-open">
                            <div class="bd sm2-main-controls">
                                <div class="sm2-inline-texture"></div>
                                <div class="sm2-inline-gradient"></div>
                                <div class="sm2-inline-element sm2-button-element">
                                    <div class="sm2-button-bd">
                                        <a href="#play" class="sm2-inline-button play-pause">Play / pause</a>
                                    </div>
                                </div>
                                <div class="sm2-inline-element sm2-inline-status">
                                    <div class="sm2-playlist">
                                        <div class="sm2-playlist-target">
                                            <!-- playlist <ul> + <li> markup will be injected here -->
                                            <!-- if you want default / non-JS content, you can put that here. -->
                                            <noscript><p>JavaScript is required.</p></noscript>
                                        </div>
                                    </div>
                                    <div class="sm2-progress">
                                        <div class="sm2-row">
                                            <div class="sm2-inline-time">0:00</div>
                                            <div class="sm2-progress-bd">
                                                <div class="sm2-progress-track">
                                                    <div class="sm2-progress-bar"></div>
                                                    <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
                                                </div>
                                            </div>
                                            <div class="sm2-inline-duration">0:00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm2-inline-element sm2-button-element sm2-volume">
                                    <div class="sm2-button-bd">
                                        <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
                                        <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
                                    </div>
                                </div>
                                <div class="sm2-inline-element sm2-button-element">
                                    <div class="sm2-button-bd">
                                        <a href="#repeat" title="Repeat track" class="sm2-inline-button repeat">&infin; repeat</a>
                                    </div>
                                </div>
                                <div class="sm2-inline-element sm2-button-element sm2-menu">
                                    <div class="sm2-button-bd">
                                        <a href="#menu" class="sm2-inline-button menu">menu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="bd sm2-playlist-drawer sm2-element">
                                <div class="sm2-inline-texture">
                                    <div class="sm2-box-shadow"></div>
                                </div>
                                <!-- playlist content is mirrored here -->
                                <div class="sm2-playlist-wrapper">
                                    <ul class="sm2-playlist-bd">
                                        <!-- item with "download" link -->
                                        <li>
                                            <div class="sm2-row">
                                                <div class="sm2-col sm2-wide">
                                                    <a class="text-capitalize" href="{{asset($song->song)}}"><b>{{$song->title}}</b> - {{$song->user->username}}
                                                        <span class="label">{{$song->genre}}</span></a>
                                                </div>
                                                <div class="sm2-col">
                                                    <a href="{{asset($song->song)}}" download="download" title="Download &quot;{{$song->title}}&quot;"
                                                       class="sm2-icon sm2-music sm2-exclude">Download this track</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center alert alert-info"  role="alert"> Oops! The track seems to be invalid. </p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    {{--related tracks--}}
                    <h1 class="related-title">Related Tracks</h1>
                    <hr>
                    <div class="owl-carousel">
                        @foreach($reSongs as $song)
                            <div class="item grid-thumbs">
                                <div class="thumbnail">
                                    @if($song->image!=='')
                                        {{HTML::image($song->image, $song->title,array('class'=>'img-responsive group list-group-image'))}}
                                    @else
                                        {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image','style'=>'padding:10px;'))}}
                                    @endif
                                    <div class="caption">
                                        <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                            <i class="fa fa-music fa-fw"></i>
                                            <a class="" href="{{ action('SongController@getShow', array('id'=> $song->id))}}">{{$song->title}}</a>
                                        </h4>
                                        <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                            <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$song->user->id))}}">{{$song->user->username}}</a>
                                        </p>
                                        <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$song->timeago}}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--comments--}}
                    <div class="post-comments">
                        @include('discomment')
                    </div>
                </div>
                <div class="col-md-4">
                    {{--sidebar--}}
                    @include('song.song-sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('plugins/soundmanager/script/soundmanager2.js')}}"></script>
    <script src="{{asset('plugins/soundmanager/script/bar-ui.js')}}"></script>
    <script src="{{asset('plugins/soundmanager/script/demo.js')}}"></script>
    <script>
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                return $('#popover-content').html();
            }
        });
    </script>
    <script>
        soundManager.setup({
            url: 'plugins/soundmanager/swf/',
            onready: function() {
                var mySound = soundManager.createSound({
                    id: 'aSound',
                    url: '{{asset($song->song)}}'
                });
//                mySound.play();
            },
            ontimeout: function() {
                // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
            }
        });
    </script>
@stop