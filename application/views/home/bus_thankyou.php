<?php $booking_details=$data['ReprintOutput']['ReprintTicketDetails'];
//print_r($booking_details);
?>
   <div id="page-wrapper">
	<?php  include'header.php';?> 
        
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Thank You</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo base_url();?>">HOME</a></li>
                  
                    <li class="active">Thank you</li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="booking-information travelo-box">
                            <h2>Booking Confirmation</h2>
                            <hr />
                            <div class="booking-confirmation clearfix">
                                <i class="soap-icon-recommend icon circle"></i>
                                <div class="message">
                                    <h4 class="main-message">Thank You. Your Booking Order is Confirmed Now.</h4>
                                    <p>A confirmation email has been sent to your provided email address.</p>
                                </div>
                                <!-- <a href="#" class="button btn-small print-button uppercase" > -->
                                <a href="<?php echo base_url('index.php/bus/get_print/'.$booking_details['ReprintPNRDetails']['TransactionId']); ?>"><button class="button btn-small print-button uppercase">print Details</button></a>
                            </div>
                            <hr />
                            <h2>Traveler Information</h2>
                            <div id="print_detail">
                            <dl class="term-description">
                            	<dt>Customer Name:</dt><dd><?php echo $booking_details['BookingCustomerDetails']['Name'];?></dd>
                                <dt>Contact Number:</dt><dd><?php echo $booking_details['BookingCustomerDetails']['ContactNumber'];?></dd>
                            	<dt>Customer EmailId:</dt><dd><?php echo $booking_details['BookingCustomerDetails']['EmailId'];?></dd>                 
                                <dt>IdProofNumber:</dt><dd><?php echo $booking_details['BookingCustomerDetails']['IdProofNumber'];?></dd>
                                <dt>TransactionId:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TransactionId'];?></dd>
                                <dt>TransportId:</dt><dd><?php echo $bus_dietail['TransportId'];?></dd>
                                <dt>UserTrackId:</dt><dd><?php echo $data['UserTrackId'];?></dd>
                                <dt>TransportPNR:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TransportPNR'];?></dd>
                                <dt>TotalAmount:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TotalAmount'];?></dd>
                                <dt>Total Tickets:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TotalTickets'];?></dd>
                                <dt>BusName:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['BusName'];?></dd>
                                <dt>Origin:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['Origin'];?></dd>
                                <dt>Destination:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['Destination'];?></dd>
                                <dt>TravelDate:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TravelDate'];?></dd>
                                <dt>DepartureTime:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['DepartureTime'];?></dd>                     			<?php foreach($booking_details['ReprintPNRDetails']['ReprintPaxList'] as $key=>$pasenger){?>
                                <dt>TicketNumber <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['TicketNumber'];?></dd>  
                                <dt>SeatNo <?php echo count($booking_details['ReprintPNRDetails']['ReprintPaxList']>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['SeatNo'];?></dd>
                                <dt>PassengerName <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['PassengerName'];?></dd>
                                <dt>Gender <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['Gender'];?></dd>
                                <dt>BoardingPoints <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['BoardingPoints']['Place'];?></dd>
                                <dt>BoardingTime <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['BoardingPoints']['Time'];?></dd>
                                
                                <dt>Address <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['BoardingPoints']['Address'];?></dd>
                                <dt>LandMark <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['BoardingPoints']['LandMark'];?></dd>	 	
                                <dt>ContactNumber <?php echo (count($booking_details['ReprintPNRDetails']['ReprintPaxList'])>1)?$key+1:''?>:</dt><dd><?php echo $pasenger['BoardingPoints']['ContactNumber'];?></dd> 	   <?php }?>
                                <dt>TransportName:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TransportDetails']['TransportName'];?></dd>
                                 <dt>Transport ContactNumber:</dt><dd><?php echo $booking_details['ReprintPNRDetails']['TransportDetails']['ContactNumber'];?></dd>
                            </dl>
                            </div>

                            <hr />
                            <h2>Payment</h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br />
                            <p class="red-color">Payment is made by Credit Card Via Paypal.</p>
                            <hr />
                            <h2>View Booking Details</h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br />
                            <a href="#" class="red-color underline view-link">https://www.kpholidays.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box contact-box">
                            <h4>Need kpholidays Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@kpholidays.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4>Why Book with us?</h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Fare Details</h4>
        <a href=""></a>
	  </div>
      <div class="modal-body">
        <!-- Nav tabs -->

      <div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
 	  </div>
	  <p  id="wait" align="center">Please Wait ....</p>
	  <p  class="fare_rule">
	  
	  </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
 </div>
  
<?php  include'footer.php';?> 

 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog modal-sm">

    <div class="modal-content">

         <div id="progress_bar" class="ui-progress-bar ui-container">

         <div class="ui-progress" style="width: 79%;">

        <span class="ui-label" style="display:none;">Processing <b class="value">79%</b></span>

       </div>

  

    </div>

  </div>

</div>



</div>
  <!-- Google Map Api -->
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    
<script>    //Finding the fare Rule and Tax  Details                   

$(document).ready(function(){      
	
$(".farerule").click(function()
  {
	var fare=$(this).attr('id');
	datat=$("#div_"+fare).html();
       var fare = JSON.parse(datat);
   $.ajax({
		
		type:"post",
		url:"<?php echo base_url('index.php/flight/internal_tax_fare');?>",
		data : {value: fare},
		 beforeSend: function() {
             
             
           },
        success:function(data)
        {     
			   $('.fare_rule').html(data);
               $(".preloader").hide(); 
			   $("#wait").hide();
		}		
	}); 
 });
	$(".selectnow").click(function(){
		
		var booking_data=$(this).attr('id');
		datat=$("#sdiv_"+booking_data).html();
        var booking_data = JSON.parse(datat);
	     $.ajax({
			 type:"post",
             url:"<?php echo base_url('index.php/flight/International_OnewayBooking');?>",			 
		     data : {value: booking_data},
			   success:function(data)
               {     
			    alert(data);
			    window.location.href='<?php echo base_url('index.php/flight/InternationalBookingRespons');?>';
		       }
		 });
	});	  
  
});
</script>

 
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#price-range").slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 100, 800 ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
                }
            });
            tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

            function convertTimeToHHMM(t) {
                var minutes = t % 60;
                var hour = (t - minutes) / 60;
                var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
                var date = new Date("2014/01/01 " + timeStr + ":00");
                var hhmm = date.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'});
                return hhmm;
            }
            tjq("#flight-times").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 5,
                values: [ 360, 1200 ],
                slide: function( event, ui ) {
                    
                    tjq(".start-time-label").html( convertTimeToHHMM(ui.values[0]) );
                    tjq(".end-time-label").html( convertTimeToHHMM(ui.values[1]) );
                }
            });
            tjq(".start-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 0 )) );
            tjq(".end-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 1 )) );
        });
		
		tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        });
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng(<?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['latitude']?>,<?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['longitude']?>);
        var mapOptions = {
            center: fenway,
            zoom: 12
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
        function initialize() {
            tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
            map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>

