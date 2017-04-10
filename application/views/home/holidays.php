<!DOCTYPE html><html><!--<![endif]--><head><!-- Page Title --><title>Ease Yatara</title><!-- Meta Tags --><meta charset="utf-8"><meta name="keywords" content="HTML5 Template" /><meta name="description" content="Travelo | Responsive HTML5 Travel Template"><meta name="author" content="SoapTheme"><meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Theme Styles --><link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type='text/css'><link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" type='text/css'><link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'><link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css');?>" type='text/css'><!-- Current Page Styles --><link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/settings.css');?>" media="screen" /><link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/style.css');?>" media="screen" /><link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.css');?>" media="screen" /><link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/flexslider/flexslider.css');?>" media="screen" /><script type="text/javascript" src="<?php echo base_url('assets/js/code.jquery.js');?>"></script> <!-- Main Style --><link id="main-style" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"><!-- Custom Styles --><link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>"><!-- Updated Styles --><link rel="stylesheet" href="<?php echo base_url('assets/css/updates.css');?>"><!-- Updated Styles --><link rel="stylesheet" href="<?php echo base_url('assets/css/updates.css');?>"><!-- Responsive Styles --><link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>"><script type="text/javascript" src="<?php echo base_url('assets/js/pace.min.js');?>" data-pace-options='{ "ajax": false }'></script><script type="text/javascript" src="<?php echo base_url('assets/js/page-loading.js');?>"></script></head><body><div id="page-wrapper">   <!--Header Section begion here-->     <?php  include'header.php';?>    <!--Header Section Close here-->      <!--Image slider Section goes here --><div id="slideshow">                      		   <div class="fullwidthbanner-container">                <div class="revolution-slider" style="height: 0; overflow: hidden;">                    <ul>    <!-- SLIDE  -->                        <!-- Slide1 -->                        <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">                            <!-- MAIN IMAGE -->                            <img src="<?php echo base_url('image/image1.jpg');?>" width="1000" height="600" alt="">                        </li>                                                <!-- Slide2 -->                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">                            <!-- MAIN IMAGE -->                            <img src="<?php echo base_url('image/image2.jpg');?>" alt="">                        </li>                                                <!-- Slide3 -->                        <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">                            <!-- MAIN IMAGE -->                            <img src="<?php echo base_url('image/image3.jpg');?>" alt="">                        </li>                    </ul>                </div>            </div>			        </div><div  style="margin-top:-240px;">		<?php include'searchbox_wraper.php';?>		</div>  <!--Image slider Section close here -->    <!--Search box content gose here-->      <!--Search box content close here-->    <section id="content">    <!-- Popuplar Destinations -->	 <?php  $destination= $this->user_model->destination();        ?>	<div class="container">                <div class="section">                    <h2>Featured Destinations</h2>                    <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">                        <ul class="slides image-box style11">                       <?php foreach($destination as $dest){?>     							<li>                                <article class="box">                                    <figure>                                        <a title="" href="#"><img alt="" class="img-responsive" 																				src="<?php echo base_url('destination/'.$dest['main_image']);?>"></a>                                        <figcaption>                                            <h3 class="caption-title"><?php echo $dest['name'];?></h3>                                            <span></span>                                        </figcaption>                                    </figure>                                </article>                                                           </li>					   <?php }?>					                                                       </ul>                    </div>                    <h2>Travel Guide and Tips</h2>                    <div class="row">                        <div class="col-sms-6 col-sm-6 col-md-3">                            <div class="travelo-box">                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Plan your Travels</h4>                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>                            </div>                        </div>                        <div class="col-sms-6 col-sm-6 col-md-3">                            <div class="travelo-box">                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Check Availability</h4>                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>                            </div>                        </div>                        <div class="col-sms-6 col-sm-6 col-md-3">                            <div class="travelo-box">                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Get Insurance</h4>                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>                            </div>                        </div>                        <div class="col-sms-6 col-sm-6 col-md-3">                            <div class="travelo-box">                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Secure your Bookings</h4>                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>                            </div>                        </div>                    </div>                </div>            </div>    <div class="global-map-area section parallax" data-stellar-background-ratio="0.5">                <div class="container description text-center">                    <h1><font color="black">How kpholidays Works?</font></h1>                    <br>                    <div class="travelo-process">                        <img src="<?php echo base_url('image/travelo_process.png');?>" alt="">                        <div class="process first icon-box style12">                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="1">                                <h4><font color="black">Explore Destinations</font></h4>                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>                            </div>                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="0">                                <i class="soap-icon-beach circle"></i>                            </div>							                        </div>                        <div class="process second icon-box style12">                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="1.5">                                <i class="soap-icon-availability circle"></i>                            </div>                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="2.5">                                <h4><font color="black">Check Availability</font></h4>                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>                            </div>                        </div>                        <div class="process third icon-box style12">                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="2">                                <i class="soap-icon-stories circle"></i>                            </div>                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="3">                                <h4><font color="black">Book Online</font></h4>                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>                            </div>                        </div>                        <div class="process forth icon-box style12">                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="4.5">                                <h4><font color="black">Get Ready to Fly</font></h4>                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>                            </div>                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="3.5">                                <i class="soap-icon-plane-left takeoff-effect1 circle"></i>                            </div>                        </div>                    </div>                </div>            </div>              </section>  <!--footer bar open -->  <?php include'footer.php';?>  <!--footer bar Close --></div><!-- Javascript --> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> <!-- Twitter Bootstrap --> <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> <!-- load revolution slider scripts --> <script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> <!-- load BXSlider scripts --> <script type="text/javascript" src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js');?>"></script> <!-- Flex Slider --> <script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js');?>"></script> <!-- parallax --> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> <!-- parallax --> <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> <!-- waypoint --> <script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script> <!-- load page Javascript --> <script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> <script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> <script type="text/javascript">        tjq(document).ready(function() {            tjq('.revolution-slider').revolution(            {                dottedOverlay:"none",                delay:3000,                startwidth:1170,                startheight:646,                onHoverStop:"on",                hideThumbs:10,                fullWidth:"on",                forceFullWidth:"on",                navigationType:"none",                shadow:0,                spinner:"spinner4",                hideTimerBar:"on",            });        });    </script></body></html>