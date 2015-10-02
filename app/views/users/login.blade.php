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
                <form data-ajax="false" role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                    <input type="hidden" class="form-control" name="_token" value="{{{ Session::getToken() }}}">
                    <div class="text-center">
                        <header>
                            <h2 class="margin0">Sign in</h2>
                        </header>
                        <div class="list-inline text-center margin-bottom-10">
                            <a class="btn btn-block rounded btn-facebook hidden" data-original-title="Facebook"
                                href='/fbauth'><i class="fa fa-facebook"></i> Facebook</a>
                            <a class="btn rounded btn-default btn-google hidden" data-original-title="Google"
                                href="{{action('HomeController@loginWithGoogle')}}"><i class="fa fa-google"></i> Google</a>
                        </div>
                        <br><br>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required type="text" class="form-control" 
                                placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" 
                                name="email" id="email" value="{{{ Input::old('email') }}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input required type="password" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.password') }}}" name="password" id="password">
                      </div>
                    </div>
                    <p class="help-block">
                        <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                    </p>
                    <div class="form-group">
                       <div class="col-sm-12">
                        <input type="hidden" name="remember" value="0">
                        <div class="checkbox">
                          <label for="remember">
                            <input type="checkbox" name="remember" id="remember" value="1">
                            {{{ Lang::get('confide::confide.login.remember') }}} 
                          </label>  
                        </div>
                       </div>
                    </div>
                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger" role="alert">{{{ Session::get('error') }}}</div>
                    @endif

                    @if (Session::get('notice'))
                        <div class="alert alert-info"  role="alert">{{{ Session::get('notice') }}}</div>
                    @endif  
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">
                        {{{ Lang::get('confide::confide.login.submit') }}}</button>
                      </div>
                    </div> 
                    <p>Don't have an account? Click {{ HTML::linkRoute('register', 'here', array('class'=>'bold;') )}} to register.</p>
                </form>
            </div>
        </div>
    </div>
@stop


