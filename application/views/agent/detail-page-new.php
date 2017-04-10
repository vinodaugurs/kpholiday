<?php $this->load->view('agent/header'); ?>

<div class="container">
  <div class="flex-row">
    <div class="flex-column flex-md-8 flex-sm-12">
      <h1 class="hero-title"><?php echo $display[0]['pack_name']; ?></h1>
      <p class="line18"><?php echo $display[0]['package_type']; ?></p>
      <ul class="list-col clearfix">
        <li class="duration-box">
          <div class="meta"> <span class="block"><?php echo $display[0]['days']; ?></span> Days </div>
          <div class="meta"> &amp; </div>
          <div class="meta"> <span class="block"><?php echo $display[0]['nights']; ?></span> Nights </div>
        </li>
        <li class="price-box">
          <div class="meta"> <span class="block"><i class="fa fa-inr"></i><?php echo $display[0]['price']; ?></span> starting from </div>
        </li>
      </ul>
    </div>
  </div>
</div>
</div>
<!-- end Page title -->

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
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_1'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_2'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_3'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_4'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_5'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_6'];?>" alt="Image" /></div>
                </div>
              </div>
              <div class="slider gallery-nav">
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_1'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_2'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_3'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_4'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_5'];?>" alt="Image" /></div>
                </div>
                <div>
                  <div class="image"><img src="http://kpholidays.com/upload/package/<?php echo $display[0]['image_6'];?>" alt="Image" /></div>
                </div>
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

                  </ul>
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
                            <h5 class="panel-title"> <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one"><span class="absolute-day-number">1</span> Visit: Dubrovnik</a> </h5>
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
                            <h5 class="panel-title"> <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-two"><span class="absolute-day-number">2</span> Visit: Sipan/Trstenik</a> </h5>
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
                            <h5 class="panel-title"> <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-three"><span class="absolute-day-number">3</span> Visit: Korcula</a> </h5>
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
                            <h5 class="panel-title"> <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-four"><span class="absolute-day-number">4</span> Visit: Hvar</a> </h5>
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
                  <div class="hotel-item mb-1"> <a href="#">
                    <div class="image"> <img src="images/accomodation/01.jpg" alt="Hotel" /> </div>
                    <div class="content">
                      <h6>Beach Hilton Hotel</h6>
                    </div>
                    </a> </div>
                </div>
                <div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
                  <div class="hotel-item mb-1"> <a href="#">
                    <div class="image"> <img src="images/accomodation/02.jpg" alt="Hotel" /> </div>
                    <div class="content">
                      <h6>The Privilege Floor @ Croatia</h6>
                    </div>
                    </a> </div>
                </div>
                <div class="col-sm-xss-12 col-xs-6 col-sm-4 col-md-4">
                  <div class="hotel-item mb-1"> <a href="#">
                    <div class="image"> <img src="images/accomodation/03.jpg" alt="Hotel" /> </div>
                    <div class="content">
                      <h6>Croatia Grande Palace Hotel</h6>
                    </div>
                    </a> </div>
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
              <li> <i class="fa fa-check-circle text-primary"></i>
                <h6 class="heading mt-0">Guide</h6>
                <p>Adieus except say barton put feebly favour him.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <h6 class="heading mt-0">Meals</h6>
                <p>4 breakfast &amp; 3 dinners </p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <h6 class="heading mt-0">Transport</h6>
                <p>Modern air conditioned coach with reclining seats, TV for showing DVDs, and toilet</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <h6 class="heading mt-0">5 Experiences</h6>
                <p>Warmth object matter course active law spring six. Pursuit showing tedious unknown winding see had man add.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <h6 class="heading mt-0">Other</h6>
                <p>Free Wi-fi in all hotels <br />
                  All taxes and fees <br />
                  Any public transport used as part of the tour (excludes free days) <br />
                  Free Expat Explore tour souvenir</p>
              </li>
              <li> <i class="fa fa-times-circle text-light"></i>
                <h6 class="heading mt-0">Flights</h6>
                <p>Warmth object matter course active law spring six <a href="#">line to some where</a>. Pursuit showing tedious unknown winding see had man add.</p>
              </li>
              <li> <i class="fa fa-times-circle text-light"></i>
                <h6 class="heading mt-0">Insurance</h6>
                <p>Had repulsive dashwoods suspicion sincerity but advantage now him. Remark easily garret nor nay <a href="#">line to some where</a>. Civil those mrs enjoy shy fat merry. You greatest jointure saw horrible.</p>
              </li>
            </ul>
            <h5 class="heading">Optional Excursions</h5>
            <p>Why painful the sixteen how minuter looking nor. Subject but why ten earnest husband imagine sixteen brandon. Are unpleasing occasional celebrated motionless unaffected conviction out.</p>
            <ul class="list-with-icon col-3 clearfix">
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>Marianne property cheerful.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>Clothes parlors however by cottage.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>In views it or meant drift.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>Be concern parlors settled.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>Remainder northward performed</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>Yet late add name was rent.</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>park from rich</p>
              </li>
              <li> <i class="fa fa-check-circle text-primary"></i>
                <p>He always do do former.</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
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
          <div class="footer-logo"> <img src="images/logo-white.png" alt="Logo" /> </div>
          <p class="footer-address">324 Yarang Road, T.Chabangtigo, Muanng Pattani 9400 <br/>
            <i class="fa fa-phone"></i> +66 28 878 5452 <br/>
            <i class="fa fa-phone"></i> +66 2 547 2223 <br/>
            <i class="fa fa-envelope-o"></i> <a href="#">support@tourpacker.com</a></p>
          <div class="footer-social"> <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a> </div>
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
</div>
<!-- end Container Wrapper --> 

<!-- start Back To Top -->
<div id="back-to-top"> <a href="#"><i class="fa fa-angle-up"></i></a> </div>
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
</body></html>