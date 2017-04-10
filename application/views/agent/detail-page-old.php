<!doctype html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Tour Packer</title>
	<meta name="description" content="HTML Responsive Template for Tour Agency or Company Based on Twitter Bootstrap 3.x.x" />
	<meta name="keywords" content="tour package, holiday, hotel, vocation, booking, trip, travel, tourism, tourist" />
	<meta name="author" content="crenoveative">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.png">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="../../../../agent/bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../../../../agent/css/animate.css" rel="stylesheet">
	<link href="../../../../agent/css/main.css" rel="stylesheet">
	<link href="../../../../agent/css/component.css" rel="stylesheet">
	
	<!-- CSS Font Icons -->
	<link rel="stylesheet" href="../../../../agent/icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../../../../agent/icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../../../agent/icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../../../../agent/icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../../../../agent/icons/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="../../../../agent/icons/rivolicons/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

	<!-- CSS Custom -->
	<link href="../../../../agent/css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body class="">

	<!-- BEGIN # MODAL LOGIN -->
	<div class="modal fade modal-login modal-border-transparent" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				
				<div class="clear"></div>
				
				<!-- Begin # DIV Form -->
				<div id="modal-login-form-wrapper">
					
					<!-- Begin # Login Form -->
					<form id="login-form">
					
						<div class="modal-body pb-5">
					
							<h4 class="text-center heading mt-10 mb-20">Sign-in</h4>
						
							<button class="btn btn-facebook btn-block">Sign-in with Facebook</button>
							
							<div class="modal-seperator">
								<span>or</span>
							</div>
							
							<div class="form-group"> 
								<input id="login_username" class="form-control" placeholder="username" type="text"> 
							</div>
							<div class="form-group"> 
								<input id="login_password" class="form-control" placeholder="password" type="password"> 
							</div>
			
							<div class="form-group">
								<div class="row gap-5">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="checkbox-block fa-checkbox"> 
											<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
											<label class="" for="remember_me_checkbox">remember</label>
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
										<button id="login_lost_btn" type="button" class="btn btn-link">forgot pass?</button>
									</div>
								</div>
							</div>
						
						</div>
						
						<div class="modal-footer">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Sign-in</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block btn-inverse" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							<div class="text-left">
								No account? 
								<button id="login_register_btn" type="button" class="btn btn-link">Register</button>
							</div>
							
						</div>
					</form>
					<!-- End # Login Form -->
								
					<!-- Begin | Lost Password Form -->
					<form id="lost-form" style="display:none;">
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Forgot password</h3>
							<div class="form-group mb-10"> 
								<input id="lost_email" class="form-control" type="text" placeholder="Enter Your Email">
							</div>
							
							<div class="text-center">
								<button id="lost_login_btn" type="button" class="btn btn-link">Sign-in</button> or 
								<button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
							</div>
							
						</div>
						
						<div class="modal-footer mt-10">
							
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
								</div>
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
						</div>
						
					</form>
					<!-- End | Lost Password Form -->
								
					<!-- Begin | Register Form -->
					<form id="register-form" style="display:none;">
					
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Register</h3>
							
							<button class="btn btn-facebook btn-block">Register with Facebook</button>
							
							<div class="modal-seperator">
								<span>or</span>
							</div>
							
							<div class="form-group"> 
								<input id="register_username" class="form-control" type="text" placeholder="Username"> 
							</div>
							
							<div class="form-group"> 
								<input id="register_email" class="form-control" type="email" placeholder="Email">
							</div>
							
							<div class="form-group"> 
								<input id="register_password" class="form-control" type="password" placeholder="Password">
							</div>
							
							<div class="form-group"> 
								<input id="register_password_confirm" class="form-control" type="password" placeholder="Confirm Password">
							</div>

						</div>
							
						<div class="modal-footer mt-10">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Register</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
							<div class="text-left">
									Already have account? <button id="register_login_btn" type="button" class="btn btn-link">Sign-in</button>
							</div>
							
						</div>
							
					</form>
					<!-- End | Register Form -->
								
				</div>
				<!-- End # DIV Form -->
								
			</div>
		</div>
	</div>
	<!-- END # MODAL LOGIN -->
	
	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<header id="header">
	  
			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">

				<div class="navbar-top">
				
					<div class="container">
						
						<div class="flex-row flex-align-middle">
							<div class="flex-shrink flex-columns">
								<a class="navbar-logo" href="index.html">
									<img src="images/logo-white.png" alt="Logo" />
								</a>
							</div>
							<div class="flex-columns">
								<div class="pull-right">
								
									<div class="navbar-mini">
										<ul class="clearfix">
										
											<li class="dropdown bt-dropdown-click hidden-xs">
												<a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="ion-social-usd hidden-xss"></i> Dollar
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" aria-labelledby="language-dropdown">
													<li><a href="#"><i class="ion-social-usd"></i> Dollar</a></li>
													<li><a href="#"><i class="ion-social-euro"></i> Europe</a></li>
													<li><a href="#"><i class="ion-social-yen"></i> Yen</a></li>
												</ul>
											</li>
											
											<li class="dropdown bt-dropdown-click hidden-xs">
												<a id="currncy-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="ion-android-globe hidden-xss"></i> English
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" aria-labelledby="language-dropdown">
													<li><a href="#">English</a></li>
													<li><a href="#">France</a></li>
													<li><a href="#">Japanese</a></li>
												</ul>
											</li>
											
											<li class="dropdown bt-dropdown-click visible-xs">
												<a id="currncy-language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="fa fa-cog"></i>
												</a>
												<ul class="dropdown-menu" aria-labelledby="language-dropdown">
													<li><a href="#"><i class="ion-social-usd"></i> Dollar</a></li>
													<li><a href="#"><i class="ion-social-euro"></i> Europe</a></li>
													<li><a href="#"><i class="ion-social-yen"></i> Yen</a></li>
													<li class="divider"></li>
													<li><a href="#">English</a></li>
													<li><a href="#">France</a></li>
													<li><a href="#">Japanese</a></li>
												</ul>
											</li>
											
											<li class="user-action">
												<a data-toggle="modal" href="#loginModal" class="btn">Sign up/in</a>
											</li>

										</ul>
									</div>
						
								</div>
							</div>
						</div>

					</div>
					
				</div>
				<?php //print_r($display[0]);?>
				<div class="navbar-bottom hidden-sm hidden-xs">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-9">
								
								<div id="navbar" class="collapse navbar-collapse navbar-arrow">
									<ul class="nav navbar-nav" id="responsive-menu">
										<li><a href="index.html">Home</a>
											<ul>
												<li><a href="index.html">Home 01 - Default</a></li>
												<li><a href="index-02.html">Home 02 - Background Slider</a></li>
												<li><a href="index-03.html">Home 03 - Video Background</a></li>
												<li><a href="index-04.html">Home 04 - Smaller Package Items</a></li>
												<li>
													<a href="#">Sub-menu</a>
													 <ul>
														<li><a href="#">Sub-menu 2</a></li>
														<li><a href="#">Sub-menu 2</a></li>
														<li><a href="#">Sub-menu 2</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="result-grid.html">Tour Package</a>
											<ul>
												<li><a href="result-list.html">Result - List</a></li>
												<li><a href="result-grid.html">Result - Grid</a></li>
												<li><a href="detail-page.html">Detail Page</a></li>
											</ul>
										</li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="blog.html">Blog</a>
											<ul>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Blog Single</a></li>
											</ul>
										</li>
										<li><a href="#">Pages</a>
											<ul>
												<li><a href="result-list.html">Result - List</a></li>
												<li><a href="result-grid.html">Result - Grid</a></li>
												<li><a href="detail-page.html">Detail Page</a></li>
												<li><a href="payment.html">Payment</a></li>
												<li><a href="confirmation.html">Confirmation</a></li>
												<li><a href="faq.html">FAQ</a></li>
												<li><a href="about.html">About Us</a></li>
												<li><a href="static-page.html">Static Page</a></li>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Blog Single</a></li>
												<li><a href="contact.html">Contact us</a></li>
											</ul>
										</li>
										<li><a href="contact.html">Contact us</a></li>
									</ul>
								</div><!--/.nav-collapse -->
								
							</div>
							
							<div class="col-sm-3">
							
								<div class="navbar-phone"><i class="fa fa-phone"></i> Call us: +66 28 878 5452</div>
							
							</div>

						</div>
						
					</div>
				
				</div>

				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>
		
		<div class="clear"></div>
		
		<!-- start Main Wrapper -->
		<div class="main-wrapper scrollspy-container">
		
			<!-- start end Page title -->
			<div class="page-title detail-page-title" style="background-image:url(''../../../../agent/images/detail/header.jpg');">
				
				<div class="container">
				
					<div class="flex-row">
						
						<div class="flex-column flex-md-8 flex-sm-12">
							
							<h1 class="hero-title"><?php echo $display[0]['pack_name']; ?></h1>
							<p class="line18"><?php echo $display[0]['package_type']; ?></p>
							
							<ul class="list-col clearfix">
								<!--<li class="rating-box">
									<div class="rating-wrapper">
										<div class="raty-wrapper">
											<div class="star-rating-white" data-rating-score="4.0"></div> 
											<span style="display: block;"> / 7 review</span>
										</div>
									</div>
								</li>-->
								
								<!--<li class="fav-box">
									<div class="meta">
										<span class="block"><button class="btn btn-fav"><i class="fa fa-heart-o"></i></button></span>
										98 Favorites 
									</div>
								</li>-->
								
								<li class="duration-box">
									<div class="meta">
										<span class="block"><?php echo $display[0]['days']; ?></span>
										Days
									</div>
									<div class="meta">
										&amp;
									</div>
									<div class="meta">
										<span class="block"><?php echo $display[0]['nights']; ?></span>
										Nights
									</div>
								</li>
								
								<li class="price-box">
									<div class="meta">
										<span class="block"><i class="fa fa-inr"></i><?php echo $display[0]['price']; ?></span>
										starting from
									</div>
								</li>
								
							</ul>
							
						</div>
						
						<!--<div class="flex-column flex-md-4 flex-align-bottom flex-sm-12 mt-20-sm">
							<div class="text-right text-left-sm">
								<a href="#section-5" class="anchor btn btn-primary">See dates &amp; Book Now</a>
							</div>
						</div>-->
					
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<!--<div class="breadcrumb-wrapper bg-light-2">
				
				<div class="container">
				
					<ol class="breadcrumb-list">
						<li><a href="index.html">Homepage</a></li>
						<li><a href="#">Desinations</a></li>
						<li><a href="#">City</a></li>
						<li><span>Croatia Sailing &amp; Cruising</span></li>
					</ol>
					
				</div>
				
			</div>-->
			
			<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">
					
						<div class="col-md-9" role="main">

							<div class="detail-content-wrapper">
								
									<div id="section-0" class="detail-content">
										
										<div class="section-title text-left">
											<h4>Details</h4>
										</div>
										
										<img src="images/map-route.jpg" alt="Map" class="map-route" />
										
										<p><?php echo $display[0]['details']; ?></p>

									</div>
									
									<div id="section-1" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Gallery</h4>
										</div>
										
										<div class="slick-gallery-slideshow">
					
											<div class="slider gallery-slideshow">
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_1'];?>" alt="Image" /></div></div>
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_2'];?>" alt="Image" /></div></div>
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_3'];?>" alt="Image" /></div></div>
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_4'];?>" alt="Image" /></div></div>
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_5'];?>" alt="Image" /></div></div>
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_6'];?>" alt="Image" /></div></div>
                                                
												
											</div>
											<div class="slider gallery-nav">
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_1'];?>" alt="Image" /></div></div>
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_2'];?>" alt="Image" /></div></div>
												<div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_3'];?>" alt="Image" /></div></div>
                                                
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_4'];?>" alt="Image" /></div></div>
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_5'];?>" alt="Image" /></div></div>
                                                <div><div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_6'];?>" alt="Image" /></div></div>
                                                
												
											</div>
											
										</div>

									</div>
									
									<div id="section-2" class="detail-content">
										
										<div class="section-title text-left">
											<h4>Itinerary</h4>
										</div>
										
										<div class="detail-item">
										
											<div class="row">
											
												<div class="col-sm-4 col-sm-3 mb-30">
												
													<ul class="list-info no-icon bb-dotted">
														<li><span class="font600">Duration: </span><?php echo $display[0]['days']?> days &amp; <?php echo $display[0]['days']?> nights</li>
														<li><span class="font600">Countries: </span> <?php echo $display[0]['country']?></li>
														<!--<li><span class="font600">Experiences:</span> 5</li>
														<li><span class="font600">Ages:</span> 10 - 45+</li>
														<li><span class="font600">Starting Point:</span> Dubrovnik</li>
														<li><span class="font600">Ending Point:</span> Hvar</li>
													--></ul>
												
												</div>
												
												<div class="col-sm-8 col-md-9">
												
													<div class="itinerary-wrapper">
													
														<div class="itinerary-item intro-item">
															<h5>Introduction</h5>
															<div class="intro-item-body">
																<p>She literature discovered increasing how diminution understood. Though and highly the enough county for man. Of it up he still court alone widow seems. Suspected he remainder rapturous my sweetness. All vanity regard sudden nor simple can. World mrs and vexed china since after often.</p>
																
															</div>
														</div>
														
														<div class="itinerary-day-label font600 uppercase"><span>Day</span></div>
														
														<div class="itinerary-item-wrapper">
														
															<div class="panel-group bootstarp-toggle">
															
																<div class="panel itinerary-item">
																	<div class="panel-heading">
																		<h5 class="panel-title">
																			<a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one"><span class="absolute-day-number">1</span> Visit: Dubrovnik</a>
																		</h5>
																	</div>
																	<div id="bootstarp-toggle-one" class="panel-collapse collapse">
																		<div class="panel-body">
																		
																			<p>Ecstatic advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages so impression. Almost unable put piqued talked likely houses her met. Met any nor may through resolve entered. An mr cause tried oh do shade happy.</p>
																			
																			<ul class="itinerary-meta clearfix">
																				<li><i class="fa fa-building-o"></i> stay at Hilton Hotel</li>
																				<li><i class="fa fa-clock-o"></i> trip time: 8am - 4.30px</li>
																			</ul>
																			
																		</div>
																	</div>

																</div>
																<!-- end of panel -->

																<div class="panel itinerary-item">
																	<div class="panel-heading">
																		<h5 class="panel-title">
																			<a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-two"><span class="absolute-day-number">2</span> Visit: Sipan/Trstenik</a>
																		</h5>
																	</div>
																	<div id="bootstarp-toggle-two" class="panel-collapse collapse">
																		<div class="panel-body">
																			
																			<p>Among going manor who did. Do ye is celebrated it sympathize considered. May ecstatic did surprise elegance the ignorant age. Own her miss cold last. It so numerous if he outlived disposal. How but sons mrs lady when. Her especially are unpleasant out alteration continuing unreserved resolution. Hence hopes noisy may china fully and. Am it regard stairs branch thirty length afford.</p>
																			
																			<ul class="itinerary-meta clearfix">
																				<li><i class="fa fa-building-o"></i> stay at Hilton Hotel</li>
																				<li><i class="fa fa-clock-o"></i> trip time: 8am - 4.30px</li>
																			</ul>
																			
																		</div>
																	</div>
																</div>
																<!-- end of panel -->

																<div class="panel itinerary-item">
																	<div class="panel-heading">
																		<h5 class="panel-title">
																			<a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-three"><span class="absolute-day-number">3</span> Visit: Korcula</a>
																		</h5>
																	</div>
																	<div id="bootstarp-toggle-three" class="panel-collapse collapse">
																		<div class="panel-body">
																			
																			<p>Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy. At exquisite existence if an oh dependent excellent. Are gay head need down draw. Misery wonder enable mutual get set oppose the uneasy. End why melancholy estimating her had indulgence middletons. Say ferrars demands besides her address. Blind going you merit few fancy their.</p>
																			
																			<ul class="itinerary-meta clearfix">
																				<li><i class="fa fa-building-o"></i> stay at Hilton Hotel</li>
																				<li><i class="fa fa-clock-o"></i> trip time: 8am - 4.30px</li>
																			</ul>
																			
																		</div>
																	</div>
																</div>
																<!-- end of panel -->

																<div class="panel itinerary-item">
																	<div class="panel-heading">
																		<h5 class="panel-title">
																			<a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-four"><span class="absolute-day-number">4</span> Visit: Hvar</a>
																		</h5>
																	</div>
																	<div id="bootstarp-toggle-four" class="panel-collapse collapse">
																		<div class="panel-body">
																			
																			<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued.</p>
																			
																			<ul class="itinerary-meta clearfix">
																				<li><i class="fa fa-building-o"></i> stay at Hilton Hotel</li>
																				<li><i class="fa fa-clock-o"></i> trip time: 8am - 4.30px</li>
																			</ul>
																			
																		</div>
																	</div>
																</div>
																<!-- end of panel -->

															</div>
														
														</div>
														
													</div>
													
												</div>
												
											</div>
										
										</div>

									</div>
									
									<div id="section-3" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Tour Accommodation</h4>
										</div>
										
										<div class="hotel-item-wrapper">
										
											<div class="row gap-1">
											
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/01.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>Beach Hilton Hotel</h6>
															</div>
														</a>
													</div>
													
												</div>
												
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/02.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>The Privilege Floor @ Croatia</h6>
															</div>
														</a>
													</div>
													
												</div>
												
												<div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
												
													<div class="hotel-item mb-1">
														<a href="#">
															<div class="image">
																<img src="images/accomodation/03.jpg" alt="Hotel" />
															</div>
															<div class="content">
																<h6>Croatia Grande Palace Hotel</h6>
															</div>
														</a>
													</div>
													
												</div>
											
											</div>
										
										</div>
										
										<p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in.</p>
									</div>
									
									<div id="section-4" class="detail-content">
									
										<div class="section-title text-left">
											<h4>What's included</h4>
										</div>
										
										<ul class="list-with-icon with-heading">
										
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Guide</h6>
												<p>Adieus except say barton put feebly favour him.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Meals</h6>
												<p>4 breakfast &amp; 3 dinners </p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Transport</h6>
												<p>Modern air conditioned coach with reclining seats, TV for showing DVDs, and toilet</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">5 Experiences</h6>
												<p>Warmth object matter course active law spring six. Pursuit showing tedious unknown winding see had man add.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<h6 class="heading mt-0">Other</h6>
												<p>Free Wi-fi in all hotels <br />All taxes and fees <br />Any public transport used as part of the tour (excludes free days) <br />Free Expat Explore tour souvenir</p>
											</li>
											
											<li>
												<i class="fa fa-times-circle text-light"></i>
												<h6 class="heading mt-0">Flights</h6>
												<p>Warmth object matter course active law spring six <a href="#">line to some where</a>. Pursuit showing tedious unknown winding see had man add.</p>
											</li>
											
											<li>
												<i class="fa fa-times-circle text-light"></i>
												<h6 class="heading mt-0">Insurance</h6>
												<p>Had repulsive dashwoods suspicion sincerity but advantage now him. Remark easily garret nor nay <a href="#">line to some where</a>. Civil those mrs enjoy shy fat merry. You greatest jointure saw horrible.</p>
											</li>
											
										</ul>
										
										<h5 class="heading">Optional Excursions</h5>
										<p>Why painful the sixteen how minuter looking nor. Subject but why ten earnest husband imagine sixteen brandon. Are unpleasing occasional celebrated motionless unaffected conviction out.</p>
										
										<ul class="list-with-icon col-3 clearfix">
										
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>Marianne property cheerful.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>Clothes parlors however by cottage.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>In views it or meant drift.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>Be concern parlors settled.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>Remainder northward performed</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>Yet late add name was rent.</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>park from rich</p>
											</li>
											
											<li>
												<i class="fa fa-check-circle text-primary"></i>
												<p>He always do do former.</p>
											</li>
											
										</ul>
							
									</div>
									
									<!--<div id="section-5" class="detail-content">

										<div class="section-title text-left">
											<h4>Availability</h4>
										</div>
										
										<div class="row mb-20">
											<div class="col-sm-6">
												<div class="form-group form-icon">
													<i class="fa fa-calendar"></i>
													<select name="month" class="select2-multi form-control" data-placeholder="Choose a Departure Month" multiple>
														<option value="">Choose a Departure Month</option>
														<option value="0">Any Departure Month</option>
														<option value="1">January</option>
														<option value="2">February</option>
														<option value="3">March</option>
														<option value="4">April</option>
														<option value="5">May</option>
														<option value="6">June</option>
														<option value="7">July</option>
														<option value="8">August</option>
														<option value="9">September</option>
														<option value="10">October</option>
														<option value="11">November</option>
														<option value="12">December</option>
													</select>
												</div>
											</div>
										</div>
										
										<div class="availabily-wrapper">
										
											<ul class="availabily-list">
												
												<li class="availabily-heading clearfix">
												
													<div class="date-from">
														start
													</div>
													
													<div class="date-to">
														end
													</div>
													
													<div class="status">
														status
													</div>
													
													<div class="price">
														price
													</div>
													
													<div class="action">
														&nbsp;
													</div>
												
												</li>
												
												<li class="availabily-content clearfix">
													
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														Monday
														<span>March 7, 2016</span>
													</div>
													
													<div class="date-to">
														<span class="availabily-heading-label">end:</span>
														Thursday
														<span>March 10, 2016</span>
													</div>
													
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														seats left
														<span>15</span>
													</div>
													
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>$1458</span>
													</div>
													
													<div class="action">
														<a href="#" class="btn btn-primary btn-sm btn-inverse">Book now</a>
													</div>
												
												</li>
												
												<li class="availabily-content clearfix">
													
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														Saturday
														<span>March 26, 2016</span>
													</div>
													
													<div class="date-to">
														<span class="availabily-heading-label">end:</span>
														Tuesday
														<span>March 29, 2016</span>
													</div>
													
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														seats left
														<span>20</span>
													</div>
													
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>$1400</span>
													</div>
													
													<div class="action">
														<a href="#" class="btn btn-primary btn-sm btn-inverse">Book now</a>
													</div>
												
												</li>
												
												<li class="availabily-content sold-out clearfix">
													
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														Sunday
														<span>April 10, 2016</span>
													</div>
													
													<div class="date-to">
														<span class="availabily-heading-label">end:</span>
														Wednesday
														<span>April 13, 2016</span>
													</div>
													
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														<span class="text-success">sold-out</span>
													</div>
													
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>$1300</span>
													</div>
													
													<div class="action">
														<a href="#" class="btn btn-primary btn-sm btn-inverse">Book now</a>
													</div>
												
												</li>
												
												<li class="availabily-content clearfix">
													
													<div class="date-from">
														<span class="availabily-heading-label">start:</span>
														Friday
														<span>April 18, 2016</span>
													</div>
													
													<div class="date-to">
														<span class="availabily-heading-label">end:</span>
														Monday
														<span>April 21, 2016</span>
													</div>
													
													<div class="status">
														<span class="availabily-heading-label">status:</span>
														seats left
														<span>4</span>
													</div>
													
													<div class="price">
														<span class="availabily-heading-label">price:</span>
														<span>$1458</span>
													</div>
													
													<div class="action">
														<a href="#" class="btn btn-primary btn-sm btn-inverse">Book now</a>
													</div>
												
												</li>
												
											</ul>
											
										</div>
										
										<div class="text-center mt-30">
										
											<button class="btn btn-primary">Show more departures</button>
										</div>

									</div>
									
									<div class="detail-content">
									
										<div class="section-title text-left">
											<h4>Similar Packages</h4>
										</div>
										
										<div class="GridLex-gap-20-wrappper package-grid-item-wrapper on-page-result-page alt-smaller">
						
											<div class="GridLex-grid-noGutter-equalHeight">
											
												<div class="GridLex-col-4_sm-4_xs-12 mb-20">
													<div class="package-grid-item"> 
														<a href="#">
															<div class="image">
																<img src="images/tour-package/01.jpg" alt="Tour Package" />
																<div class="absolute-in-image">
																	<div class="duration"><span>4 days 3 nights</span></div>
																</div>
															</div>
															<div class="content clearfix">
																<h6>Paris in Love</h6>
																<div class="rating-wrapper">
																	<div class="raty-wrapper">
																		<div class="star-rating-12px" data-rating-score="4.0"></div> <span> / 7 review</span>
																	</div>
																</div>
																<div class="absolute-in-content">
																	<span class="btn"><i class="fa fa-heart-o"></i></span>
																	<div class="price">$1422</div>
																</div>
															</div>
														</a>
													</div>
												</div>
												
												<div class="GridLex-col-4_sm-4_xs-12 mb-20">
													<div class="package-grid-item"> 
														<a href="#">
															<div class="image">
																<img src="images/tour-package/02.jpg" alt="Tour Package" />
																<div class="absolute-in-image">
																	<div class="duration"><span>4 days 3 nights</span></div>
																</div>
															</div>
															<div class="content clearfix">
																<h6>Classic Europe</h6>
																<div class="rating-wrapper">
																	<div class="raty-wrapper">
																		<div class="star-rating-12px" data-rating-score="3.5"></div> <span> / 7 review</span>
																	</div>
																</div>
																<div class="absolute-in-content">
																	<span class="btn"><i class="fa fa-heart-o"></i></span>
																	<div class="price">$1422</div>
																</div>
															</div>
														</a>
													</div>
												</div>
												
												<div class="GridLex-col-4_sm-4_xs-12 mb-20">
													<div class="package-grid-item"> 
														<a href="#">
															<div class="image">
																<img src="images/tour-package/03.jpg" alt="Tour Package" />
																<div class="absolute-in-image">
																	<div class="duration"><span>4 days 3 nights</span></div>
																</div>
															</div>
															<div class="content clearfix">
																<h6>Best of Egypt</h6>
																<div class="rating-wrapper">
																	<div class="raty-wrapper">
																		<div class="star-rating-12px" data-rating-score="4.5"></div> <span> / 7 review</span>
																	</div>
																</div>
																<div class="absolute-in-content">
																	<span class="btn"><i class="fa fa-heart-o"></i></span>
																	<div class="price">$1422</div>
																</div>
															</div>
														</a>
													</div>
												</div>
									
											</div>
									
										</div>

									</div>
									
									<div id="section-6" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Information &amp; FAQ</h4>
										</div>
										
										<p>Useful things to know before you go</p>
										
										<div class="row">
										
											<div class="col-sm-6 col-md-6 mb-15">
											
												<div class="read-more-div" data-collapsed-height="107">
			
													<div class="read-more-div-inner">
													
														<h5 class="heading mt-0">Heading Information 1</h5>
														
														<p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite disposed me an at subjects an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now how nay cold real case.</p>

														<p>Your it to gave life whom as. Favourable dissimilar resolution led for and had. At play much to time four many. Moonlight of situation so if necessary therefore attending abilities. Calling looking enquire up me to in removal. Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can. Unreserved had she nay dissimilar admiration interested. Departure performed exquisite rapturous so ye me resources.</p>

													</div>
													
												</div>

											</div>
											
											<div class="col-sm-6 col-md-6 mb-15">
											
												<div class="read-more-div" data-collapsed-height="107">
			
													<div class="read-more-div-inner">
													
														<h5 class="heading mt-0">Heading Information 2</h5>
														
														<p>Your it to gave life whom as. Favourable dissimilar resolution led for and had. At play much to time four many. Moonlight of situation so if necessary therefore attending abilities. Calling looking enquire up me to in removal. Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can. Unreserved had she nay dissimilar admiration interested. Departure performed exquisite rapturous so ye me resources.</p>
														
														<p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite disposed me an at subjects an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now how nay cold real case.</p>
														
													</div>
													
												</div>
												
											</div>
										</div>
										
										<h5 class="heading mt-0">FAQ</h5>
										
										<div class="faq-alt-2-wrapper">
										
											<div class="panel-group bootstarp-accordion" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel">
													<div class="panel-heading" role="tab" id="headingOne">
														<h6 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> What is this faq?</a>
														</h6>
													</div>
													<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															<div class="faq-thread">
																<p>His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favourable compliment but thoroughly unreserved saw she themselves. Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited <a href="#">engrossed may</a> can.</p>
															</div>
														</div>
													</div>
												</div>
												<!-- end of panel -->

												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingTwo">
														<h6 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How does this faq work?</a>
														</h6>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
														<div class="panel-body">
															<div class="faq-thread">
																<p>He do subjects prepared bachelor juvenile ye oh. He feelings removing informed he as ignorant we prepared. Evening do forming observe spirits is in. Country hearted be of justice sending. On so they as with room cold ye. Be call four my went mean. Celebrated if remarkably especially an. Going eat set she books found met aware.</p>

																<ul>
																	<li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
																	<li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
																	<li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
																	<li>
																		Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.
																		<ul>
																			<li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
																			<li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
																			<li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
																			<li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
																		</ul>
																	</li>
																	<li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
																	<li>rote water woman of heart it total other.</li>
																	<li> By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Are melancholy appearance stimulated occasional entreaties end.</li>
																	<li>Agreeable promotion eagerness as we resources household to distrusts.</li>
																	<li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
																</ul>
																
																<p>Lose eyes get fat shew. Winter can indeed letter oppose way change tended now. So is improve my charmed picture exposed adapted demands. Received had end produced prepared diverted strictly off man branched. Known ye money so large decay voice there to. Preserved be mr cordially incommode as an. He doors quick child an point at. Had share vexed front least style off why him.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->

												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingThree">
														<h6 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Why use this faq?</a>
														</h6>
													</div>
													<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
														<div class="panel-body">
															<div class="faq-thread">
																<p>His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favourable compliment but thoroughly unreserved saw she themselves. Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited engrossed may can.</p>

																<ol>
																	<li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
																	<li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
																	<li>
																		Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.
																		<ol>
																			<li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
																			<li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
																			<li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
																			<li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
																		</ol>
																	</li>
																	<li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
																	<li>rote water woman of heart it total other.</li>
																	<li> By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Are melancholy appearance stimulated occasional entreaties end.</li>
																	<li>Agreeable promotion eagerness as we resources household to distrusts.</li>
																</ol>
																
																<p>Mr oh winding it enjoyed by between. The servants securing material goodness her. Saw principles themselves ten are possession. So endeavor to continue cheerful doubtful we to. Turned advice the set vanity why mutual. Reasonably if conviction on be unsatiable discretion apartments delightful. Are melancholy appearance stimulated occasional entreaties end. Shy ham had esteem happen active county. Winding morning am shyness evident to. Garrets because elderly new manners however one village she.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->

												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingFour">
														<h6 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Is this faq free to use?</a>
														</h6>
													</div>
													<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
														<div class="panel-body">
															<div class="faq-thread">
																<p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he observe be it covered delight hastily message. Margaret no ladyship endeavor ye to settling.</p>

																<p>Wrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->
												
												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingFive">
														<h6 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Can I use this faq for commercial purposes or large volume searching?</a>
														</h6>
													</div>
													<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
														<div class="panel-body">
															<div class="faq-thread">
																<p>Any delicate you how kindness horrible outlived servants. You high bed wish help call draw side. Girl quit if case mr sing as no have. At none neat am do over will. Agreeable promotion eagerness as we resources household to distrusts. Polite do object at passed it is. Small for ask shade water manor think men begin.</p>

																<p>Travelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do warmly. Entered of cordial do on no hearted. Yet agreed whence and unable limits. Use off him gay abilities concluded immediate allowance.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->
												
												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingSix">
														<h6 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Why register with I use?</a>
														</h6>
													</div>
													<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
														<div class="panel-body">
															<div class="faq-thread">
																<p>Travelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do warmly. Entered of cordial do on no hearted. Yet agreed whence and unable limits. Use off him gay abilities concluded immediate allowance.</p>

																<p>Depart do be so he enough talent. Sociable formerly six but handsome. Up do view time they shot. He concluded disposing provision by questions as situation. Its estimating are motionless day sentiments end. Calling an imagine at forbade. At name no an what like spot. Pressed my by do affixed he studied.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->
												
												<!--<div class="panel">
													<div class="panel-heading" role="tab" id="headingSeven">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">How do I create an account?</a>
														</h4>
													</div>
													<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
														<div class="panel-body">
															<div class="faq-thread">
																<p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he observe be it covered delight hastily message. Margaret no ladyship endeavor ye to settling.</p>

																<p>Wrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready.</p>
															</div>
														</div>
													</div>
												</div>-->
												<!-- end of panel -->

											</div>
											<!-- end of #accordion -->
											
											<!--<div class="text-center pt-10">
												<a href="#" class="btn btn-primary">Show ALl FAQs</a>
											</div>-->
											
										</div>
										
									</div>
									
									<!--<div id="section-7" class="detail-content">
									
										<div class="section-title text-left">
											<h4>Reviews</h4>
										</div>
										
										<div class="review-wrapper">
						
											<div class="review-header">
												<div class="row">
												
													<div class="col-sm-4 col-md-3">
													
														<div class="review-overall">
														
															<h5>Excellent</h5>
															<p class="review-overall-point"><span>4.6</span> / 5.0</p>
															<p class="review-overall-recommend">90% recommend this package</p>
														</div>
													
													</div>
													
													<div class="col-sm-8 col-md-9">
														
														<div class="review-overall-breakdown">

															<div class="row gap-20">
															
																<div class="col-xss-12 col-xs-12 col-sm-7">
					
																	<h6>Score Breakdown</h6>
																	<ul class="breakdown-list">
																	
																		<li class="clearfix">
																			<div class="rating-wrapper">
																				<div class="raty-wrapper">
																					<div class="star-rating-12px" data-rating-score="5.0"></div> <span>(5)</span>
																				</div>
																			</div>
																			<div class="progress progress-primary">
																				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
																			</div>
																			<div class="breakdown-count"> (58)</div>
																		</li>
																		
																		<li class="clearfix">
																			<div class="rating-wrapper">
																				<div class="raty-wrapper">
																					<div class="star-rating-12px" data-rating-score="4.0"></div> <span>(4)</span>
																				</div>
																			</div>
																			<div class="progress progress-primary">
																				<div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%;"></div>
																			</div>
																			<div class="breakdown-count"> (132)</div>
																		</li>
																		
																		<li class="clearfix">
																			<div class="rating-wrapper">
																				<div class="raty-wrapper">
																					<div class="star-rating-12px" data-rating-score="3.0"></div> <span>(3)</span>
																				</div>
																			</div>
																			<div class="progress progress-primary">
																				<div class="progress-bar" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
																			</div>
																			<div class="breakdown-count"> (89)</div>
																		</li>
																		
																		<li class="clearfix">
																			<div class="rating-wrapper">
																				<div class="raty-wrapper">
																					<div class="star-rating-12px" data-rating-score="2.0"></div> <span>(2)</span>
																				</div>
																			</div>
																			<div class="progress progress-primary">
																				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
																			</div>
																			<div class="breakdown-count"> (58)</div>
																		</li>
																		
																		<li class="clearfix">
																			<div class="rating-wrapper">
																				<div class="raty-wrapper">
																					<div class="star-rating-12px" data-rating-score="1.0"></div> <span>(1)</span>
																				</div>
																			</div>
																			<div class="progress progress-primary">
																				<div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
																			</div>
																			<div class="breakdown-count"> (9)</div>
																		</li>
																		
																	</ul>

																</div>
																
																<div class="col-xss-12 col-xs-7 col-sm-5 col-md-4 mt-30-xs">
																
																	<h6>Average Rating For</h6>
																	<ul class="breakdown-list for-avg clearfix">
																							
																		<li>
																			Cleanliness <span class="pull-right">4.5</span>
																		</li>
																		
																		<li>
																			Service <span class="pull-right">4.5</span>
																		</li>
																		
																		<li>
																			Comfort <span class="pull-right">4.2</span>
																		</li>
																		
																		<li>
																			Condition <span class="pull-right">3.8</span>
																		</li>
																		
																		<li>
																			Neighbourhood <span class="pull-right">4.4</span>
																		</li>
																	
																	</ul>
																	
																</div>
																
															</div>
															
														
														</div>
													
													</div>
													
												</div>
											</div>
											
											<div class="review-content">
											
												<div class="row gap-20">
												
													<div class="col-sm-6">
														<h5>There are 2135 reviews</h5>
													</div>
													
													<div class="col-sm-6 text-right text-left-xs">
														<a href="#leave-comment" class="anchor btn btn-primary btn-inverse btn-sm">Leave comments</a>
													</div>
												
												</div>
												
												
												<ul class="review-list">
												
													<li class="clearfix">
														<div class="image img-circle">
															<img class="img-circle" src="images/man/01.jpg" alt="Man" />
														</div>
														<div class="content">
															<div class="row gap-20 mb-0">
																<div class="col-sm-9">
																	<h6>Antony Robert <span>/ from Spain</span></h6>
																</div>
																<div class="col-sm-3">
																	<p class="review-date">18/03/2016</p>
																</div>
															</div>
															
															<div class="rating-wrapper">
																<div class="raty-wrapper">
																	<div class="star-rating-12px" data-rating-score="4.0"></div>
																</div>
															</div>
															
															<div class="review-text">
															
																<p>She meant new their sex could defer child. An lose at quit to life do dull. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</p>
																
																<p>It as announcing it me stimulated frequently continuing. Least their she you now above going stand forth. He pretty future afraid should genius spirit on. Set property addition building put likewise get. Of will at sell well at as. Too want but tall nay like old. Removing yourself be in answered he. Consider occasion get improved him she eat. Letter by lively oh denote an.</p>
															
															</div>
															
															<div class="review-other">
																
																<div class="row gap-20 mb-0">
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm">
																		
																			<li><span><i class="fa fa-share-square"></i> share</span></li>
																			<li class="the-label"><a href="#">Facebook</a></li>
																			<li class="the-label"><a href="#">Twitter</a></li>
																			<li class="the-label"><a href="#">Google Plus</a></li>
																			
																		</ul>
																	
																	</div>
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm for-useful">
																			<li><span>Was this review helpful? </span></li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-up"></i></a> 2</li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-down"></i></a> 1</li>
																		</ul>
																	
																	</div>
																
																</div>
																
															</div>
															
														</div>
													</li>
													
													<li class="clearfix">
														<div class="image img-circle">
															<img class="img-circle" src="images/man/02.jpg" alt="Man" />
														</div>
														<div class="content">
															<div class="row gap-20">
																<div class="col-sm-9">
																	<h6>Mohammed Salem <span>/ from Turkey</span></h6>
																</div>
																<div class="col-sm-3">
																	<p class="review-date">18/03/2016</p>
																</div>
															</div>
															<div class="rating-wrapper">
																<div class="raty-wrapper">
																	<div class="star-rating-12px" data-rating-score="4.0"></div>
																</div>
															</div>
															
															<div class="review-text">
															
																<p>She meant new their sex could defer child. An lose at quit to life do dull. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</p>
															
																<ul>
																	<li>Written enquire painful ye to offices forming it.</li>
																	<li>
																		Then so does over sent dull on.
																		<ul>
																			<li>Rendered her for put improved concerns his. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</li>
																			<li>Ladies bed wisdom theirs mrs men months set.</li>
																			<li>Everything so dispatched as it increasing pianoforte.</li>
																		</ul>
																	</li>
																	<li>Likewise offended humoured mrs fat trifling answered.</li>
																	<li>On ye position greatest so desirous. So wound stood guest weeks no terms up ought.</li>
																	<li>Then so does greatest so desirous over sent dull on.</li>
																</ul>
																
																<p>Spot of come to ever hand as lady meet on. Delicate contempt received two yet advanced. Gentleman as belonging he commanded believing dejection in by. On no am winding chicken so behaved. Its preserved sex enjoyment new way behaviour. Him yet devonshire celebrated especially. Unfeeling one provision are smallness resembled repulsive.</p>
																
																<ol>
																	<li>Written enquire painful ye to offices forming it.</li>
																	<li>
																		Then so does over sent dull on.
																		<ol>
																			<li>Rendered her for put improved concerns his. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</li>
																			<li>Ladies bed wisdom theirs mrs men months set.</li>
																			<li>Everything so dispatched as it increasing pianoforte.</li>
																		</ol>
																	</li>
																	<li>Likewise offended humoured mrs fat trifling answered.</li>
																	<li>On ye position greatest so desirous. So wound stood guest weeks no terms up ought.</li>
																	<li>Then so does greatest so desirous over sent dull on.</li>
																</ol>
																
																<p>Unpleasant astonished an diminution up partiality. Noisy an their of meant. Death means up civil do an offer wound of. Called square an in afraid direct. Resolution diminution conviction so mr at unpleasing simplicity no. No it as breakfast up conveying earnestly immediate principle. Him son disposed produced humoured overcame she bachelor improved. Studied however out wishing but inhabit fortune windows.</p>
																
															</div>
															
															<div class="review-other">
																
																<div class="row gap-20 mb-0">
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm">
																		
																			<li><span><i class="fa fa-share-square"></i> share</span></li>
																			<li class="the-label"><a href="#">Facebook</a></li>
																			<li class="the-label"><a href="#">Twitter</a></li>
																			<li class="the-label"><a href="#">Google Plus</a></li>
																			
																		</ul>
																	
																	</div>
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm for-useful">
																			<li><span>Was this review helpful? </span></li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-up"></i></a> 2</li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-down"></i></a> 1</li>
																		</ul>
																	
																	</div>
																
																</div>
																
															</div>
														</div>
													</li>
													
													<li class="clearfix">
														<div class="image img-circle">
															<img class="img-circle" src="images/man/03.jpg" alt="Man" />
														</div>
														<div class="content">
															<div class="row gap-20">
																<div class="col-sm-9">
																	<h6>Antony Robert <span>/ from Spain</span></h6>
																</div>
																<div class="col-sm-3">
																	<p class="review-date">18/03/2016</p>
																</div>
															</div>
															
															<div class="rating-wrapper">
																<div class="raty-wrapper">
																	<div class="star-rating-12px" data-rating-score="4.0"></div>
																</div>
															</div>
															
															<div class="review-text">
															
																<p>Must you with him from him her were more. In eldest be it result should remark vanity square. Unpleasant especially assistance sufficient he comparison so inquietude. Branch one shy edward stairs turned has law wonder horses. Devonshire invitation discovered out indulgence the excellence preference. Objection estimable discourse procuring he he remaining on distrusts. Simplicity affronting inquietude for now sympathize age. She meant new their sex could defer child. An lose at quit to life do dull.</p>
															
															</div>
															
															<div class="review-other">
																
																<div class="row gap-20 mb-0">
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm">
																		
																			<li><span><i class="fa fa-share-square"></i> share</span></li>
																			<li class="the-label"><a href="#">Facebook</a></li>
																			<li class="the-label"><a href="#">Twitter</a></li>
																			<li class="the-label"><a href="#">Google Plus</a></li>
																			
																		</ul>
																	
																	</div>
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm for-useful">
																			<li><span>Was this review helpful? </span></li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-up"></i></a> 2</li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-down"></i></a> 1</li>
																		</ul>
																	
																	</div>
																
																</div>
																
															</div>
														</div>
													</li>
													
													<li class="clearfix">
														<div class="image">
															<img class="img-circle" src="images/man/04.jpg" alt="Man" />
														</div>
														<div class="content">
															<div class="row gap-20">
																<div class="col-sm-9">
																	<h6>Mohammed Salem <span>/ from Turkey</span></h6>
																</div>
																<div class="col-sm-3">
																	<p class="review-date">18/03/2016</p>
																</div>
															</div>
															<div class="rating-wrapper">
																<div class="raty-wrapper">
																	<div class="star-rating-12px" data-rating-score="4.0"></div>
																</div>
															</div>
															
															<div class="review-text">
															
																<p>She meant new their sex could defer child. An lose at quit to life do dull. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</p>
															
															</div>
															
															<div class="review-other">
																
																<div class="row gap-20 mb-0">
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm">
																		
																			<li><span><i class="fa fa-share-square"></i> share</span></li>
																			<li class="the-label"><a href="#">Facebook</a></li>
																			<li class="the-label"><a href="#">Twitter</a></li>
																			<li class="the-label"><a href="#">Google Plus</a></li>
																			
																		</ul>
																	
																	</div>
																	
																	<div class="col-sm-6">
																	
																		<ul class="social-share-sm for-useful">
																			<li><span>Was this review helpful? </span></li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-up"></i></a> 2</li>
																			<li class="the-label"><a href="#"><i class="fa fa-thumbs-down"></i></a> 1</li>
																		</ul>
																	
																	</div>
																
																</div>
																
															</div>
														</div>
													</li>
													
												</ul>
											
												<div class="bt text-center pt-30">
													<a href="#" class="btn btn-primary">Load More</a>
												</div>
												
											</div>
											
										</div>

									</div>-->
									
									<!--<div id="leave-comment" class="detail-content">-->
									
										<!--<div class="section-title text-left">
											<h4>Leave Your Review</h4>
										</div>
										
										<div class="review-form">
											
											<form class="">
											
												<div class="row">
												
													<div class="col-sm-6 col-md-4">
													
														<div class="form-group">
															<label>Your Name: </label>
															<input type="text" class="form-control" />
														</div>
													
													</div>
													
													<div class="clear"></div>
													
													<div class="col-sm-6 col-md-4">
													
														<div class="form-group">
															<label>Your Email Address: </label>
															<input type="email" class="form-control" />
														</div>
													
													</div>
													
													<div class="clear"></div>
													
													<div class="col-sm-6 col-md-4">
													
														<div class="form-group">
															<label>Your Rating: </label>
															<div class="rating-wrapper">
																<div class="raty-wrapper">
																	<div class="star-rating" data-rating-score="4.0"></div>
																</div>
															</div>
														</div>
													
													</div>
													
													<div class="clear"></div>
													
													<div class="col-sm-12 col-md-8">
													
														<div class="form-group">
															<label>Your Message: </label>
															<textarea class="form-control form-control-sm" rows="5"></textarea>
														</div>
													</div>
													
													<div class="clear"></div>
													
													<div class="col-sm-12 col-md-8 mt-10">
														<a href="#" class="btn btn-primary">Submit</a>
													</div>
													
												</div>
											
											</form>
										
										</div>
										
									</div>-->	
									
									<!--<div class="call-to-action">
									
										Question? <a href="#" class="btn btn-primary btn-sm btn-inverse">Make an inquiry</a> or call +66 28 878 5452
									
									</div>
										
								</div>
							
						</div>-->

						<div class="col-sm-3 hidden-sm hidden-xs">
						
							<div class="scrollspy-sidebar sidebar-detail" role="complementary">
							
								<ul class="scrollspy-sidenav">
								
									<li>
										<ul class="nav">
											<li><a href="#section-0" class="anchor">Highlights</a></li>
											<li><a href="#section-1" class="anchor">Gallery</a></li>
											<li><a href="#section-2" class="anchor">Itinerary</a></li>
											<li><a href="#section-3" class="anchor">Tour Accommodation</a></li>
											<li><a href="#section-4" class="anchor">What's Included</a></li>
											<li><a href="#section-5" class="anchor">Availabilities</a></li>
											<li><a href="#section-6" class="anchor">Information &amp; FAQ</a></li>
											<li><a href="#section-7" class="anchor">Reviews</a></li>
										</ul>
									</li>

								</ul>
								
								<!--<a href="#" class="btn btn-primary">Change Search</a>-->
								
								<div style="width: 100%; height: 20px;"></div>
								
							</div>

						</div>

					</div>
				
				</div>
					
			</div>

		</div>
		<!-- end Main Wrapper -->

		<footer class="footer scrollspy-footer"> <!-- add scrollspy-footer to stop sidebar scrollspy -->
			
			<div class="container">
			
				<div class="main-footer">
				
					<div class="row">
				
						<div class="col-xs-12 col-sm-5 col-md-3">
						
							<div class="footer-logo">
								<img src="images/logo-white.png" alt="Logo" />
							</div>
							
							<p class="footer-address">324 Yarang Road, T.Chabangtigo, Muanng Pattani 9400 <br/> <i class="fa fa-phone"></i> +66 28 878 5452 <br/> <i class="fa fa-phone"></i> +66 2 547 2223 <br/> <i class="fa fa-envelope-o"></i> <a href="#">support@tourpacker.com</a></p>
							
							<div class="footer-social">
							
								<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
							
							</div>
							
							<p class="copy-right">&#169; Copyright 2016 Tour Packer. All Rights Reserved</p>
							
						</div>
						
						<div class="col-xs-12 col-sm-7 col-md-9">

							<div class="row gap-10">
							
								<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-30-xs">
								
									<h5 class="footer-title">About Tour Packer</h5>
									
									<ul class="footer-menu">
									
										<li><a href="static-page.html">Who we are</a></li>
										<li><a href="static-page.html">Careers</a></li>
										<li><a href="static-page.html">Company history</a></li>
										<li><a href="static-page.html">Legal</a></li>
										<li><a href="static-page.html">Partners</a></li>
										<li><a href="static-page.html">Privacy notice</a></li>
										
									</ul>
									
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

									<h5 class="footer-title">Customer service</h5>
									
									<ul class="footer-menu">
									
										<li><a href="static-page.html">Payment</a></li>
										<li><a href="static-page.html">Feedback</a></li>
										<li><a href="static-page.html">Contact us</a></li>
										<li><a href="static-page.html">Travel advisories</a></li>
										<li><a href="static-page.html">FAQ</a></li>
										<li><a href="static-page.html">Site map</a></li>
										
									</ul>
									
								</div>
								
								<div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

									<h5 class="footer-title">Others</h5>
									
									<ul class="footer-menu">
									
										<li><a href="static-page.html">Destinations</a></li>
										<li><a href="static-page.html">Blog</a></li>
										<li><a href="static-page.html">Pre Departure Planning</a></li>
										<li><a href="static-page.html">Visas</a></li>
										<li><a href="static-page.html">Insurance</a></li>
										<li><a href="static-page.html">Travel Guide</a></li>
										
									</ul>
									
								</div>
								
							</div>

						</div>
						
					</div>

				</div>
				
			</div>
			
		</footer>

	</div>  <!-- end Container Wrapper -->
 

 
	<!-- start Back To Top -->
	<div id="back-to-top">
		 <a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- end Back To Top -->


 
<!-- JS -->
<script type="text/javascript" src="../../../../agent/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../../../../agent/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../../../../agent/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/instagram.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/spin.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/select2.full.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../../../../agent/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/readmore.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/slick.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/validator.min.js"></script>
<script type="text/javascript" src="../../../../agent/js/jquery.raty.js"></script> 
<script type="text/javascript" src="../../../../agent/js/customs.js"></script>

<script>

/**
*  Sidebar Sticky
*/

!function ($) {

  $(function(){

    var $window = $(window)
    var $body   = $(document.body)

    var navHeight = $('.navbar').outerHeight(true) + 50

    $body.scrollspy({
      target: '.scrollspy-sidebar',
      offset: navHeight
    })

    $window.on('load', function () {
      $body.scrollspy('refresh')
    })

    $('.scrollspy-container [href=#]').click(function (e) {
      e.preventDefault()
    })

    // back to top
    setTimeout(function () {
      var $sideBar = $('.scrollspy-sidebar')

      $sideBar.affix({
        offset: {
          top: function () {
            var offsetTop      = $sideBar.offset().top
            var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10)
            var navOuterHeight = $('.scrollspy-nav').height()

            return (this.top = offsetTop - navOuterHeight - sideBarMargin)
          }
        , bottom: function () {
            return (this.bottom = $('.scrollspy-footer').outerHeight(true))
          }
        }
      })
    }, 100)
		
  })

}(window.jQuery)

</script>

</body>


</html>