<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>The News Reporter a Magazine Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
<link href="{{asset('public/site/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{asset('public/site/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="{{asset('public/site/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/site/js/jquery.leanModal.min.js')}}"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="The News Reporter Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->

<!--Facebook Comment-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=2152285088351327&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Facebook Comment-->
</head>
<body>
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
			<div class="header">
				<div class="header-left">
					<div class="logo">
						<a href="{{route('/')}}">
							<h6>the</h6>
							<h1>DANANG <span>NEWS</span></h1>
						</a>
					</div>
				</div>
					<div class="social-icons">	
						<li><a href="#"><i class="twitter"></i></a></li>
						<li><a href="#"><i class="facebook"></i></a></li>
						<li><a href="#"><i class="rss"></i></a></li>
						<li><div class="facebook"><div id="fb-root"></div>
							
							<div id="fb-root"></div>
							</div></li>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
	   						
	   						<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
							

					</div>
					<div class="clearfix"></div>
				<div class="header-right">
					<div class="top-menu">
						<ul>        
							<li><a href="index.html">Home</a></li> |  
							<li><a href="about.html">About Us</a></li> |   
							<li><a href="contact.html">Contact Us</a></li>  |   
							<li><a id="modal_trigger" href="#modal" class="btn1">Login</a>

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				<div class="">
					<a href="#" class="social_box fb">
						<span class="icon"><i class="fa fa-facebook"></i></span>
						<span class="icon_title">Connect with Facebook</span>
						
					</a>

					<a href="#" class="social_box google">
						<span class="icon"><i class="fa fa-google-plus"></i></span>
						<span class="icon_title">Connect with Google</span>
					</a>
				</div>

				<div class="centeredText">
					<span>Or use your Email address</span>
				</div>

				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
				<form>
					<label>Email / Username</label>
					<input type="text" />
					<br />

					<label>Password</label>
					<input type="password" />
					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me on this computer</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
					</div>
				</form>

				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register">
				<form>
					<label>Full Name</label>
					<input type="text" />
					<br />

					<label>Email Address</label>
					<input type="email" />
					<br />

					<label>Password</label>
					<input type="password" />
					<br />

					<div class="checkbox">
						<input id="send_updates" type="checkbox" />
						<label for="send_updates">Send me occasional email updates</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
					</div>
				</form>
			</div>
		</section>
	</div>

<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script></li> |   
							<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Subscribe</a></li>
						</ul>
					</div>
					<!---pop-up-box---->  
					<link href="{{asset('public/site/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
					<script src="{{asset('public/site/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
					<!---//pop-up-box---->
					<div id="small-dialog1" class="mfp-hide">
						<div class="signup">
							<h3>Subscribe</h3>
							<h4>Enter Your Valid E-mail</h4>
							<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" />
							<div class="clearfix"></div>
							<input type="submit"  value="Subscribe Now"/>
						</div>
					</div>	

                     <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>	
					<div class="search">
						<form>
							<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"/>
							<input type="submit" value="">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				</div>
			<span class="menu"></span>
			<div class="menu-strip">
				<ul>
				@if(isset($nav_bar)) 
				@foreach($nav_bar as $row)          
					<li><a href="{{$row->url}}">{{$row->postCategory->value}}</a></li>
				@endforeach
				@endif
					
				</ul>
			</div>
			<!-- script for menu -->
				<script>
				$( "span.menu" ).click(function() {
				  $( ".menu-strip" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>
			<!-- script for menu -->
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="col-md-9 total-news">

				<!-- Content Master -->
					@yield('content')
				<!-- Content Master -->
					
				<div class="photos">
						<h3>Da Nang - Gallery</h3>
					
					 <div class="course_demo">
								  <ul id="flexiselDemo">
								@foreach($du_lich_gallery as $row)	
									 <li>	
										<a  href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}"><img src="{{$row->image_avatar}}" alt="" /></a>							
									 </li>
								@endforeach	
								 </ul>
					 </div>
							 <link rel="stylesheet" href="{{asset('public/site/css/flexslider.css')}}" type="text/css" media="screen" />
								<script type="text/javascript">
									$(window).load(function() {
										$("#flexiselDemo").flexisel({
											visibleItems: 4,
											animationSpeed: 1000,
											autoPlay: true,
											autoPlaySpeed: 3000,    		
											pauseOnHover: true,
											enableResponsiveBreakpoints: true,
											responsiveBreakpoints: { 
												portrait: { 
													changePoint:480,
													visibleItems: 2
												}, 
												landscape: { 
													changePoint:640,
													visibleItems: 2
												},
												tablet: { 
													changePoint:768,
													visibleItems: 3
												}
											}
										});
										
									});
							  </script>
							 <script type="text/javascript" src="{{asset('public/site/js/jquery.flexisel.js')}}"></script>
				</div>
				</div>

				<div class="col-md-3 side-bar">

				@if(isset($du_lich))	
					<div class="world-news" id='chinh_tri'>
						<div class="main-title-head">
							<h3>Du Lịch Đà Nẵng</h3>
							<div class="clearfix"></div>
						</div>
					@foreach($du_lich as $row)
						<div class="world-news-grids-du_lich">
							<div class="world-news-grid">
								<img src="{{$row->image_avatar}}" alt="" />
								<a  href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->postCategory->value),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">{{$row->title}}</a>
							</div>
							<div class="clearfix"></div>
						</div>
					@endforeach
					</div>
				@endif
			
					<div class="popular">
						<div class="main-title-head">
							<h3>Xem Nhiều Nhất</h3>
							<div class="clearfix"></div>
						</div>		
						<div class="popular-news">
							
							@foreach($most_view as $row)
							<div class="popular-grid">
								<i>{{$row->updated_at}}</i>
								<p><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->postCategory->value),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}">
								{{$row->title}}</a></p>
							</div>
							@endforeach
							
						</div>
						<div class="clearfix"></div>
					</div>
				@if(isset($advertise))	
					<div class="world-news" id='chinh_tri'>
					@foreach($advertise as $row)
						<div class="world-news-grids-du_lich">
							<div class="world-news-grid">
								<a  href="{{$row->link}}" class="title">
								<img src="{{$row->image_url}}" alt="" />
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					@endforeach
					</div>
				@endif						
			

				</div>	
				<div class="clearfix"></div>
			</div>

			<div class="footer text-center">
				<div class="bottom-menu">
					<ul>                 
						<li><a href="index.html">World  News</a></li> |
						<li><a href="sports.html">Sports</a></li> |
						<li><a href="tech.html">Techology</a></li> |
						<li><a href="business.html">Business</a></li> |
						<li><a href="movies.html">Movies</a></li> |
						<li><a href="movies.html">Entertainment</a></li> |
						<li><a href="books.html">Books</a></li> |
						<li><a href="movies.html">Culture</a></li> |
						<li><a href="classifieds.html">Classifieds</a></li> |
						<li><a href="blog.html">Blogs</a></li>							
					</ul>
				</div>
				<div class="copyright text-center">
					<p>The News Reporter &copy; 2015 All rights reserved | Template by  <a href="http://w3layouts.com">W3layouts</a></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>