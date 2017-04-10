<?php include(APPPATH.'views/home/header.php');?>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('assets/css/style2.css')?>">
<style>
.table-responsive {
	width: 100%;
	margin-bottom: 15px;
	overflow-y: hidden;
	overflow-x: scroll;
	-ms-overflow-style: -ms-autohiding-scrollbar;
	border: 1px solid #ddd;
	-webkit-overflow-scrolling: touch
}
</style>

<div id="page-wrapper">
  <section id="content">
    <div class="page-title-container">
      <div class="container">
        <div class="page-title pull-left">
          <h2 class="entry-title">Bus Booking Data</h2>
        </div>
        <ul class="breadcrumbs pull-right">
          <li><a href="#">HOME</a></li>
          <li><a href="#">PAGES</a></li>
          <li class="active">User Agreement</li>
        </ul>
      </div>
    </div>
    <div class="container">
    <div class="row">
    <div id="main" class="col-md-12 Runningtext">
      <div class="Register-Page">
        <div class="block">
          <div class="tab-container full-width-style white-bg">
            <ul class="tabs">
              <li class="active"><a href="<?php echo base_url('index.php/user/upcoming_bus_booking'); ?>"><i class="fa fa-calendar-o"></i> Upcoming booking</a></li>
              <li><a href="<?php echo base_url('index.php/user/history_bus_booking');?>" ><i class="fa fa-user"></i>History Booking</a></li>
              <li><a href="<?php echo base_url('index.php/user/cancel_bus_booking');?>" ><i class="fa fa-users"></i>Cancel Ticket</a></li>
              <!--<li><a href="<?php echo base_url('index.php/user/payu_bus_booking');?>" ><i class="fa fa-money"></i>PayU Transaction</a></li>-->
            </ul>
            <div class="tab-content"> <?php echo $this->session->flashdata('msg');?> 
              <!-- ------------------first tab start ------------------------ -->
              <div class="tab-pane fade in active" id="first-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                <button type="button" class="btn btn-success"><< Back</button>
                </a> <br/>
                <h2 class="tab-content-title">Upcoming Bus Booking</h2>
                <br/>
                <div class="tab-container trans-style box"> </div>
                <?php 
              // print_r($future_bus_data);
              if(count($future_bus_data) != '0'){ ?>
                <div class="container">
                  <div class="row">
                    <div class="col-sms-6 col-sm-8 col-md-9">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Sr. No</th>
                              <th>Bus Name</th>
                              <!-- <th>User Track Id</th> -->
                              <th>Transaction Id</th>
                              <th>Transport PNR</th>
                              <th>Origin</th>
                              <th>Destination</th>
                              <th>Travel Date</th>
                              <th>DepartureTime</th>
                              <!-- <th>TotalTickets</th> -->
                              <th>Total Amount</th>
                              <th>status</th>
                              <!-- <th>created</th> -->
                              <th>Print Ticket</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($future_bus_data as $key=>$bus) { ?>
                            <tr>
                              <td><?php echo $bus['id']?></td>
                              <td><?php echo $bus['BusName'] ?></td>
                              <!-- <td><?php //echo $bus['UserTrackId'] ?></td> -->
                              <td><?php echo $bus['TransactionId'] ?></td>
                              <td><?php echo $bus['TransportPNR'] ?></td>
                              <td><?php echo $bus['Origin'] ?></td>
                              <td><?php echo $bus['Destination'] ?></td>
                              <td><?php echo $bus['TravelDate'] ?></td>
                              <td><?php echo $bus['DepartureTime'] ?></td>
                              <!-- <td><?php //echo $bus['TotalTickets'] ?></td> -->
                              <td><?php echo $bus['TotalAmount'] ?></td>
                              <td><?php echo $bus['status']?></td>
                              <!-- <td><?php //echo $bus['created']?></td> -->
                              <td><a href="<?php $url='upcoming_bus_booking';
                            echo base_url('index.php/bus/get_print').'/'.$bus['TransactionId']; ?>">
                                <button class="btn">VIEW & PRINT</button>
                                </a>
                                <input type="button" class="btn btn-danger ftcancel" data-TransactionId="<?php echo $bus['TransactionId'] ?>" data-TransportId="<?php echo $bus['TransportId']?>" Value="Cancel" /></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                        <?php echo $this->pagination->create_links(); ?> </div>
                      <?php }else{ ?>
                      <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> No record found in database </div>
                      <?php } ?>
                    </div>
                    <!-- ------------------first tab end ------------------------ --> 
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <!--clearfix--> 
            
          </div>
          <!--Register-Page--> 
          
        </div>
        <!--#main--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--content--> 
</div>
<!--page-wrapper-->

<div class="modal fade" id="myModalStatus" role="dialog">
  <div class="modal-dialog"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail</h4>
      </div>
      <div class="modal-body">
        <?php $jsonData = $flight['AirlineDetails'];
                 $flightDetail = json_decode($jsonData, true);
                 echo "Column No:".count($flightDetail)."<br>";
                 // print_r($flightDetail);
                   foreach($flightDetail as $PassengerDetail){
                     // echo implode(" ", $PassengerDetail);
                     // print_r($PassengerDetail);  
        ?>
        <label>AirlineCode :</label>
        <span>
        <?= $PassengerDetail[0]['AirlineCode'] ?>
        </span><br/>
        <label>AirlinePNR :</label>
        <span>
        <?= $PassengerDetail[0]['AirlinePNR'] ?>
        </span><br/>
        <label>AirlineName :</label>
        <span>
        <?= $PassengerDetail[0]['AirlineName'] ?>
        </span><br/>
        <label>Address1 :</label>
        <span>
        <?= $PassengerDetail[0]['Address1'] ?>
        </span><br/>
        <label>Address2 :</label>
        <span>
        <?= $PassengerDetail[0]['Address2'] ?>
        </span><br/>
        <label>City :</label>
        <span>
        <?= $PassengerDetail[0]['City'] ?>
        </span><br/>
        <label>ContactNumber :</label>
        <span>
        <?= $PassengerDetail[0]['ContactNumber'] ?>
        </span><br/>
        <label>FaxNumber :</label>
        <span>
        <?= $PassengerDetail[0]['FaxNumber'] ?>
        </span><br/>
        <label>EMailId :</label>
        <span>
        <?= $PassengerDetail[0]['EMailId'] ?>
        </span><br/>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cancelmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ticket Cancel</h4>
        <a href=""></a> </div>
      <div class="modal-body"> 
        <!-- Nav tabs --> 
        
        <div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
 	  </div>
	  <p  id="wait" align="center"><strong>Please Wait ....</strong></p>
        <div  class="fare_rule">
          <form class="booking-form" method="post" action="<?php echo base_url('index.php/bus/user_getGetCancellation');?>">
            <div class="form-group1 row">
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>TransportName</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="TransportName" value="" id="TransportName"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
            <div style="height:20px;"></div>
            <div class=" col-sm-12" style=" position:relative;">
              <div class="col-sm-3">
                <label><strong>Origin</strong> </label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="Origin" value="" id="Origin"  class="form-control"/>
                <div class=" clearfix"></div>
              </div>
              <div class=" clearfix"></div>
              <br />
              
              <div class=" clearfix"></div>
            </div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>Destination</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="Destination" value="" id="Destination"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>BookedDate</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="BookedDate" value="" id="BookedDate"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>TravelDate</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="TravelDate" value="" id="TravelDate"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>DepatureTime</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="DepatureTime" value="" id="DepatureTime"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>PNRStatus</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="PNRStatus" value="" id="PNRStatus"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
              <h2>Passenger Details</h2>
                          <div class="table-responsive">
                          <table id="tablepasenger" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Actions</th>
                                <th>TicketNumber</th>
                                <th>PassengerName</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>SeatNo</th>
                                <th>Fare</th>
                                <th>PenatlyAmount</th>                                
                              </tr>
                            </thead>
                            <tbody>
                             
                            </tbody>
                          </table>
                         </div>
             
            <div class=" clearfix"></div>
            <div class="form-group">
              <div class=" col-xs-12">
                <div class=" col-xs-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" required="">
                      By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>. </label>
                  </div>
                </div>
              </div>
            </div>
            <div class=" clearfix"></div>
            <div class="form-group row">
              <div class="col-sm-6 col-md-5" style="float:right;">
                 <input type="hidden" name="TransportId" id="TransportId" value="" />
                 <input type="hidden" name="TransactionId" id="TransactionId" value="" />
                 <input type="hidden" name="TravelType" id="TravelType" value="" />
                 <input type="hidden" name="PenatlyAmount" id="PenatlyAmount" value="" />
                <button type="submit" id="sbutton" name="booking" value="confirm" class="hidden full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
                            <button type="button" id="pbutton"  name="booking" value="confirm" class=" full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(".ftcancel").click(function()
  {
	  $('#wait').show();
	  $('#wait').html('Please Wait ....'); 
	  $("#pbutton").removeAttr('disabled');
	  var transactionid=$(this).data('transactionid');	  
	   $("#TransportId").val($(this).data('transportid'));
	   $("#TransactionId").val(transactionid);
	$('#cancelmodel').modal('show');
	
	  $.ajax ( {
          url: "<?php echo base_url('index.php/bus/GetCancellationPenalty');?>/"+transactionid,         
          dataType: "json",
           crossDomain: true,
          success: function(data) {    
		     
           // console.log(data.CancellationPenaltyOutput.ToCancelPNRDetails.TransportName);
		   if(!data.ResponseStatus){
			     $('#wait').html(data.FailureRemarks); 
				 $("#pbutton").attr('disabled','disabled');
				 return;
		   }
		    $('#wait').hide();     
			$('#TransportName').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.TransportName);
			$('#Origin').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.Origin);
			$('#Destination').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.Destination);
			$('#BookedDate').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.BookedDate);
			$('#TravelDate').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.TravelDate);
			$('#DepatureTime').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.DepatureTime);
			$('#PNRStatus').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.PNRStatus);
			
			$('#PenatlyAmount').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.PenatlyAmount);
			
			passengerdetails=data.CancellationPenaltyOutput.ToCancelPNRDetails.ToCancelPaxList;
			//console.log(passengerdetails);
			$('.tablerow').remove();
			$(passengerdetails).each(function( index ) {
				
			 var tr='<tr class="tablerow"><td><input type="checkbox"   name="TicketNumber[]" value="'+passengerdetails[index].TicketNumber+'_'+passengerdetails[index].PenatlyAmount+'" id="TicketNumber[]"  class="form-control ticketselected"/></td><td>'+passengerdetails[index].TicketNumber+'</td><td>'+passengerdetails[index].PassengerName+'</td><td>'+passengerdetails[index].Gender+'</td><td>'+passengerdetails[index].Age+'</td><td>'+passengerdetails[index].SeatNo+'</td><td>'+passengerdetails[index].Fare+'</td><td>'+passengerdetails[index].PenatlyAmount+'</td></tr>';
			 $("#tablepasenger").append(tr);
			});
          } 
     });
  		
 });
 $("#pbutton").click(function(e){

    var number_of_checked_checkbox= $(".ticketselected:checked").length;
    if(number_of_checked_checkbox==0){
        alert("select minimum one");
    }else{
        $("#sbutton").click();
    }

         });
</script>
<?php include APPPATH.'views/home/footer.php';?>
