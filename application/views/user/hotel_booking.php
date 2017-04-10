<?php include(APPPATH.'views/home/header.php');?>

<style>

.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;overflow-x:scroll;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd;-webkit-overflow-scrolling:touch}
</style>


<div id="page-wrapper">
  <section id="content">
    <div class="page-title-container">
      <div class="container">
        <div class="page-title pull-left">
          <h2 class="entry-title">Hotel Booking Data</h2>
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
                                <li class="active"><a href="#first-tab" data-toggle="tab"><i class="fa fa-calendar-o"></i>Upcoming Booking</a></li>
                                <li><a href="#second-tab" data-toggle="tab"><i class="fa fa-user"></i>History Booking</a></li>
                                 <li><a href="#third-tab" data-toggle="tab"><i class="fa fa-users"></i>Cancel Booking</a></li>
                                <!-- <li><a href="#four-tab" data-toggle="tab"><i class="fa fa-credit-card"></i>QuickBook </a></li> -->
                                <li><a href="#five-tab" data-toggle="tab"><i class="fa fa-money"></i>eCash</a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- ------------------first tab start ------------------------ -->
                                <div class="tab-pane fade in active" id="first-tab">
                                <a href="<?php echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a>
                                <h2 class="tab-content-title">Upcoming Hotel Data  </h2>
                          
                                
                                  <?php 
                                  // print_r($booking);
                                  if(count($future_hotel_data) != '0'){ ?>


                							<div class="container">
                	
                								<div class="row">
                									<div class="col-sms-6 col-sm-8 col-md-9">
                										<div class="table-responsive">

                                              <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th>Sr. No</th>
                                                <th>Booking ID</th>
                                                <th>Hotel Image</th>
                                                <th>Hotel Name</th>                                               
                                                <th>Address</th>                                                
                                                <th>Room type</th>                                               
                                                <th>CheckIn</th>
                                               <!-- <th>CheckOut</th>-->
                                                <th>No Of Night</th>                                               
                                               <!-- <th>Telephone</th>-->
                                                
                                                <!--<th>Booking Amount</th>    -->                  
                                               
                                                <th>Booked date</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>


                                            <tbody>
                                            <?php foreach ($future_hotel_data as $key=>$hotel) { ?>

                                              <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $hotel['BookingID'] ?></td>
                                                <td><img src="<?= $hotel['ImageURL'] ?>" style="hight:100px; width: 100px;"/></td>
                                                <td><?= $hotel['HotelName'] ?></td>                                              
                                                <td><?= $hotel['address1'] ?></td>                                               
                                                <td><?= $hotel['RoomType'] ?></td>
                                                
                                                <td><?= date('d M Y',strtotime($hotel['CheckIn'])) ?></td>
                                                <!--<td><?= $hotel['CheckOut'] ?></td>-->
                 								                <td><?= $hotel['NoOfNight'] ?></td>
                                               
                                                <!--<td><?= $hotel['Telephone']?></td>-->
                                                
                                               <!-- <td><?= $hotel['BookingAmount'] ?></td>-->
                                               
                                                <td><?= date('d M Y',strtotime($hotel['created']))?></td>
                                                <td><a href="<?php echo base_url('index.php/user/print_hotel_ticket').'/'.$hotel['id']; ?>"><button class="btn">PRINT & View</button>
                                                  <input type="button" class="btn btn-danger ftcancel" data-BookingID="<?php echo $hotel['BookingID'] ?>" data-TrackID="<?php echo $hotel['TrackID']?>" Value="Cancel" /></td>
                                              </tr>
                                            <?php } ?>
                                            </tbody>

                                          </table>
                                          </div>
                                          <?php }else{ ?>
                                              <div class="alert alert-success fade in">
                							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                							    <strong>Success!</strong> No record found in database
                							  </div>
                                 <?php } ?>
                                 </div>
                                 </div>
                                </div>
                                </div>
                                <!-- ------------------first tab end ------------------------ -->

                                <!-- ------------------Secound tab start ------------------------ -->
                                <div class="tab-pane fade" id="second-tab">
                                <a href="<?php echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a>
                                    <h2 class="tab-content-title">History Hotel Data </h2>


                                    
                                    <?php 
                                  // print_r($history_hotel_data);
                                  if(count($history_hotel_data) != '0'){ ?>


                                <div class="container">
                                  <div class="row">
                                    <div class="col-sms-6 col-sm-8 col-md-9">
                                      <div class="table-responsive">

                                                <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>Sr. No</th><th>Booking ID</th><th>Hotel Image</th><th>Hotel Name</th><th>Hotel Type</th><th>Address</th><th>Star</th><th>Room type</th><th>TrackID</th><th>CheckIn</th><th>CheckOut</th><th>No Of Night</th><th>Room info</th><th>Telephone</th><th>Date</th><th>Booking Amount</th><th>CheckInTime</th><th>CheckOutTime</th><th>created date</th>
                                                </tr>
                                              </thead>


                                              <tbody>
                                              <?php foreach ($history_hotel_data as $hotel) { ?>

                                                <tr>
                                                  <td><?= $hotel['id'] ?></td>
                                                  <td><?= $hotel['BookingID'] ?></td>
                                                  <td><img src="<?= $hotel['ImageURL'] ?>" style="hight:100px; width: 100px;"/></td>
                                                  <td><?= $hotel['HotelName'] ?></td>
                                                  <td><?= $hotel['HotelType'] ?></td>
                                                  <td><?= $hotel['address1'] ?></td>
                                                  <td><?= $hotel['Starlevel'] ?></td>
                                                  <td><?= $hotel['RoomType'] ?></td>
                                                  <td><?= $hotel['TrackID'] ?></td>
                                                  <td><?= $hotel['CheckIn'] ?></td>
                                                  <td><?= $hotel['CheckOut'] ?></td>
                                  <td><?= $hotel['NoOfNight'] ?></td>
                                                  <td><?= $hotel['RoomInfo']?></td>
                                                  <td><?= $hotel['Telephone']?></td>

                                                  <td><?= $hotel['Date'] ?></td>
                                                  <td><?= $hotel['BookingAmount'] ?></td>
                                                  <td><?= $hotel['CheckInTime'] ?></td>
                                                  <td><?= $hotel['CheckOutTime'] ?></td>
                                                  <td><?= $hotel['created']?></td>
                                                  
                                                </tr>
                                              <?php } ?>
                                              </tbody>

                                            </table>
                                            </div>
                                            <?php }else{ ?>
                                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> No record found in database
                                  </div>
                                 <?php } ?>
                                    
                                 </div>
                                 </div>
                                </div>
                                </div>
                                <!-- ------------------Secound tab end ------------------------ -->


                                <!-- ------------------Third tab start ------------------------ -->
                                <div class="tab-pane fade" id="third-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                                <button type="button" class="btn btn-success"><< Back</button>
                                </a>
                                <h2 class="tab-content-title">Cancel Hotel Ticket </h2>


                                <?php 
                                            // print_r($booking_cancel_bus);

                                            if(count($booking_cancel_hotel) != '0'){ ?>
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Sr. No</th>
                                        <th>Hermes PNR</th>
                                        <th>Airline PNR</th>
                                        <th>For Ticket</th>
                                        <th>cancel Date</th>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($booking_cancel_hotel as $key=>$cancelBooking) { ?>
                                      <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $cancelBooking['HermesPNR'] ?></td>
                                        <td><?php echo $cancelBooking['AirlinePNR'] ?></td>
                                        <td><?php echo $cancelBooking['ForTicket'] ?></td>
                                        <td><?php echo $cancelBooking['created'] ?></td>

                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                                <?php }else{ ?>
                                <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> No record found in database </div>
                                <?php } ?>


                              </div>
                                <!-- ------------------Third tab end ------------------------ -->
                                

                                <!-- ------------------ fourth tab start ------------------------ -->
                                <!-- <div class="tab-pane fade" id="four-tab">
                                <a href="<?php //echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a>
                                    <h2 class="tab-content-title">QuickBook</h2>
                                </div> -->
                                <!-- ------------------ fourth tab end ------------------------ -->
                                

                                <!-- ------------------ five tab start ------------------------ -->
                                <div class="tab-pane fade" id="five-tab">
                                <a href="<?php echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a>
                                    <h2 class="tab-content-title">eCash</h2>


                                  <?php 
                                  // print_r($eCash);

                                  if(count($eCash) != '0'){ ?>
                                  <div class="table-responsive">
                                  <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Sr. No</th><th>First Name</th><th>Last Name</th><th>Payu Money Id</th><th>FOR PAYMENT</th><th>RefrenceID</th>
                                    <th>mihpayid</th><th>mode</th><th>txnid</th><th>discount</th><th>Address</th>
                                    <th>E-Mail</th><th>phone</th>
                                    
                                    <th>Amount</th><th>bank Ref. Num.</th>
                                    <th>Status</th><th>Date</th>
                                  </tr>
                                </thead>

                                  
                                <tbody>
                                <?php foreach ($eCash as $transaction) { ?>

                                  <tr>
                                    <td><?= $transaction['id'] ?></td>
                                    <td><?= $transaction['firstname'] ?></td>
                                    <td><?= $transaction['lastname'] ?></td>
                                    <td><?= $transaction['payuMoneyId'] ?></td>
                                    <td><?= $transaction['FORPAYMENT'] ?></td>
                                    <td><?= $transaction['RefrenceID'] ?></td>
                                    <td><?= $transaction['mihpayid'] ?></td>
                                    <td><?= $transaction['mode'] ?></td>
                                    <td><?= $transaction['txnid'] ?></td>
                                    <td><?= $transaction['discount'] ?></td>
                                    <td><?php echo $transaction['address1'].','.$transaction['city'].','.$transaction['state'].','.$transaction['country'].','.$transaction['zipcode'] ?></td>
                                    <td><?= $transaction['email'] ?></td>
                                    <td><?= $transaction['phone'] ?></td>
                                    <td><?= $transaction['amount'] ?></td>
                                    <td><?= $transaction['bank_ref_num'] ?></td>
                                    <td><?= $transaction['status'] ?></td>
                                    <td><?= $transaction['created'] ?></td>
                                   
                                  </tr>
                                <?php } ?>
                                </tbody>

                              </table>
                              </div>
                              <?php }else{ ?>
                                 <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> No record found in database
                                  </div>
                                 <?php } ?>

                                </div>
                                <!-- ------------------ fiveh tab end ------------------------ -->

                            </div>
                        </div>
                    </div>
                	<div class="clearfix"></div><!--clearfix-->
                </div><!--Register-Page-->
            </div><!--#main-->
        </div><!--row-->
    </div><!--container-->
  </section><!--content-->
</div><!--page-wrapper-->



<div class="modal fade" id="cancelmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ticket Cancel</h4>
        <a href=""></a> </div>
      <div class="modal-body"> 
        <!-- Nav tabs --> 
        
        <!--<div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
 	  </div>
	  <p  id="wait" align="center">Please Wait ....</p>-->
        <div  class="fare_rule">
        
        <form class="booking-form" method="post" action="<?php echo base_url('index.php/flight/user_getGetCancellation');?>">
          <div class="form-group1 row">
          
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>Hermes PNR</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="hermspnr" value="" id="hermspnr"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
            <div style="height:20px;"></div>
            
            <div class=" col-sm-12" style=" position:relative;">
              <div class="col-sm-3">
                <label><strong>AIRLINEPNR</strong> </label>
              </div>
              <div class="col-sm-8">
               <select name="AirlinePNR" required="required" id="AirlinePNR" class="form-control">
               <option value="" selected="selected">--Select Flight--</option>
               </select>
                <!--<input type="text" required="required"  readonly="readonly" name="AirlinePNR" value="" id="AirlinePNR" class="form-control" />-->
               
              <div class=" clearfix"></div>
            </div>
             <div class=" clearfix"></div>
            <br />
            <div class=" col-sm-12">
              <div class="col-sm-3" style="padding-left:0;">
                <label><strong>CancelType</strong> </label>
              </div>
              <div class="col-sm-8" style="padding-left:0;">
                <div class="col-md-4 col-sm-5" style="padding-left:0;">
                  <label>
                    <input type="radio" checked="checked" style="width:20px; float:left;" name="CancelType" value="PARTIAL" id="CancelType" class="form-control1" />
                
                  <div class="col-sm-6"> <strong>Partial</strong> </div></label>
                  <div class=" clearfix"></div>
                </div>
                <div class="col-sm-6" style="padding-left:0;">
                <label>
                    <input type="radio" style="width:20px; float:left;"name="CancelType" value="FULL" id="CancelType" class="form-control1" />
                
                  <div class="col-sm-6"><strong>Full</strong></div></label>
                  <div class=" clearfix"></div>
                </div>
                <div class=" clearfix"></div>
              </div>
              <div class=" clearfix"></div>
            </div>
            
            
            
            
             <div class=" clearfix"></div>
            
            
          </div>
           <div class=" clearfix"></div>
           
          <div class="form-group">
          <div class=" col-xs-12">
          <div class=" col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" required=""> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div></div>
          </div>
          
          <div class=" clearfix"></div>
          <div class="form-group row">
            <div class="col-sm-6 col-md-5" style="float:right;">
              <input type="hidden" name="TravelType" id="TravelType" value="" />
              <button type="submit" name="booking" value="confirm" class="full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
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
</div>

<?php include APPPATH.'views/home/footer.php';?>


<script type="text/javascript">

  function print(value){
    var id = value;

    $.ajax({
          type:"get",
          url:"<?php echo base_url('index.php/user/hotelTicketPrint/')?>/"+id,
          success: function(data){
            // alert(data);
            // console.log(aaa);
            value = JSON.parse(data)
            var table = '';
      $(value).each(function(index, element){                       
      // optionss=optionss+'<option value="'+element.state+'">'+element.state+'</option>'

      table = table+"<h2>Travellers Detail</h2><table style='width:100%'><tr><td>Hotel Type </td><td>"+element.HotelType+"</td></tr><tr><td>Booking ID</td><td>"+element.BookingID+"</td></tr><tr><td>Track ID</td><td>"+element.TrackID+"</td></tr><tr><td>Check In</td><td>"+element.CheckIn+"</td></tr><tr><td>RoomInfo</td><td>"+element.RoomInfo+"</td></tr><tr><td>HotelName</td><td>"+element.HotelName+"</td></tr><tr><td>Address</td><td>"+element.address1+"</td></tr><tr><td>Starlevel</td><td>"+element.Starlevel+"</td></tr><tr><td>Room Type</td><td>"+element.RoomType+"</td></tr><tr><td>Room Count</td><td>"+element.RCount+"</td></tr><tr><td>Telephone</td><td>"+element.Telephone+"</td></tr><tr><td>No Of Night</td><td>"+element.NoOfNight+"</td></tr><tr><td>Date</td><td>"+element.Date+"</td></tr><tr><td>BookingAmount</td><td>"+element.BookingAmount+"</td></tr><tr><td>Check In Time</td><td>"+element.CheckInTime+"</td></tr><tr><td>Check In Time</td><td>"+element.created+"</td></tr></table>"
      });
      


      var printWindow = window.open('', '', 'height=400,width=800');
      printWindow.document.write('<html><head><title>Ticket Detail</title>');
      printWindow.document.write('</head><body >');
      printWindow.document.write(table);
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();

   
          },
          error: function(data){
           // console.log(123);
          }
          });
  

  }

$(".ftcancel").click(function()
  {
	  $("#hermspnr").val($(this).data('hermespnr'));
	 
	  $("#TravelType").val($(this).data('traveltype'));
	  $('#cancelmodel').modal('show');
	
	 var obj = jQuery.parseJSON($(this).parent().find('.AirlinePNRs').html());
	 $('#AirlinePNR').html('<option value="" selected="selected">--Select Flight--</option>');
		$.each(obj, function(idx, obj) {
			$.each(obj, function(idx, obj) {
			//console.log(obj.AirlinePNR);
			
			$('#AirlinePNR').append('<option value="'+obj.AirlinePNR+'">'+obj.AirlinePNR+' '+obj.AirlineCode+'-'+obj.AirlineName+'</option>');
			});
		});
  		
 });
</script>