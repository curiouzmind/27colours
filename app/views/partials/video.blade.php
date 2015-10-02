<!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($videos->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Videos!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post2">
                                      <a href="{{ action('VideoController@getShow', array('id'=> $video->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            @if($video->image != '')
                                 {{HTML::image($video->image, $video->title,array('class'=>'img-responsive thumbnail center-block'))}}
                                @else
                                {{HTML::image('img/video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure> </a>
                                        <h4 class="post-title userinfo-details ui-icon-video">
                                            <i class="fa fa-video-camera"></i> {{ HTML::linkAction('VideoController@getShow', 
                                            $video->title, array('id'=> $video->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $video->user->username, array('id'=>$video->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                        </ul>
                                     
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <!-- pagination -->
                        <br />
                        {{ $videos->links() }}