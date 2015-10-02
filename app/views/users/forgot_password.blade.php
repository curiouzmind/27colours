@extends('layout.master')
@section('title')
        <title>Login | 27Colours</title>
    @stop
    @section('css-links')
        <link rel="stylesheet" href="{{asset('plugins/jquery.mobile-1.4.5/jquery.mobile-1.4.5.css')}}">
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
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li><a data-ajax="false" href="/galleries"><i class=""></i> Pictures</a></li>
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
            <a data-ajax="false" href="/" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="/songs" class="btn btn-danger-reverse">Songs <i class="fa fa-music"></i></a>
        </div>
       </div>
      </div>
     </div>
    </div>

    <div id="login" class="container">
        <div class="form-padding">
            <div class="login center-block">

    <form data-ajax="false" method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">       
        <div class="text-center">
            <h1 class="">Forgot Password</h1>
        </div>
            <div class="form-group">
                <div class="">
                    <input required class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}"><br>
                    <p class="">
                        <input class="btn btn-primary btn-block" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
                    </p>
                </div>
            </div>
            @if (Session::get('error'))
                <div class="alert alert-error alert-danger" role="alert">{{{ Session::get('error') }}}</div>
            @endif

            @if (Session::get('notice'))
                <div class="alert alert-info" role="alert">{{{ Session::get('notice') }}}</div>
            @endif
    </form>
    </div>
  </div>
</div>
@stop
