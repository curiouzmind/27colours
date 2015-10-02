<!-- FOOTER -->
    
    <footer>
      <div class="container">
        <!-- footer 1 -->
        <div class="footer1">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h2>About 27Colours</h2>
                    <div>
                        <p style="padding-right:50px;">27 Colours is an artist discovery and management company with deep 
                            roots in the entertainment industry. We showcase their exceptional works to 
                            talent hunters, producers, fans and the world.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 quick-links">
                    <h2>Quick Explore</h2>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-music"></i> <a data-ajax="false" href="/songs">Listen to Songs</a></li>
                        <li><i class="fa fa-video-camera"></i> <a data-ajax="false" href="/videos">Watch Videos</a></li>
                        <li><i class="fa fa-camera"></i> <a data-ajax="false" href="/galleries">View Pictures</a></li>
                        <li><i class="fa fa-user"></i> <a data-ajax="false" href="/talents">View Talents Profile</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 quick-links">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <li data-toggle="tooltip" data-placement="left" title="Coming soon"><i class="fa fa-link"></i> 
                            <a data-ajax="false" href="">Advertise with us</a></li>
                        <li data-toggle="tooltip" data-placement="left" title="Coming soon"><i class="fa fa-link"></i> 
                            <a data-ajax="false" href="">Sponsorship</a></li>
                        <li data-toggle="tooltip" data-placement="left" title="Coming soon"><i class="fa fa-link"></i> 
                            <a data-ajax="false" href="">Ask a question</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 social-connect">
                    <h2>Connect With Us</h2>
                    <!--<div class="subscribe input-group">
                      <form data-ajax="false" action="">
                        <input class="form-control" data-toggle="tooltip" data-placement="bottom" title="Coming soon" type="email" placeholder="Email Address" style="height:42px;">
                        <span type="submit" class="input-group-addon"><i class="fa fa-plus-square fa-2x"></i></span>
                      </form>
                    </div>-->
                    <div class="social-icons">
                          

                          <ul class="list-inline">
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                                <a data-ajax="false" href="https://www.facebook.com/27colours" target="blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter">
                                <a data-ajax="false" href="https://twitter.com/27colours" target="blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="google" data-toggle="tooltip" data-placement="bottom" title="Coming soon">
                                <a data-ajax="false" href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
                            <li class="instagram" data-toggle="tooltip" data-placement="bottom" title="Instagram">
                                <a data-ajax="false" href="https://instagram.com/27colours/" target="blank"><i class="fa fa-instagram"></i></a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer 2 -->
        <div class="footer2 copyright">
            <p class="pull-left">Copyright &copy; 
                <script type="text/javascript">
                    var currentYr = new Date();
                    var insertYr = currentYr.getFullYear();
                    document.write(insertYr);
                </script>,
                27Colours - All Rights Reserved. 
            </p>
            <p class="pull-right">Powered by  <a data-ajax="false" href="#">CuriouzMind Tech</a></p>
        </div>
       </div> <!-- ./ container -->
    </footer>

    <!-- jQuery Version 2.1.3 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('plugins/jquery.flexslider.min.js')}}"></script>
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/scripts.js')}}"></script>
    <script src="{{asset('plugins/videoplayer/video.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/humane.min.js') }}"></script>
     <script type="text/javascript" src="{{asset('js/selectize.min.js') }}"></script>

    <!-- inline script -->
     <script>
     $(document).ready(function () {
 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }


});
</script>

 @yield('scripts')
     
    <script>
        $(function () {
          $('[data-toggle="popover"]').popover()
        })
    </script>
     <script>
            $(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert-dismissable").alert('close');
            });
        </script>
    <!-- home slider -->
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                autoPlay: true
            });
        })
    </script>
    <script>
         $(function () {
            $('[data-toggle="tooltip"]').tooltip()
         })
    </script>
    <!--  -->
    <script>
      videojs.options.flash.swf = "plugins/videoplayer/video-js.swf"
    </script>
    <!-- Ajax global handler -->
    <script>
        $(document).bind("mobileinit", function(){
          $.mobile.ignoreContentEnabled = true;
        });
    </script>
    
    
    
    <!-- Setting Active menu nav -->
    <script>
        // $(function() {
        //   setNavigation();
        // });
        // function setNavigation() {
        //   var path = window.location.pathname;
        //   path = path.replace(/\/$/, "");
        //   path = decodeURIComponent(path);

        //   $(".nav a").each(function () {
        //     var href = $(this).attr('href');
        //     if(path.substring(0,href.length) === href){
        //       $(this).closest('li').addClass('active');
        //     }
        //   });
        // }
    </script>
    <!-- owl-carousel -->
    <script>
      $(document).ready(function() {
     
      var owl = $("#owl-demo");
     
      owl.owlCarousel({
          autoPlay : true,
          autoPlay  : 2000,
          items : 10, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
        });
      });        
    </script>
    
    
   <!-- FB PLUGIN JAVASCRIPT CODE -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=221153544678812";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- ./ FB PLUGIN -->
    <!-- Sharing plugin -->
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options(
        {publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, 
        doNotCopy: false, hashAddressBar: true, displayText: "27Colours"});
    </script>   
    
    <script>
$(function() {
// Enable Selectize
	$('#search').selectize({
 		valueField: 'id',
		labelField: 'title',
		searchField: ['title'],
		render: {
			option: function(item, escape) {
				return '<div><a href="/song/show/'+escape(item.id) + '">' + escape(item.title) + '</a></div>';
					}
			},
		onChange: function(value){
			// Do something when input changes
			alert(value);
				},
 		load: function(query, callback) {
			if (!query.length) return callback();
				$.ajax({
				url: './song/search',
				type: 'GET',
				dataType: 'json',
				data: {
				q: query
					},
				success: function(res) {
				callback(res.data);
				}
				});
			}
		});
	});

</script>