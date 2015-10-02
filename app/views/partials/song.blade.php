<!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($songs->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Songs!</p>
                        @else
                        <!-- Fetch Songs -->
                        @foreach ($songs as $song)
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                     <a href="{{action('SongController@getShow', array('id'=> $song->id))}}">
                                     
                                          <div class="post-img-boxed center-block">
                                            @if($song->image!=='')
                               {{HTML::image($song->image, $song->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i> {{ HTML::linkAction('SongController@getShow', $song->title, array('id'=> $song->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li> 
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                    </div>
                            </div>
                        @endforeach
                        @endif 
                        <br />
                        <!-- pagination -->
                        {{ $songs->links() }}