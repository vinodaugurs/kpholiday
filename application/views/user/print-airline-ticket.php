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
<div class="Reservation-Wrp" style="width:1000px; margin:0 auto;">
    <div class="Reservation-Top-Part" style="   text-align:center;  font-size:17px; color:#ce2900; font-weight:bold; font-family: 'Raleway', sans-serif;">
    <p>Congratulations. You have successfully made an e-Reservation with these details . Please prints the slip and carry it along with the relevant photo ID  card  while   travelling. </p>
    <p>Thank you for using kpholidays.com services.</p>
    
    </div><!--Reservation-Top-Part-->

    <div class="Reservation-Center-Part" style="width:80%;  margin:0 auto;  border:1px solid #66afe9; border-radius:4px; color:#333;">
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
            <!--	<u>kpholidays.com e-Ticketing Service</u> -->
                <div><strong>Contact us on:</strong> +91- 7897666669 /+91-9235181818</div>
            
            
            </div>
            <div class="clear"></div>
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
        <div class="clear"></div>

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
           
            
            <td>PassengerType:</td>
            <td>Name:</td>
            <td>TicketNumber:</td>
            <td>FlightNumber:</td>
            <td>Origin:</td>
            <td>DepartureDateTime:</td>
            <td>Destination:</td>
            <td>AirlineCode:</td>
            <td>ClassCode:</td>

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
        
        <div class="clear"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left; margin-bottom:10px;"><strong>I-card No.</strong><?php //echo @$printData[0]['TransactionId'] ?></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear"></div>
        
        <div class="Details-textbox2left" style="width:300px; float:left;  margin-bottom:10px;"><strong>Issuing Authority</strong></div>
        <div class="Details-textbox2right" style="width:300px; float:left;  margin-bottom:10px;">33</div>
        
        <div class="clear"></div>
        
        </div>
        
        
        
        
        </div>Details-textbox2--> 
        
        
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
        
        <div class="Print-btn" id="print"style="width:100px; float:left; background-color:#66afe9; padding:10px; margin-right:15px; text-align:center;"><a href="#" style=" color:#fff; text-decoration:none;">Print</a></div>               
        <div class="Print-btn2" id="back" style=" width:180px; float:left; background-color:#66afe9; padding:10px; text-align:center;"><a href="#" style="color:#fff; text-decoration:none;" onClick="goback();">Back</a></div>
        <div class="clear"></div>
        
        </div>

        <div class="clear"></div>

        
        </div><!--Reservation-two-part-->
 
    </div><!--Reservation-Center-Part-->


</div><!--Reservation-Wrp-->

</div>
<?php }else{

    echo $data['0']['FailureRemarks']."<br/><button onClick='goback();'>Back </button>     ";
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
