@extends('layout.master')
     @section('title')
        <title>Upload Photo | 27Colours</title>
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
                        <li><a data-ajax="false" href="/songs"><i class=""></i> Songs</a></li>
                        <li><a data-ajax="false" href="/videos"><i class=""></i> Videos</a></li>
                        <li class="active"><a data-ajax="false" href="/galleries"><i class=""></i> Pictures</a></li>
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
                <span class="btn btn-danger-reverse"><i class="fa fa-plus-square"></i> Add Picture <i class="fa fa-camera"></i></span>
            </div>
           </div>
          </div>
         </div>
        </div>
        <!-- upload form -->
        <div id="photo-upload" class="upload">
        <div class="container-fluid">
            <div class="col-md-5 center-block">
            <form data-ajax="false" files="true" class="form-upload margin-0" id="gallery-upload" 
                enctype="multipart/form-data" method="post" action="/gallery/create2">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Add Profile Photo</h2>
                       <!-- @if (Session::get('errors'))
                        <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                        @endif
                        @if (Session::get('notices'))
                        <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>
                        @endif  -->
                        
                        @if($errors->has())
    			<div id="form-errors">
     			 <p>The following errors have occurred:</p>

      				<ul>
        			@foreach($errors->all() as $error)
        			<div class="alert alert-error alert-danger"><a name="error">
         			 <li>{{ $error }}</li></a></div>
        				@endforeach
     				 </ul>
    				</div><!-- end form-errors -->
    			@endif
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div  data-ajax="false" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;">{{ HTML::image('img/user.jpg','Album Art', 
                            array('width'=>'150px', 'height'=>'150px'))}}</div>
                            <div><span data-ajax="false" class="btn btn-default btn-sm btn-file"><span class="fileinput-new">Select image</span><span  data-ajax="false" class="fileinput-exists">Change</span>{{Form::file('image')}}</span>
                            <a data-ajax="false" href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div class="">
                                <input data-ajax="false" required type="text" class="form-control" id="title" 
                                    name="caption" placeholder="Caption"/>
                                <p class="help-block">*Required</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label">Choose Category</label>
                            <select data-ajax="false" class="form-control" name="genre" id="genre">
                                        <option>Modelling</option>
                                        <option>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="ui-grid-a">
                            <div class="ui-block-a">
                                <input data-ajax="false" class="ui-btn ui-shadow ui-corner-all" type="submit" id="submit-btn" value="Upload" />
                            </div>
                            <div class="ui-block-b">
                                <a data-ajax="false" href="" data-rel="back" class="ui-btn ui-btn-danger ui-shadow ui-corner-all">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    @stop