@extends('layout.master')
     @section('title')
        <title>Upload Video | 27Colours</title>
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
                        <li><a data-ajax="false" href="/songs"><i class=""></i> Music</a></li>
                        <li class="active"><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
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
            <a data-ajax="false" href="/profile" class="btn btn-default"><i class="fa fa-user"></i></a>
            <span class="btn btn-danger-reverse"><i class="fa fa-plus-square"></i> Add Video <i class="fa fa-video-camera"></i></span>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- upload form -->
      <div id="edit-profile" class="">
        <div class="container-fluid padding-2px">
            <div class="col-md-7 center-block padding-0" style="float:none;">
              <form data-ajax="false" class="form-upload margin-0" id="vid-upload" 
                enctype="multipart/form-data" method="post" action="/video/create">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h2 class="section-heading text-center"><i class="fa fa-plus-square"></i> Add Video
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
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-desktop"></i></span> -->
                            <input data-ajax="false" type="file" id="video" name="video" accept="video/*" 
                                class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-upload">
                        </div>
                        <p class="help-block">*Maximum of 10 uploads | *Only Mp4/WebM/Ogg formats allowed</p>
                        </div>
                        <!-- divider -->
                        <div class="divider-small"><h2>OR</h2></div>
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-youtube"></i></span> -->
                            <input data-ajax="false" type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Video"/>  
                        </div>
                        <p class="help-block">*Copy the "Embed" link of you video from Youtube and paste here. <small class="hidden-xs hidden-sm"> e.g 
                            'iframe width="560" height="315" src="https://www.youtube.com/embed/xzRXKlgq7zs" 
                            frameborder="0" allowfullscreen...'</small>
                        </p>
                        </div>
                        
                        <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon"><i class="fa fa-">Video Title</i></span> -->
                            <input data-ajax="false" required type="text" class="form-control" id="title" 
                                name="title" placeholder="Enter Video Title"/>
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
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="upld-img" class="control-label">Album Art</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;">
                                {{ HTML::image('img/user.jpg','Album Art', array('width'=>'150px', 'max-height'=>'150px'))}}</div>
                                <div><span class="btn btn-default btn-sm btn-file"><span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span><input data-ajax="false" type="file" name="image" id="image" accept="image/*"/></span>
                                <a data-ajax="false" href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div></div> 
                                <p class="help-block">*Required</p>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <ul class="list-unstyled select">
                                    <li><label for="genre" class="control-label">Genre</label></li>
                                    <li><select data-ajax="false" class="form-control" name="genre" id="genre">
                                        <option>Music video</option>
                                        <option>Comedy</option>
                                        <option>Dance</option>
                                        </select>
                                    </li>
                                </ul> 
                            </div> 
                          </div>
                        </div>
                        <!-- progress bar -->
                       <!--  <div id="progressbar"></div> -->
                    </div>
                    <div class="panel-footer text-right">
                        <div class="ui-grid-a">
                            <div class="ui-block-a">
                                <input data-ajax="false" class="ui-btn ui-shadow ui-corner-all" type="submit" id="submit-btn" value="Upload" />
                            </div>
                            <div class="ui-block-b">
                                <a data-ajax="false" href="/profile" data-rel="back" class="ui-btn ui-shadow ui-corner-all">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./ panel ends -->
              </form>
            </div>
        </div>
      </div>
    @stop