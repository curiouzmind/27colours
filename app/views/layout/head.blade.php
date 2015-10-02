<header class="menu-bar">
    <!-- menu -->
    <nav id="" class="nav navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
<div class="navbar-header border-bottom">
                    <!-- logo -->
                    <a data-ajax="false" class="navbar-brand" href="/">
                        <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                
                  <button type="button" class="navbar-toggle" data-toggle="collapse" 
                  style="padding:10px;margin-right:30px;" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                   @yield('menu')
                <!-- call to action -->
                     <div id="header-links" class="nav navbar-nav navbar-right col-md-4-offset" style="margin:0px -15px;padding:0;">
                    <!-- <span class="search" style="width:250px;">
                            
                                   <form>
<select id="search" name="search">
<option value="">Search ...</option>
</select>
</form>
                        </span> -->
                        <!-- check if logged in -->
                        @if(Auth::check())
                        <span class="login-thumb" style="padding: 0;margin:0px -15px;">
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-icon="chevron" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <!-- <span class="caret"></span> -->
                                    {{HTML::image(isset(Auth::user()->profilePhoto->image) ? 
                                        Auth::user()->profilePhoto->image : 'img/user.jpg', 
                                        'Profile thumbnail', array( 'class'=>'header-thumb',
                                        'width'=>'38px', 'height'=>'38px', 'style'=>'margin-left:0px;'))}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    @if(Auth::check())
                                        <li><a data-ajax="false" href="/profile"><i class="fa fa-user fa-xs"></i> | View Profile</a></li>                                       
                                        <li><a data-ajax="false" href="/profile/edit"><i class="fa fa-cog fa-xs"></i> | Edit Profile</a></li>
                                        <li><a data-ajax="false" href="/song/upload"><i class="fa fa-music fa-xs"></i> | Add Songs</a></li>
                                        <li><a data-ajax="false" href="/video/upload"><i class="fa fa-video-camera fa-xs"></i> | Add Videos</a></li>
                                        <li><a data-ajax="false" href="/gallery/upload"><i class="fa fa-camera fa-xs"></i> | Add Pictures</a></li>
                                        <li><a data-ajax="false" href="{{action('UsersController@getLogout')}}"><i class="fa fa-power-off fa-xs"></i> | Logout</a></li>
                                    @else
                                        <li>{{ HTML::linkRoute('register', 'Registration', array('class'=>'hidden-xs hidden-sm'))}}</li>
                                        <li>{{ HTML::linkRoute('login', 'Sign In' )}}</li>
                                    @endif 
                                    </ul>
                            </div>
                        </span>
                        @else
                        <!-- CALL TO ACTION UPLOAD-->
                        <span class="header-call-to-action" data-toggle="tooltip" data-placement="bottom" title="Upload">
                          
                          <a href="/users/login" class="btn"><i class="fa fa-upload"></i> <span class="hidden" style="border:none;"> Upload</span></a>
                        </span><!-- END .HEADER-CALL-TO-ACTION -->
                        <span class="header-login" data-toggle="tooltip" data-placement="bottom" title="Login">
                            <a href="/users/login" class="btn"><i class="fa fa-power-off"></i> <span class="hidden" style="border:none;">Sign In</span></a>
                        </span>
                        <!-- HEADER REGISTER -->
                        <span class="header-register" data-toggle="tooltip" data-placement="bottom" title="Sign Up">
                             <a href="/users/register" class="btn"><i class="fa fa-user"></i> <span class="hidden" style="border:none;">Register</span></a>
                        </span> <!-- END .HEADER-REGISTER -->                        
                        @endif
                    </div>
                
                </div> <!-- ./ container -->
    </nav>
</header>