<!DOCTYPE html>
<html lang="en">
@yield('css-links')
@include('layout.header')
<body>
  	<div>
   		 <div>
    			@include('layout.head')
    		</div>
    	<!-- CONTENT -->
    		<div class="">     
			@yield('content')        
   		 </div>    
    		<div>
			@include('layout.footer')
		</div>
  	</div> <!-- ./ page -->


</body>

</html>