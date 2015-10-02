@extends('layout.master')
@section('title')
        <title>Register | 27Colours</title>
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
            <a href="" class="btn btn-danger-reverse">Register </a>
        </div>
       </div>
      </div>
     </div>
    </div>

    <div id="login" class="container">
        <div class="form-padding">
            <div class="register center-block">
                <form data-ajax="false" role="form" method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <div class="text-center">
                        <header>
                            <h2 class="margin0">Register</h2>
                        </header>
                        <div class="list-inline text-center margin-bottom-10">
                            <a class="btn rounded btn-facebook btn-block hidden" data-original-title="Facebook" 
                                href="{{action('HomeController@loginWithFacebook')}}"><i class="fa fa-facebook"></i> Facebook</a>
                            <a class="btn rounded btn-youtube btn-youtube-inversed hidden" data-original-title="Google"
                                href="{{action('HomeController@loginWithGoogle')}}"><i class="fa fa-google"></i> Google</a>
                        </div>
                        <br><br>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input required type="text" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.username') }}}" 
                            name="username" id="username" value="{{{ Input::old('username') }}}">
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required type="email" class="form-control" 
                        placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" 
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
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input required type="password" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" 
                            name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-12">
                         <label for="remember">
                            <input type="checkbox" name="remember" id="remember" value="1">
                            <p>I read have the <a target="_blank" href="#">Terms and Conditions</a></p>
                         </label> 
                       </div>
                    </div>
                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger" role="alert">
                            @if (is_array(Session::get('error')))
                                {{ head(Session::get('error')) }}
                            @endif
                        </div>
                    @endif
                    @if (Session::get('notice'))
                        <div class="alert alert-info" role="alert">{{ Session::get('notice') }}</div>
                    @endif
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">
                        {{{ Lang::get('confide::confide.signup.submit') }}}</button>
                      </div>
                    </div> 
                  <br>
                    <p>Already registered? Click {{ HTML::linkRoute('login', 'here' )}} to sign in.</p>
                </form>
            </div>
        </div>
    </div>
@stop