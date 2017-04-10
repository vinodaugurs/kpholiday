<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airline Ticket</title>
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


<div id="print-detail">
<div class="Reservation-Wrp" style="width:1000px; margin:0 auto;">
    <div class="Reservation-Top-Part" style="   text-align:center;  font-size:17px; color:#ce2900; font-weight:bold; font-family: 'Raleway', sans-serif;">
    <p>Congratulations. You have successfully made an e-Reservation with these details . Please prints the slip and carry it along with the relevant photo ID  card  while   travelling. </p>
    <p>Thank you for using kpholidays.com services.</p>
    
    </div><!--Reservation-Top-Part-->

    <div class="Reservation-Center-Part" style="    width:80%;  margin:0 auto;  border:1px solid #66afe9; border-radius:4px; color:#333;">
        <div class="Reservation-Center-Header" style="background-color:#66afe9;  color:#fff;  padding:15px;  font-size:20px;">
        Ticket Reservation
        </div><!--Reservation-Center-Header-->
        <div class="Reservation-text2" style="text-align:center; margin-top:10px;  margin-bottom:20px;">
            <p><u>kpholidays.com e-Ticketing Service</u></p>
            <p><u>Electronic   Reservation  Slip</u></p>
        </div>
             
        <div class="Reservation-two-part" style="width:95%; margin:0 auto; padding-bottom:30px;">
        <div class="Reservation-one1"  style="width:50%; float:left;">
        
        <?php 
        $jsonData = $printData[0]['AirlineDetails']; 
        $flightDetail = json_decode($jsonData, true);
         ?>

            <div><strong>Transaction  ID:</strong> <?php echo $printData[0]['TransactionId']; ?> </div>
            <!-- <div><strong>Ticket No:</strong> <?php //echo $printData[0]['TicketNumber']; ?> </div> -->
            <div><strong>Airline Name :</strong> <?php echo $flightDetail[0][0]['AirlineName']; ?></div>
            <div><strong>Airline Code:</strong>  <?php echo $flightDetail[0][0]['AirlineCode']; ?> </div>
            <div><strong>Airline PNR:</strong> <?php echo $flightDetail[0][0]['AirlinePNR']; ?></div>
            <div><strong>Address :</strong> <?php echo $flightDetail[0][0]['Address1'] .','. $flightDetail[0][0]['Address2'].', '.$flightDetail[0][0]['City']; ?></div>
            <div><strong>Contact No: </strong>  <?php echo $flightDetail[0][0]['ContactNumber']; ?></div>
            
            <div><strong>Total Fare :</strong> Rs. <?php echo $printData[0]['TotalAmount']; ?></div>

        </div><!--Reservation-one1-->

        <div class="Reservation-one1" style=" width:50%; float:left;">
        <!-- <div><strong>Passenger Name :</strong> <?php //echo $printData[0]['PassengerName']; ?></div> -->
        <!-- <div><strong>Passenger Type :</strong> <?php //echo $printData[0]['PassengerType']; ?></div> -->

        <div><strong>Booking Type:</strong>  <?php $type = $printData[0]['BookingType'];
                                if($type == 'R'){echo "Roundtrip";}else{ echo "One Way";} ?></div>

        <div><strong>Travelar Type:</strong> <?php $type = $printData[0]['TravelType'];
                                if($type == 'D'){echo "Domistic"; }else{echo "International";} ?></div>
        <!-- <div><strong>Flight Class :</strong> <?php //echo $printData[0]['ClassCodeDesc']; ?></div> -->

        <div><strong>From:</strong><?php echo $printData[0]['BaseOrigin']; ?></div>
        <div><strong>To:</strong><?php echo $printData[0]['BaseDestination']; ?></div>
        <div><strong>Disparture Date and Time:</strong>  <?php echo $printData[0]['DepartureDateTime']; ?></div>
        <div><strong>Arrival Date and time:</strong>  <?php echo $printData[0]['Arrivaldatetime']; ?></div>

        <!-- <div><strong>Transmission Control No:</strong> <?php //echo $printData[0]['TransmissionControlNo']; ?></div> -->
         
        
        </div><!--Reservation-one1-->
        <div class="clear"></div>


        <div class="DetailsofPassengers " style=" h3{ color:#464646;}"> 
        <h3>Details  of Passengers </h3>
        
        <table border="1px" cellpadding="0" cellspacing="0" width="100%" style="background-color:#d9d9d9; border:1px solid #66afe9; ">
            <tr>
            <td><strong>Sno.</strong></td>
            <td><strong>Name </strong></td>
            <td><strong>Ticket No</strong></td>
            <td><strong>Passenger Type</strong></td>
            <td><strong>Flight Class</strong></td>
            <td><strong>Transmission Control No</strong></td>


            </tr>
            
            <?php $ticketNo = explode(',', $printData[0]['TicketNumber']);
                  $passengerName = explode(',', $printData[0]['PassengerName']);
                  $PassengerType = explode(',', $printData[0]['PassengerType']);
                  $flightClass = explode(',', $printData[0]['ClassCodeDesc']);
                  $TransmissionControlNo = explode(',', $printData[0]['TransmissionControlNo']);


            // print_r($data);

            for($i=0;$i<count($ticketNo);$i++){ ?>
            <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $passengerName[$i]; ?></td>
            <td><?php echo $ticketNo[$i]; ?></td>
            <td><?php echo $PassengerType[$i]; ?></td>
            <td><?php echo $flightClass[$i]; ?></td>
            <td><?php echo $TransmissionControlNo[$i]; ?></td>


            </tr>
            <?php } ?>
        </table>
        
        <div class="DetailsofPassengers-text" style="font-size:12px;">*Passenger Who has to carrythe following  photo Identity Card in original</div>
        
        
        
        </div><!--DetailsofPassengers-->
        
        <div class="Details-textbox2" style="">
        <h3>Identification to be carried</h3>
        
        <div class="">
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>I-card Type</strong>   </div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;"><strong><?php echo @$printData[0]['TransactionId'] ?></strong></div>
        
        <div class="clear"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>I-card No.</strong><?php echo @$printData[0]['TransactionId'] ?></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left;  margin-bottom:10px;"><strong>Issuing Authority</strong></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear"></div>
        
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
        
        <div class="Please-Text-Box" style="color:#ce2900; 
    font-weight:bold; 
    font-family: 'Raleway', sans-serif;">Please check the ID card number and other particulars before printing. If there is a mismatch kindly select  the  Ticket from Booked History and take the print of Electronic Reservation Slip </div>
        
        <div class="Printbtnbox" style="width:350px; margin:30px auto;">
        
        <!-- <div class="Print-btn" id="print"style="width:100px; float:left; background-color:#66afe9; padding:10px; margin-right:15px; text-align:center;"><a href="#" style=" color:#fff; text-decoration:none;">Print</a></div> -->               
        <div class="Print-btn2" style=" width:180px; float:left; background-color:#66afe9; padding:10px; text-align:center;"><a href="#" style="color:#fff; text-decoration:none;" onClick="goBack();">Back</a></div>
        <div class="clear"></div>
        
        </div>
        
        <div class="clear"></div>
        
        <div><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818</div>
        
        
        
        </div><!--Reservation-two-part-->
        
        
    
    
    
    </div><!--Reservation-Center-Part-->








</div><!--Reservation-Wrp-->

</div>
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

    function goBack(){
        window.history.back();
    }
</script>
