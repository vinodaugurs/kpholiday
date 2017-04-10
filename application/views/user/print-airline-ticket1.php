<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airline Ticket</title>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>

.Reservation-Wrp{/*width:1000px; margin:0 auto;*/}

.Reservation-Top-Part{ 
	text-align:center; 
	font-size:17px; 
	color:#ce2900; 
	font-weight:bold; 
	font-family: 'Raleway', sans-serif;}

.Reservation-Center-Part{ 
	/*width:80%; 
	margin:0 auto; */
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

.Ticket-Text1{ width:40%; float:left;}
.Ticket-Text2{ width:40%; float:right; text-align:right;}
.Ticket-Text3{ text-align:center; color:#1e92c8;}

</style>



</head>

<body>
 <?php
 
  if($data['0']['ResponseStatus']==1){ 
    // print_r($data);
    ?>

<div id="print-detail">
<div class="Reservation-Wrp" >
    <div class="Reservation-Top-Part" style="   text-align:center;  font-size:17px; color:#ce2900; font-weight:bold; font-family: 'Raleway', sans-serif;">
    
    
    </div><!--Reservation-Top-Part-->

    <div class="Reservation-Center-Part" style="  border:1px solid #66afe9; border-radius:4px; color:#333;">
    	<div class="Reservation-Center-Header" style="background-color:#D9D9D9;  color:#333;  padding:10px 15px 15px 15px;  font-size:20px;">
        	 <div class="Ticket-Text3">
            		<strong>Ticket Reservation</strong>
                </div>
            <div class="Ticket-Text1">
            	<div> 
                    <a href="<?php echo base_url('index.php/home/index');?>" title="Travelo - home"> 
                    <img src="<?php echo base_url('assets/img/Final-logo.png');?>" alt=""/>
                    </a>
                </div>
            </div><!--Ticket-Text-->
            
        	<div class="Ticket-Text2">
            	<u>kpholidays.com e-Ticketing Service</u>
                <div><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818</div>
            
            
            </div>
            <div class="clear" style=" clear:both; float:none;"></div>
        </div><!--Reservation-Center-Header-->
        <div class="Reservation-text2" style="text-align:center; margin-top:10px;  margin-bottom:20px;">
            
            <p><u>Electronic   Reservation  Slip</u></p>
        </div>
             
        <div class="Reservation-two-part" style="width:95%; margin:0 auto; padding-bottom:30px;">
        <div class="Reservation-one1"  style="width:50%; float:left;">
        

        
            <div><strong>Hermes PNR:</strong> <?php echo $data['0']['ReprintOutput']['TicketDetails']['HermesPNR']; ?> </div>
            <!-- <div><strong>Ticket No:</strong> <?php //echo $printData[0]['TicketNumber']; ?> </div> -->
            <div><strong>Transaction Id :</strong> <?php echo $data['0']['ReprintOutput']['TicketDetails']['TransactionId']; ?></div>
            <div><strong>Customer Name:</strong>  <?php echo $data['0']['ReprintOutput']['TicketDetails']['CustomerDetails']['Name']; ?> </div>
            <div><strong>Customer ContactNumber:</strong> <?php echo $data['0']['ReprintOutput']['TicketDetails']['CustomerDetails']['ContactNumber']; ?></div>
            


        </div><!--Reservation-one1-->

        <div class="Reservation-one1" style=" width:50%; float:left;">
         <div><strong>Customer Address:</strong> <?php echo @$data['0']['ReprintOutput']['TicketDetails']['CustomerDetails']['Address']; ?></div>
            <div><strong>Base Origin: </strong>  <?php echo @$data['0']['ReprintOutput']['TicketDetails']['BaseOrigin']; ?></div>
            
            <div><strong>Base Destination::</strong> <?php echo @$data['0']['ReprintOutput']['TicketDetails']['BaseDestination']; ?></div>
            <div><strong>Total Amount: Rs</strong> <?php echo @$data['0']['ReprintOutput']['TicketDetails']['TotalAmount']+$GrandTotalmarkup; ?></div>
         
        
        </div><!--Reservation-one1--> 
        <div class="clear" style=" clear:both; float:none;"></div>

        <h2>AirlineDetails</h2>
        <table border="1px" cellpadding="0" cellspacing="0" width="100%" style="background-color:#d9d9d9; border:1px solid #66afe9; ">
        <tr>
            <td>Airline Code</td>
            <td>Airline PNR</td>
            <td>Airline Name</td>
            <td>Contact Number</td>
            <td>E Mail Id</td>
        </tr>
        <tr>
                            
              <?php foreach($data['0']['ReprintOutput']['TicketDetails']['AirlineDetails'] as $key1=>$AirlineDetails){?>
                <td><?php echo $AirlineDetails['AirlineCode']?></td>
                <td><?php echo $AirlineDetails['AirlinePNR']?></td>
                <td><?php echo $AirlineDetails['AirlineName']?></td>
                <td><?php echo $AirlineDetails['ContactNumber']?></td>
                <td><?php echo $AirlineDetails['EMailId']?></td>  
                <?php } ?>  

        </tr>
        </table>

        <div class="DetailsofPassengers " style=" h3{ color:#464646;}"> 
        <h3>Details  of Passengers </h3>
        
        <table border="1px" cellpadding="0" cellspacing="0" width="100%" style="background-color:#d9d9d9; border:1px solid #66afe9; ">
        	<tr>
           
            
            <td width="14%">PassengerType</td>
            <td width="6%">Name</td>
            <td width="9%">TicketNo</td>
            <td width="11%">FlightNo</td>
            <td width="10%">Origin:</td>
            <td width="15%">DepartureDateTime</td>
            <td width="12%">Destination:</td>
            <td width="11%">AirlineCode</td>
            <td width="12%">ClassCode</td>

            </tr>
            
    
            
<?php foreach($data['0']['ReprintOutput']['TicketDetails']['PassengerDetails'] as $key1=>$PassengerDetails){?>
                                <!--<dt>TicketNumber:</dt><dd><?php echo $PassengerDetails['TicketNumber']?></dd>-->
                                
                                
                                
                                    <?php foreach($PassengerDetails['BookedSegments'] as $key2=>$BookedSegments){?>
                                    <tr>
                                        <td><?php echo $PassengerDetails['PassengerType']?></td>
                                <td><?php echo $PassengerDetails['FirstName'].' '. $PassengerDetails['LastName'];?></td>
                                    
                                    <td><?php echo $BookedSegments['TicketNumber']?></td>
                                    <td><?php echo $BookedSegments['FlightNumber']?></td>
                                    <td><?php echo $BookedSegments['Origin']?></td>
                                    <td><?php echo $BookedSegments['DepartureDateTime']?></td>
                                    <td><?php echo $BookedSegments['Destination']?></td>
                                    <td><?php echo $BookedSegments['AirlineCode']." ".$BookedSegments['AirCraftType'];?></td>
                                    <td><?php echo $BookedSegments['ClassCodeDesc']?></td>
                                    
                                </tr>
                                    <?php }?>
                                
                                <?php } ?>


            
           
        </table>
        
        
        <div class="DetailsofPassengers-text" style="font-size:12px;">*Passenger Who has to carrythe following  photo Identity Card in original</div>
        
        
        
        </div><!--DetailsofPassengers-->
        
        <!-- <div class="Details-textbox2" style="">
        <h3>Identification to be carried</h3>
        
        <div class="">
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>I-card Type</strong>   </div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;"><strong><?php// echo @$printData[0]['TransactionId'] ?></strong></div>
        
        <div class="clear" style=" clear:both; float:none;"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>I-card No.</strong><?php //echo @$printData[0]['TransactionId'] ?></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear" style=" clear:both; float:none;"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left;  margin-bottom:10px;"><strong>Issuing Authority</strong></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear" style=" clear:both; float:none;"></div>
        
        </div>
        
        
        
        
        </div>Details-textbox2--> 
        
        
        <div class="Important-Box3" style="">
 		<h3><u>Important Notes</u></h3>    
        
        
        <p>This is an eTicket itinerary. To enter the airport and for check-in, you must present the itinerary 
receipt along with valid photo identification, viz: Official Government issued photo identification, 
driving license, election photo id, passport (for international passengers) and photo credit card. It 
is mandatory to carry your photo identification during your entire journey. </p> 
  
 <h3><u>Reprint of eTicket(s)</u></h3>     
 <p>If you require a reprint of your eTicket, we recommend you use our Manage Booking feature on 
www.kpholidays.com or request our ticketing staff to email the same at no cost. </p>  
 
        <h3><u>Check-in</u></h3> 
        
        <p>For all flights within India, the check-in counters will close 45 minutes prior to departure and 
boarding gate(s) will close 25 minutes prior to departure. For guests who wish to Tele Check-in, 
please ensure that you collect your boarding pass no later than 50 minutes prior to departure. 
Check-in counters for International flights will close 60 minutes prior to flight departures. </p>
<h3><u>Baggage </u></h3> 
<p>For sector(s) where piece concept is applicable, free baggage allowance per piece is 23 kgs. Cabin 
baggage should not exceed 7 kgs in weight and 115 linear cms. Guests traveling on flights 
originating from Jammu, Srinagar and Leh will not be allowed to carry any cabin baggage. 
Please contact the respective airline(s), or alternatively visit their website(s), to know more 
about your entitlement on Baggage Allowance, Meal(s) and Special Request(s) on flights. </p>
<h3><u>Security Requirement</u></h3> 
<p>Passengers holding ticket(s) purchased on www.kpholidays.com using an alternate individual’s 
credit card must carry a photocopy of the card used to purchase the ticket, self-attested by the 
credit card holder. The photocopy must indicate the passenger(s) name, sector and date of travel 
and must be produced at the time of check-in. Failure to comply with these conditions permits 
Airlines the right to deny the passenger(s) from boarding the flight. The details mentioned above 
do not apply for Net Banking. For International travel, please ensure that the validity of the 
passport is as per the requirements of the destination country. 
Due to security reasons, liquids, aerosols and gels (LAGs) in carry-on baggage are restricted to 
containers of 100ml each. At some airports, duty- free LAGs may be purchased after screening 
checkpoints. At most airports, including Indian airports, transit guests are not allowed to carry 
duty-free LAGs purchased on a previous sector in cabin baggage, these will be confiscated at the 
Security Checkpoint. </p>
        
        
        
        
        
        </div><!--Important-Box3-->
        
        <!--<div class="Please-Text-Box" style="color:#ce2900; 
    font-weight:bold; 
    font-family: 'Raleway', sans-serif;">Please check the ID card number and other particulars before printing. If there is a mismatch kindly select  the  Ticket from Booked History and take the print of Electronic Reservation Slip </div>-->
        
        <div class="Printbtnbox" style="width:350px; margin:30px auto;">
        
                       
        
        <div class="clear" style=" clear:both; float:none;"></div>
        
        </div>

        <div class="clear" style=" clear:both; float:none;"></div>

        
        </div><!--Reservation-two-part-->
 
    </div><!--Reservation-Center-Part-->


</div><!--Reservation-Wrp-->

</div>
<?php }else{

    echo $data['0']['FailureRemarks']."<br/>     ";
} ?> 
</body>
</html>


<script type="text/javascript" src="<?php echo base_url('assets/js/code.jquery.js');?>"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#print').click(function(){
        
                        
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

    function goback(){
        window.history.back();
    }
</script>
