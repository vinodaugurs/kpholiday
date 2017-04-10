<style>
.aft-img{ margin-bottom:15px;}


</style>

<footer id="footer">

    <div class="footer-wrapper">

      <div class="container">

        <div class="row">

          <div class="col-sm-6 col-md-3">

            <h2>Discover</h2>

            <ul class="discover triangle hover row">
              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/aboutus');?>">About</a></li>
              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/servicespage');?>">Services</a></li>
              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/contactuspage');?>">Contact us</a></li>

              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/UserAgreement');?>">User Agreement</a></li>

              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/PrivacyPolicy');?>">Policies</a></li>

              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/Teamkpholidays');?>">The Team</a></li>

              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/FareRules');?>">Fare Rules</a></li>

              <li class="active1 col-xs-6"><a href="<?php echo base_url('index.php/home/TermsofService');?>">Terms & Conditions</a></li>

              <li class="col-xs-6"><a href="#">Press Releases</a></li>

              <li class="col-xs-6"><a href="#">Why Host</a></li>

              <li class="col-xs-6"><a href="#">Blog Posts</a></li>

              <li class="col-xs-6"><a href="#">Social Connect</a></li>

              <li class="col-xs-6"><a href="HelpTopics">Help Topics</a></li>

              <li class="col-xs-6"><a href="<?php echo base_url('index.php/home/SiteMap');?>"></a></li>

              

            </ul>

          </div>

          <div class="col-sm-6 col-md-3">

            <h2>Affiliates</h2>

            <div class="aft-img">
            <img src="<?php echo base_url('image/aft-img33.jpg');?>" alt="" />
            </div><!--aft-img-->
            
            <div class="aft-img">
            <img src="<?php echo base_url('image/aft-img2.jpg');?>" alt="" />
            </div><!--aft-img-->
            
            <div class="aft-img">
            <img src="<?php echo base_url('image/aft-img3.jpg');?>" alt="" />
            </div><!--aft-img-->

          </div>

          <div class="col-sm-6 col-md-3">

            <h2>Mailing List</h2>

            <p>Sign up for our mailing list to get latest updates and offers.</p>

            <br />

            <div class="icon-check1" style="position:relative;">

              <input type="email" id="newsletteremail" class="input-text full-width" required="required" placeholder="your email" />
			  <button name="Add" class="Add-btn" style=" position:absolute; top:0px; right:0;" id="newsletter">Add</button>
              <div class="clearfix"></div>	
            </div>

            <br />

            <span>We respect your privacy</span> </div>

          <div class="col-sm-6 col-md-3">

            <h2>About kpholidays</h2>

            <p>By using new methods and advanced technology, we can offer the lowest fares and highest standard of service in travel today</p>

            <br />

            <address class="contact-details">

            <span class="contact-phone" style=" font-size:15px;"><i class="soap-icon-phone"></i> 0522-4024688 ,&nbsp; &nbsp;+91-9235181818</span> <br />
            <span class="contact-phone" style=" font-size:15px;"><i class="soap-icon-phone"></i> +91-7897666669

            <a href="#" class="contact-email">info@kpholidays.com</a></span>

            </address>

            <ul class="social-icons clearfix">

              <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>

              <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>

              <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>

              <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>

              <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>

              <li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>

              <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>

            </ul>

          </div><br/>

		 

        </div>

      </div>
      
      <div class="footer-Btm">
      
      
      	  <!--Copyright 2016--> <a href="http://augurs.in/" target="_blank">Powered by Augurs Technologies</a>
      </div><!-- footer-Btm -->
      
      

    </div>

	

    

  </footer>

<script>
$("#newsletter").click(function(e) {
	 if($("#newsletteremail").val()==''){
		 alert("Please Enter valid email addresss");
		 return false;
	 }
	 
	 $.ajax ( {
          url: "<?php echo base_url('index.php/home/addnewsletter');?>",
          data: {email: $("#newsletteremail").val()},         
          success: function(data) {
			  alert(data);
		  } 
    })
	
    
});
</script>  

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 





<!-- Twitter Bootstrap --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 



<!-- load revolution slider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>">

</script> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> 



<!-- load BXSlider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js');?>"></script> 



<!-- Flex Slider --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- waypoint --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script> 



<!-- load page Javascript --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> 





<!-- Javascript --> 



</body>

</html>

