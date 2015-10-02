@extends('layout.master')
     @section('title')
        <title>Music Upload | 27Colours</title>
     @stop
     @section('css-links')
        <link rel="stylesheet" href="{{asset('css/fileinput.min.css')}}">
  	<link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
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
                        <li class="active"><a data-ajax="false" href="/songs"><i class=""></i> Music</a></li>
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li><a data-ajax="false" href="/galleries"><i class=""></i> Gallery</a></li>
                        <li><a data-ajax="false" href="/talents"><i class=""></i> Talents</a></li>
                    </ul>
                </div> <!-- ./ menu navigation -->
    @stop
    @section('content') 
    <!-- breadcrumbs -->
    <div class="breadcrumb">
     <div class="overlay-img">
      <div class="row padding-5">
       <div class="container">
        <div class="btn-group pull-left margin-10-0">
            <a data-ajax="false" href="{{ action('ProfileController@getIndex')}}" class="btn btn-default"><i class="fa fa-user"></i></a>
            <span class="btn btn-danger-reverse"><i class="fa fa-plus-square"></i> Add Song <i class="fa fa-music"></i></span>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- upload form -->

    <div id="edit-profile" class="">
        <div class="container-fluid padding-2px">
            <div class="col-md-7 center-block padding-2px" style="float:none;">

               <div class="panel panel-default">
                    <div class="panel-heading">
                      <h2 class="section-heading text-center"><i class="fa fa-plus-square"></i> Add Song
                        <i class="fa fa-music"></i></h2>
                      @if (Session::get('errors'))
                      <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <a name="error">{{{ Session::get('errors') }}}</a></div>
                      @endif
                      @if (Session::get('notices'))
                      <div class="alert alert-warning alert-dismissible fade in">
                        <a name="notice">{{{ Session::get('notices') }}}</a></div>
                      @endif
                    </div>

			<div class="panel-body">
				<form role="form" id="song-upload" method="post" enctype="multipart/form-data" action="create2">
					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					<div class="form-group">
						<input id="song" name="song" type="file" accept="audio/*"/>
   					</div>
                                        <!-- divider -->
                                           <div class="divider-small"><h2>OR</h2></div>
                                         <!-- souldcloud link upload -->
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-soundcloud"></i></span> -->
                            <input type="text" class="form-control" id="soundcloud" name="soundcloud" placeholder="Add Soundcloud Url"/>  
                        </div>
                        <p class="help-block">*Copy the "Embed" link of your track from Soundcloud and paste here. <small class="hidden-xs hidden-sm"> e.g 
                            'iframe width="100%" height="450" scrolling="no" frameborder="no" 
                                src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks...'</small>
                        </p>
                        </div>
					
				<!-- optional youtube upload -->
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-youtube"></i></span> -->
                            <input data-ajax="false" type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Video"/>
                        </div> 
                        <p class="help-block">Add YouTube Link For Music Video (Optional)</p>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i> <span class="hidden-xs">Song Title</span></span> -->
                            <input data-ajax="false" required type="text" class="form-control" id="title" 
                                name="title" placeholder="Enter Song Title"/>
                        </div>
                        <p class="help-block">*Required</p>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i> <span class="hidden-xs"> Description</span></span> -->
                            <textarea data-ajax="false" type="text" rows="3" class="form-control" id="description" 
                                name="description" placeholder="Enter Description"></textarea>
                        </div>
                        </div>
					<div class="form-group">
                          <div class="row">
                            <!-- album art -->
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label for="upld-img" class="control-label">Album Art</label>
                                <input id="image" type="file" name="image"  accept="image/*"/>
                                <p class="help-block">*Required</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-unstyled select">
                                    <li><label for="genre" class="control-label">Genre</label></li>
                                    <li><select data-ajax="false" class="form-control" name="genre" id="genre">
                                        <option>Afrobeat</option>
                                        <option>Gospel</option>
                                        <option>RnB</option>
                                        <option>Hip-hop</option>
                                        <option>highlife</option>
                                        <option>Others</option>
                                        </select>
                                    </li>
                                </ul> 
                            </div> 
                          </div>
                        </div>
				<!-- progress bar -->
                        <!-- <div id="progressbar"></div> -->
                    </div>
                    <div class="panel-footer text-right">
                        <div class="form-group">
                            <div class="">
                                <input class="form-control btn btn-danger btn-block" type="submit" id="submit-btn" value="Upload" />
                            </div><br />
                            <div class="">
                                <a href="/profile" class="btn btn-block btn-default text-center">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./ panel ends -->
				</form>
			</div>
		</div>
	</div>
</div></div>

@stop
@section('script')
   <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
   <script type="text/javascript" src="{{asset('js/fileinput.min.js') }}"></script>
   
 	
<script type="text/javascript">
$(document).ready(function() {
  $("#song").fileinput({
      //  uploadUrl: "create3" // your upload server url
      showUpload: false,
      //  uploadExtraData: function() {
        //    return {
        //        userid: $("#userid").val(),
        //        username: $("#username").val()
      //      };
     //   }
    });
    
    $("#image").fileinput({
      showUpload: false,
     
    });
   });
</script>
@stop