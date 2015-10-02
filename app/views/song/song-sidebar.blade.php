                        <!-- Celebrity Endorsements -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- Facebook Like box -->
                        <div class="fb-widget">
                          <div class="fb-page" data-href="https://www.facebook.com/27colours" 
                            data-width="250" data-height="250" data-hide-cover="false" 
                            data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/27colours">
                            <a href="https://www.facebook.com/27colours">27 colours</a></blockquote>
                            </div>
                          </div>
                        </div> 
                        <!-- Featured Uploads-->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Featured Songs</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Fetch Songs -->
                        @foreach ($recentSongs as $song)
                            <div class="sidebar-post">
                                            <a class="sidebar-thumb" 
                                                href="{{ action('SongController@getShow', array('id'=> $song->id))}}">
                                                   @if($song->image!=='')
                                                   {{HTML::image($song->image, $song->title,array('class'=>'sidebar-thumb-img'))}}
                                                   @else
                                                    {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('class'=>'sidebar-thumb-img', 'width' => 100 , 'height' => 100))}}
                                                   @endif
                                              <div class="sidebar-thumb-text">
                                                <h2 class="post-title"><i class="fa fa-music fa-fw"></i> {{$song->title}}</h2>
                                                <p class="post-uploader"><i class="fa fa-user fa-fw"></i> {{$song->user->username}}</p>  
                                                <p class="ui-li-aside">{{$song->timeago}}</p>
                                              </div>
                                            </a>
                              </div>
                        @endforeach
                        </div>
                        </div>