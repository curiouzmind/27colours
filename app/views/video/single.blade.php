@extends('layout.master')
@section('title')
    <title>{{$video->title}} - {{$video->user->username}} | 27Colours</title>
@stop
@section('css-links')

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
                    @if($video->image!=='')
                        {{HTML::image($video->image, $video->title,array('class'=>'img-responsive center-block','width' => 'auto', 'height' => '100%'))}}
                    @else
                        {{HTML::image('img/video-player-2.PNG','thumbnail',array('width' => '100px', 'height' => '100px', 'style'=>'padding:10px;'))}}
                    @endif
                </div>
                <h2 class="text-uppercase bold"><i class="fa fa-music fa-fw"></i> {{$video->title}}</h2>
                <h4 class="text-capitalize"><i class="fa fa-user fa-fw"></i> {{$video->user->username}}</h4>
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
                        <p class="text-center alert alert-info"  role="alert"> Invalid Video or YouTube link!!! </p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    {{--related tracks--}}
                    <h1 class="related-title">Related Videos</h1>
                    <hr>
                    <div class="owl-carousel">
                        @foreach($reVideos as $reVideo)
                            <div class="item grid-thumbs">
                                <div class="thumbnail">
                                    @if($reVideo->image!=='')
                                        {{HTML::image($reVideo->image, $reVideo->title,array('class'=>'img-responsive group list-group-image'))}}
                                    @else
                                        {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                    @endif
                                    <div class="caption">
                                        <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                            <i class="fa fa-music fa-fw"></i>
                                            <a class="" href="{{ action('VideoController@getShow', array('id'=> $reVideo->id))}}">{{$reVideo->title}}</a>
                                        </h4>
                                        <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                            <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$reVideo->user->id))}}">{{$reVideo->user->username}}</a>
                                        </p>
                                        <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$reVideo->timeago}}</span></p>
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
                    @include('video.video-sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                return $('#popover-content').html();
            }
        });
    </script>
@stop