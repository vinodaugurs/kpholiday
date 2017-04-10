<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel Ticket</title>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>

.Reservation-Wrp{width:1000px; margin:0 auto;}

.Reservation-Top-Part{ 
	text-align:center; 
	font-size:17px; 
	color:#ce2900; 
	font-weight:bold; 
	font-family: 'Raleway', sans-serif;}

.Reservation-Center-Part{ 
	width:80%; 
	margin:0 auto; 
	border:1px solid #66afe9; border-radius:4px; color:#333;}
    
.Reservation-Center-Header{
	background-color:#66afe9; 
	color:#fff; 
	padding:15px; 
	font-size:20px;
	
}

.Reservation-text2{ 
	text-align:center; 
	margin-top:10px; 
	margin-bottom:20px;
	}

.Reservation-text2 p{ margin-bottom:10px;}

.clear{ 
	float:none; 
	clear:both;}
	
.Reservation-two-part{ width:95%; margin:0 auto; padding-bottom:30px;}
.Reservation-one1{ width:50%; float:left;	
}

.DetailsofPassengers{}
.DetailsofPassengers h3{ color:#464646;}

.DetailsofPassengers-text{ font-size:12px;}

.Details-textbox2{}
.Details-textbox2left{ width:300px; float:left; margin-bottom:10px;}
.Details-textbox2right{width:300px; float:left;  margin-bottom:10px;}

.Please-Text-Box{
	color:#ce2900; 
	font-weight:bold; 
	font-family: 'Raleway', sans-serif;}
	
	
.Printbtnbox{ width:350px; margin:30px auto;}
	
	
.Print-btn{ width:100px; float:left; background-color:#66afe9; padding:10px; margin-right:15px; text-align:center;}

.Print-btn a{  color:#fff; text-decoration:none;}

.Print-btn2{ width:180px; float:left; background-color:#66afe9; padding:10px; text-align:center;}

.Print-btn2 a{  color:#fff; text-decoration:none;}

</style>



</head>

<body>


<?php 
//print_r($BookingInfoResponse);
$booking_details=$BookingInfoResponse['soapBody']['getBookingDetailsResponse']['getBookingDetailsResult']['BookingDetails']['BookingDetail']['Hotel'];

 if($booking_details['Status']=="CONFIRMED"){
?>
<div id="print-detail">
<div class="Reservation-Wrp" style="width:1000px; margin:0 auto;">
    <div class="Reservation-Top-Part" style="   text-align:center;  font-size:17px; color:#ce2900; font-weight:bold; font-family: 'Raleway', sans-serif;">
    <p>Congratulations. You have successfully made an e-Reservation with these details . Please prints the slip and carry it along with the relevant photo ID  card  while   travelling. </p>
    <p>Thank you for using kpholidays.com services.</p>
    
    </div><!--Reservation-Top-Part-->

    <div class="Reservation-Center-Part" style="    width:80%;  margin:0 auto;  border:1px solid #66afe9; border-radius:4px; color:#333;">
    	<div class="Reservation-Center-Header" style="background-color:#D9D9D9;  color:#333;  padding:10px 15px 15px 15px;  font-size:20px;">
        
            <div class="Ticket-Text3" style="text-align:center; color:#1e92c8;">
            <strong>Hotel Booking</strong>
            </div>

            <div class="Ticket-Text1" style="width:40%; float:left;">
                <div> 
                    <a href="<?php echo base_url('index.php/home/index');?>" title="Travelo - home"> 
                    <img src="<?php echo base_url('assets/img/Final-logo.png');?>" alt=""/>
                    </a>
                </div>
            </div><!--Ticket-Text-->

            <div class="Ticket-Text2" style="width:40%; float:right; text-align:right;">
                <u>kpholidays.com e-Ticketing Service</u>
                <div><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818</div>
            
            
            </div>
            <div class="clear"></div>


        </div><!--Reservation-Center-Header-->
        <div class="Reservation-text2" style="text-align:center; margin-top:10px;  margin-bottom:20px;">
            <p><u>kpholidays.com Hotel booking Service</u></p>
            <p><u>Electronic   Reservation  Slip</u></p>
        </div>
        <?php //print_r($BookingInfoResponse['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel']); ?>
        <div class="Reservation-two-part" style="width:95%; margin:0 auto; padding-bottom:30px;">
        <div class="Reservation-one1"  style="width:50%; float:left;">


<div><strong>Booking Status:</strong><?php echo $booking_details['Status'];?></div>
<div><strong>BookingRefNumber:</strong><?php echo $booking_details['BookingRefNumber'];?></div>
<div><strong>Customer Name:</strong><?php echo $booking_details['GuestName'];?></div>                 
<div><strong>E-mail address:</strong><?php echo $booking_details['GuestEmailid'];?></div>
<div><strong>GuestMobileNumber:</strong><?php echo $booking_details['GuestMobileNumber'];?></div>
<div><strong>HotelName:</strong><?php echo $booking_details['HotelName'];?></div>
<div><strong>Rooms:</strong><?php echo $booking_details['RCount'];?></div>

        

        
        </div><!--Reservation-one1-->
        <div class="Reservation-one1" style=" width:50%; float:left;">
       
<div><strong>Booking Amount:</strong><?php echo $booking_details['TotalPriceINR']+$booking_details['TotalTaxINR']+$tdata[0]['agentMarkup'];;?></div>
<div><strong>RoomType:</strong><?php echo $booking_details['RoomType'];?></div>
<div><strong>CheckIn Date:</strong><?php echo $booking_details['CheckIn'];?></div>                     
<div><strong>CheckOut Date:</strong><?php echo $booking_details['CheckOut'];?></div>   
<div><strong>Street Address and number:</strong><?php echo $booking_details['address'];?></div>
<div><strong>NoOfNight:</strong><?php echo $booking_details['NoOfNight'];?></div>
<div><strong>Paxinfo:</strong><?php echo $booking_details['Paxinfo'];?></div>
<div><strong>RoomInfo:</strong><?php echo $booking_details['RoomInfo'];?></div>


        
        </div><!--Reservation-one1-->
        <div class="clear" style="float:none; clear:both;"></div>


       <!--  <div class="DetailsofPassengers " style=" h3{ color:#464646;}"> 
        <h3>Details  of Passengers </h3>
        
        <table border="1px" cellpadding="0" cellspacing="0" width="100%" style="background-color:#d9d9d9; border:1px solid #66afe9; ">
        	<tr>
            <td><strong>Sno.</strong></td>
            <td><strong>Name </strong></td>
            <td><strong>Age</strong></td>
            <td><strong>Sex</strong></td>
            </tr>
        	<tr>
            <td>1</td>
            <td>RK Tiwari* </td>
            <td>39</td>
            <td>Male </td>
            </tr>
        
        </table> 
        
        <div class="DetailsofPassengers-text" style="font-size:12px;">*Passenger Who has to carrythe following  photo Identity Card in original</div>
        -->
        
        
        <!--</div>DetailsofPassengers-->
        
        <div class="Details-textbox2" style="">
        <h3>Identification to be carried</h3>
        
        <div class="">
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>Type</strong>   </div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;"><strong> <?php echo @$printData[0]['cardType']; ?></strong></div>
        
        <div class="clear" style="float:none; clear:both;"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>Identification No.</strong></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;"><?php echo @$printData[0]['cardNo']; ?></div>
        
        <div class="clear" style="float:none; clear:both;"></div>
        
        <!-- <div class="Details-textbox2left" style="width:300px; float:left;  margin-bottom:10px;"><strong>Issuing Authority</strong></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div> -->
        
        <div class="clear" style="float:none; clear:both;"></div>
        
        </div>
        
        
        
        
        </div><!--Details-textbox2-->
        
        
        <div class="Important-Box3" style="">
        <h3>Important</h3>    
        
        
        <ul>
        <li>E-ticket passenger is permitted in the train against  a berth/seat only when his name appears in the reservation chart  falling  which he can be treated as a passenger traveling without ticket</li>
        <li>On demand from ticket chacking staff the passenger should produce the above noted photo identity card in original  along with the ’Electronic Reservation Slip print out. In case the passenger does not carry the electronic  reservation slip , a charge of Rs.50/- per ticket shall be recovered by the ticket checking   staff and an excess  fare ticket will be issued in lieu of that</li>
        <li>E-ticket cancellations are permitted through www.kpholidays.com by the user. In case e-ticket is booked through an agent , please contact respective agent for cancellations.</li>
        
        <li>If the name of the passenger does not appear on the chart, the passenger should not board the train as he/she will be treated as a passenger with out ticket and dealt accordingly.</li>
   
        </ul>   
 <h3>For cancellation and Refund:</h3>     
 <p>Passenger should access the website <a href="http://www.kpholidays.com">www.kpholidays.com </a> in only for cancellation as no cancellation is permitted at  railway counters for electronic tickets</p>  
        
        
        
        </div><!--Important-Box3-->
        </p>   
 <h3>For cancellation and Refund:</h3>     
 <p>Passenger should access the website <a href="#"> www.kpholidays.com </a> in only for cancellation as no cancellation is permitted at  railway counters for electronic tickets</p>  
        
        
        
        </div><!--Important-Box3-->
        
        <div class="Please-Text-Box" style="color:#ce2900; 
    font-weight:bold; 
    font-family: 'Raleway', sans-serif;">Please check the ID card number and other particulars before printing. If there is a mismatch kindly select  the  Ticket from Booked History and take the print of Electronic Reservation Slip </div>
        
        <div class="Printbtnbox" style="width:350px; margin:30px auto;">
        
        <div class="Print-btn" id="print" style="width:100px; float:left; background-color:#66afe9; padding:10px; margin-right:15px; text-align:center;"><a href="#" style=" color:#fff; text-decoration:none;">Print Ticket</a></div>               
        <div class="Print-btn2" style=" width:180px; float:left; background-color:#66afe9; padding:10px; text-align:center;"><a href="#" onclick="goBack()" style="color:#fff; text-decoration:none;">Back </a></div>
        <div class="clear" style="float:none; clear:both;"></div>
        
        </div>
        
        <div class="clear" style="float:none; clear:both;"></div>
        
        <div><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818  </div>
        
        
        
        </div><!--Reservation-two-part-->
        
        
    
    
    
    </div><!--Reservation-Center-Part-->








</div><!--Reservation-Wrp-->

</div>

<?php }else{
     echo "<p class='ext-center'>Hotel Booking has been cancel.</p>
    <button onClick='goBack();'>Back </button>
    ";

    } ?>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url('assets/js/code.jquery.js');?>"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#print').click(function(){
// alert('hello');            
        var table = $('#print-detail').html();


      var printWindow = window.open('', '', 'height=400,width=800');
      printWindow.document.write('<html><head><title>Ticket Detail</title>');
      printWindow.document.write('</head><body >');
      printWindow.document.write(table);
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();

      });
    });

function goBack() {
    window.history.back();
}
</script>
