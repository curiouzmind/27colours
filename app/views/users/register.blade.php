<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | 27Colours</title>
            <!-- seo -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing, photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">
    <!-- core css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- plugins css -->
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="http://27colours.com/img/logo.png"/>

    <!-- custom global css -->
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:500,300,700,400' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding-top:0;">
<nav class="navbar navbar-default" role="navigation" style="margin: 0;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="27Colours" height=40px width="auto">
            </a>
        </div>
    </div>
</nav>
<div class="login" style="height: 500px">
    <div class="auth-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p><span class="glyphicon glyphicon-lock"></span> Sign Up</p>
                            @if (Session::get('error'))
                                <div class="alert alert-error alert-danger m0" role="alert">{{{ Session::get('error') }}}</div>
                            @endif

                            @if (Session::get('notice'))
                                <div class="alert alert-info m0"  role="alert">{{{ Session::get('notice') }}}</div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
                                <input type="hidden" class="form-control" name="_token" value="{{{ Session::getToken() }}}">
                                <div class="form-group">
                                    <label for="inputUsername3" class="col-sm-3 control-label">
                                        Username</label>
                                    <div class="col-sm-9">
                                        <input type="username" class="form-control" id="inputUsername3" required
                                               placeholder="{{{ Lang::get('confide::confide.username') }}}"
                                               name="username" value="{{{ Input::old('username') }}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">
                                        Email</label>
                                    <div class="col-sm-9">
                                        <input required type="email" class="form-control"
                                               placeholder="{{{ Lang::get('confide::confide.e_mail') }}}"
                                               name="email" id="email" value="{{{ Input::old('email') }}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword3" required
                                               placeholder="{{{ Lang::get('confide::confide.password') }}}" name="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-sm-3 control-label">
                                        Retype Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required
                                               placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}"
                                               name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" id="remember" value="1"/>
                                                <p>I agree with the <a target="_blank" href="#">Terms and Conditions</a></p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            {{{ Lang::get('confide::confide.signup.submit') }}}</button>
                                        <button type="reset" class="btn btn-default btn-sm">
                                            Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            Already registered? Click {{ HTML::linkRoute('login', 'here' )}} to sign in.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center footer2">
                <ul class="list-inline socials">
                    <li><a class="btn btn-facebook" href="https://www.facebook.com/27colours" target="blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn btn-twitter" href="https://twitter.com/27colours" target="blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="btn btn-facebook" href="https://instagram.com/27colours/" target="blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <p>Copyright &copy;
                    <script type="text/javascript">
                        var currentYr = new Date();
                        var insertYr = currentYr.getFullYear();
                        document.write(insertYr);
                    </script>,
                    27Colours - All Rights Reserved.
                </p>
            </div>
        </div>
    </div> <!-- ./ container -->
</footer>
<!-- jQuery Version 2.1.3 -->
<script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>