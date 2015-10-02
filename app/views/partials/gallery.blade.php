<!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($galleries->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Pictures!</p>
                        @else
                        <!-- Fetch Pictures -->
							                         @foreach ($galleries as $gallery)
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post3">
                                     <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            {{ HTML::image($gallery->image, $gallery->caption, array('class'=>'img-responsive thumbnail center-block')) }}
                                          </div>
                                        </figure></a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera"></i> {{ HTML::linkAction('GalleryController@getShow', 
                                            $gallery->caption, array('id'=> $gallery->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $gallery->user->username, array('id'=>$gallery->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                        </ul>
                                      </a>
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                       
                        <!-- pagination -->
                        {{$galleries->links()}}