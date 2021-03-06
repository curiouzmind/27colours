@extends('layout.master')
    @section('title')
        <title>Tracks | 27Colours</title>
    @stop
    @section('content')
        <!-- page header -->
        <div class="page-banner well">
            <div class="overlay-bg text-center">
            <div class="container">
                <h2 class="text-uppercase bold">Tracks</h2>
                <h4 class="text-capitalize">Browse collections of tracks.</h4>
            </div>
        </div>
        </div>
        <!-- posts -->
        <div class="">
            {{--categories nav-tabs bar --}}
            <div class="row categories-bar well">
                <div class="col-md-12">
                  <div class="container">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="active"><a class="" href="#afrobeat" data-toggle="tab">Afrobeat</a></li>
                        <li><a class="" href="#hiphop" data-toggle="tab">Hiphop</a></li>
                        <li><a class="" href="#rnb" data-toggle="tab">RnB</a></li>
                        <li><a class="" href="#gospel" data-toggle="tab">Gospel</a></li>
                        <li><a class="" href="#highlife" data-toggle="tab">Highlife</a></li>
                        <li><a class="" href="#others" data-toggle="tab">Others</a></li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Errors, Alerts -->
                    @if (Session::get('errors'))
                        <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                    @endif
                    @if (Session::get('notices'))
                        <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                    @endif
                    {{--tab-content--}}
                    <div class="col-md-8">
                        <div class="tab-content">
                            <!-- afrobeats -->
                            <div class="tab-pane fade active in" id="afrobeat">
                                @if ($afrobeats->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                @else
                                <!-- Fetch Songs -->
                                @foreach ($afrobeats as $afrobeat)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if($afrobeat->image!=='')
                                                    {{HTML::image($afrobeat->image, $afrobeat->title,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-music fa-fw"></i>
                                                        <a class="" href="{{ action('SongController@getShow', array('id'=> $afrobeat->id))}}">{{$afrobeat->title}}</a>
                                                    </h4>
                                                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                        <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$afrobeat->user->id))}}">{{$afrobeat->user->username}}</a>
                                                    </p>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$afrobeat->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                 {{$afrobeats -> links() }}
                            </div>
                            <!-- hiphop -->
                            <div class="tab-pane fade in" id="hiphop">
                                @if ($hips->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no tracks here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($hips as $hip)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if($hip->image!=='')
                                                    {{HTML::image($hip->image, $hip->title,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-music fa-fw"></i>
                                                        <a class="" href="{{ action('SongController@getShow', array('id'=> $hip->id))}}">{{$hip->title}}</a>
                                                    </h4>
                                                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                        <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$hip->user->id))}}">{{$hip->user->username}}</a>
                                                    </p>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$hip->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$hips -> links() }}
                            </div>
                            <!-- rnb -->
                            <div class="tab-pane fade in" id="rnb">
                                @if ($rnbs->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($rnbs as $rnb)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($rnb->image!=='')
                                                {{HTML::image($rnb->image, $rnb->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-music fa-fw"></i>
                                                    <a class="" href="{{ action('SongController@getShow', array('id'=> $rnb->id))}}">{{$rnb->title}}</a>
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$rnb->user->id))}}">{{$rnb->user->username}}</a>
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$rnb->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$rnbs -> links() }}
                            </div>
                            <!-- gospels -->
                            <div class="tab-pane fade in" id="gospel">
                                @if ($gospels->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($gospels as $gospel)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if($gospel->image!=='')
                                                    {{HTML::image($gospel->image, $gospel->title,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-music fa-fw"></i>
                                                        <a class="" href="{{ action('SongController@getShow', array('id'=> $gospel->id))}}">{{$gospel->title}}</a>
                                                    </h4>
                                                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                        <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$gospel->user->id))}}">{{$gospel->user->username}}</a>
                                                    </p>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$gospel->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$gospels -> links() }}
                            </div>
                            <!-- highlifes -->
                            <div class="tab-pane fade in" id="highlife">
                                @if ($highlifes->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($highlifes as $highlife)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if($highlife->image!=='')
                                                    {{HTML::image($highlife->image, $highlife->title,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-music fa-fw"></i>
                                                        <a class="" href="{{ action('SongController@getShow', array('id'=> $highlife->id))}}">{{$highlife->title}}</a>
                                                    </h4>
                                                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                        <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$highlife->user->id))}}">{{$highlife->user->username}}</a>
                                                    </p>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$highlife->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$highlifes -> links() }}
                            </div>
                            <!-- others -->
                            <div class="tab-pane fade in" id="others">
                                @if ($others->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($others as $other)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if($other->image!=='')
                                                    {{HTML::image($other->image, $other->title,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-music fa-fw"></i>
                                                        <a class="" href="{{ action('SongController@getShow', array('id'=> $other->id))}}">{{$other->title}}</a>
                                                    </h4>
                                                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                        <a class="" href="{{ action('ProfileController@getShow',
                                                    array('id'=>$other->user->id))}}">{{$other->user->username}}</a>
                                                    </p>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$other->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$others -> links() }}
                            </div>
                    </div>
                    </div>
                    {{--sidebar--}}
                    <div class="col-md-4">
                      @include('song.song-sidebar')
                    </div>
                </div> <!-- ./ row ends -->
            </div>
        </div>
    @stop