<!doctype html>
<html lang="en">
 @include('layout.header')
<body>
  <div data-role="page" data-ajax="false">
    <div data-role="header">
       @include('layout.head')
       <!-- menu navigation -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">                    
                    
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
                        <li class="active"><a data-ajax="false" href="/galleries"><i class=""></i> Pictures</a></li>
                        <li><a data-ajax="false" href="/talents"><i class=""></i> Talents</a></li>
                    </ul>
                </div> <!-- ./ menu navigation -->
     </div>
    <!-- CONTENT -->
    <div data-role="main" class="ui-content"> 
         <!-- breadcrumbs -->
        <div class="breadcrumb" style="margin:0;">
         <div class="overlay-img">
          <div class="row padding-5">
           <div class="container">
            <div class="btn-group pull-left margin-25-0">
                <a data-ajax="false" href="/profile" class="btn btn-default"><i class="fa fa-user"></i></a>
                <span class="btn btn-danger-reverse"><i class="fa fa-plus-square"></i> Add Picture <i class="fa fa-camera"></i></span>
            </div>
           </div>
          </div>
         </div>
        </div> 
                        @if (Session::get('errors'))
                         <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                        @endif
                        @if (Session::get('notices'))
                         <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>
                        @endif
     
		        <div class="row centered-form">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				     <div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Add Picture</h3>
							@if (Session::get('errors'))
			                      <div class="alert alert-warning alert-dismissible fade in" role="alert">
			                        <a name="error">{{{ Session::get('errors') }}}</a></div>
			                      @endif
			                      @if (Session::get('notices'))
			                      <div class="alert alert-warning alert-dismissible fade in">
			                        <a name="notice">{{{ Session::get('notices') }}}</a></div>
			                      @endif
						</div>	
						<div class="panel-body" style="min-height:400px;">	 
						 <div id="uploader" class="row">
 						  <div class="col-md-6">
							
							<div id="crop-preview" style="height:250px;width:250;margin-bottom:10px;">
								{{ HTML::image('img/user.jpg','Album Art', 
                            	array('width'=>'250px', 'height'=>'250px'))}}
							</div>
							<div class="js-upload" style="display: none">
								<div class="progress" style="margin-bottom:0;">
									<div class="js-progress progress-bar progress-bar-info"></div>
								</div>
								<span class="btn-txt">Uploading (<span class="js-size"></span>)</span>
							</div>
							<div class="js-browse btn btn-default">
								<span class="btn-txt">Browse</span>
								<input type="file" name="image">
							</div>
						  </div>
						  <div class="col-md-6">
						    <div id="js-preview"></div>
							<div class="form-group">
								<input type="text" name="caption" id="caption" class="form-control input-sm" placeholder="Add title">
							</div>				
			 				<div class="form-group">
			                           		 <label for="category" class="control-label">Choose Category</label>
			                           		 <select class="form-control" name="genre" id="genre">
			                                        	<option>Modelling</option>
			                                        	<option>Others</option>
			                            		</select>
			                       		 </div>
						  </div>
						  </div> <!-- row ends -->
						  <div id="results"></div>
						 </div> <!-- panel body ends -->
						  <div class="panel-footer">
						    <div class="ui-grid-a">
                            <div class="ui-block-a">
							<button class="js-send btn-small btn btn-primary btn-block" type="submit">Upload</button>
							</div><br />
							<div class="ui-block-b">
							<button class="js-reset btn-small btn btn-default btn-block" type="reset">reset</button>  
							</div> 
							</div>
						  </div> <!-- panel-footer ends -->
						</div> 
			  			
					</div>
				</div>
     	</div>
@include('layout.footer')
  
<script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/humane.min.js') }}"></script>


 <script>
    window.FileAPI = {
    debug: false, // enable/disable debug mode (default is false),
    cors: false, // if using CORS, set this to `true`
    media: false, // if uploading directly from WebCam, set to `true`
    staticPath: '/js/FileAPI/', // path to '*.swf' files necessary for fallbacks
};
</script>
<script type="text/javascript" src="{{asset('js/FileAPI/FileAPI.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/FileAPI/FileAPI.exif.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery.fileapi.min.js') }}"></script>

<script type="text/javascript" src="{{asset('js/jcrop/jquery.Jcrop.min.js') }}"></script>

<script type="text/javascript" src="{{asset('js/jquery.uploadPreview.min.js') }}"></script>


 	<script>
  $(function() {
    // Enable FileAPI library on the uploader element
    $('#uploader').fileapi({
    multiple: false,
    maxSize : 4*1024*1024,
	accept: '.jpeg, .jpg, .gif, .png',
   imageSize: {minWidth: 400, minHeight: 500 },
   // imageSize: {minWidth: 800, minHeight: 600, maxWidth: 600, maxHeight: 700 },
    url: 'create', // The URL of the backend receiving the file uploads
    //autoUpload: false, // Upload the file when the user selects it from browse window
   // accept: 'image/*', // only allow images to be selected
//	data:{caption: $('#caption').val(), genre: $('#genre').val() },
	onComplete: function (evt, uiEvt){
					var result = '';
				var file = uiEvt.file;
				var json = uiEvt.result;
				//result += 'The name of the file is ' + json.name;
				//result += '<br> The caption is ' + json.caption;
				//result += '<br> The genre is ' + json.genre;
				//$("#results").html(result);
				
				window.location = json.url;

        },
    elements: {
      progress: '.js-progress',
      active: { show: '.js-upload', hide: '.js-browse' },
      size: '.js-size',
      preview: {
        el: '#js-preview', // specify which element should serve as a preview
       width:150, // specify the width of the preview image
       height: 200 // specify the height of the preview image
          },
          ctrl: { upload: '.js-send', reset: '.js-reset' },
			empty: { hide: '.js-upload' }

            },
            onSelect: function (evt, data){
				data.all; // All files
				data.files; // Correct files
				if( data.other.length ){
					// there were errors
					var errors = data.other[0].errors;
					if( errors ){
						// Show an error if the file is bigger than the limit
						if(errors.maxSize) humane.log("The file is too big, Max size is 4MB", { addnCls: 'humane-jackedup-error' });
						// errors.maxFiles;
						if(errors.minWidth) humane.log("Minimum Image width should be 400px", { addnCls: 'humane-jackedup-error' });
						if(errors.minHeight)humane.log("Minimum Image height should be 500px", { addnCls: 'humane-jackedup-error' });
						// errors.maxWidth;
						// errors.maxHeight;
				}
			}
				var file = data.files[0]; // Select the file
				if( !FileAPI.support.transform ) {
					alert('Sorry, your browser does not support cropping');
						}
					// Only if the image is valid, crop it
				if( file ){
					$('#crop-preview').show(); // Show the cropper element
					// Upload cropped image when "Send" button is pressed
					$('.js-send')
						.unbind('fileapi')
						.bind('click.fileapi', function (){
						$('#crop-preview').hide();
						$('#uploader').fileapi('upload');
						});

						$('#crop-preview').cropper({
							file: file, // Use the selected image
							bgColor: '#fff',
							maxSize: [$('#crop-preview').width()], // Make the cropper fit inside the preview
							onSelect: function (coords){
							$('#uploader').fileapi('crop', file, coords);
								}
							});
					}
				}
				
   
			
      });
});
</script>
<script>
// Change global options for all Humane.js notifications
humane.clickToClose = true; 
humane.addnCls = 'myNotification'; // Add a class to all notifications
// Show an example notification
//humane.log("Humane.js is ready for your command!");
</script>

</div> <!-- ./ page -->
</body>
</html>