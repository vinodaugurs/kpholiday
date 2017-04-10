<?php include(APPPATH.'views/home/header.php');?>

<style>

.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;overflow-x:scroll;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd;-webkit-overflow-scrolling:touch}
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
                                <h2 class="tab-content-title">Upcoming bus Data  </h2>
                          
                                
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
                                                <th>Sr. No</th><th>Bus Name</th><!-- <th>User Track Id</th> --><th>Transaction Id</th><th>Transport PNR</th><th>Origin</th><th>Destination</th><th>Travel Date</th><th>DepartureTime</th><!-- <th>TotalTickets</th> --><th>Total Amount</th><th>status</th><!-- <th>created</th> --><th>Print Ticket</th>
                                              </tr>
                                            </thead>


                                            <tbody>
                                            <?php foreach ($future_bus_data as $key=>$bus) { ?>

                                              <tr>
                                                <td><?php echo $key+'1';?></td>
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
                                                <td><a href="<?php echo base_url('index.php/user/print_bus_ticket').'/'.$bus['id']; ?>"><button class="btn">VIEW & PRINT</button></a></td>
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
                                    <h2 class="tab-content-title">History bus Data </h2>


                                    
                                    <?php 
                                  // print_r($history_bus_data);
                                  if(count($history_bus_data) != '0'){ ?>


                              <div class="container">
                  
                                <div class="row">
                                  <div class="col-sms-6 col-sm-8 col-md-9">
                                    <div class="table-responsive">

                                              <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th>Sr. No</th><th>Bus Name</th><th>User Track Id</th><th>Transaction Id</th><th>Transport PNR</th><th>Origin</th><th>Destination</th><th>Travel Date</th><th>DepartureTime</th><th>TotalTickets</th><th>Total Amount</th><th>status</th><th>created</th>
                                              </tr>
                                            </thead>


                                            <tbody>
                                            <?php foreach ($history_bus_data as $key=>$bus) { ?>

                                              <tr>
                                                <td><?php echo $key+'1';?></td>
                                                <td><?php echo $bus['BusName'] ?></td>
                                                <td><?php echo $bus['UserTrackId'] ?></td>
                                                <td><?php echo $bus['TransactionId'] ?></td>
                                                <td><?php echo $bus['TransportPNR'] ?></td>
                                                <td><?php echo $bus['Origin'] ?></td>
                                                <td><?php echo $bus['Destination'] ?></td>
                                                <td><?php echo $bus['TravelDate'] ?></td>
                                                <td><?php echo $bus['DepartureTime'] ?></td>
                                                <td><?php echo $bus['TotalTickets'] ?></td>
                                                <td><?php echo $bus['TotalAmount'] ?></td>
                                                <td><?php echo $bus['status']?></td>
                                                <td><?php echo $bus['created']?></td>

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
                                <h2 class="tab-content-title">Cancel Bus Ticket </h2>


                                <?php 
                                            // print_r($booking_cancel_bus);

                                            if(count($booking_cancel_bus) != '0'){ ?>
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
                                      <?php foreach ($booking_cancel_bus as $key=>$cancelBooking) { ?>
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
                                <?php foreach ($eCash as $key=>$transaction) { ?>

                                  <tr>
                                    <td><?php echo $key+'1';?></td>
                                    <td><?php echo $transaction['firstname'] ?></td>
                                    <td><?php echo $transaction['lastname'] ?></td>
                                    <td><?php echo $transaction['payuMoneyId'] ?></td>
                                    <td><?php echo $transaction['FORPAYMENT'] ?></td>
                                    <td><?php echo $transaction['RefrenceID'] ?></td>
                                    <td><?php echo $transaction['mihpayid'] ?></td>
                                    <td><?php echo $transaction['mode'] ?></td>
                                    <td><?php echo $transaction['txnid'] ?></td>
                                    <td><?php echo $transaction['discount'] ?></td>
                                    <td><?php $transaction['address1'].','.$transaction['city'].','.$transaction['state'].','.$transaction['country'].','.$transaction['zipcode'] ?></td>
                                    <td><?php echo $transaction['email'] ?></td>
                                    <td><?php echo $transaction['phone'] ?></td>
                                    <td><?php echo $transaction['amount'] ?></td>
                                    <td><?php echo $transaction['bank_ref_num'] ?></td>
                                    <td><?php echo $transaction['status'] ?></td>
                                    <td><?php echo $transaction['created'] ?></td>
                                   
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

<?php include APPPATH.'views/home/footer.php';?>


<script type="text/javascript">

  function print(value){
    var id = value;

    $.ajax({
          type:"get",
          url:"<?php echo base_url('index.php/user/busTicketPrint/')?>/"+id,
          success: function(data){
            // alert(data);
            // console.log(aaa);
            value = JSON.parse(data)
            var table = '';
      $(value).each(function(index, element){                       
      // optionss=optionss+'<option value="'+element.state+'">'+element.state+'</option>'

      table = table+"<h2>Travellers Detail</h2><table style='width:100%'><tr><td>Bus Name </td><td>"+element.BusName+"</td></tr><tr><td>User Track Id</td><td>"+element.UserTrackId+"</td></tr><tr><td>Transaction Id</td><td>"+element.TransactionId+"</td></tr><tr><td>Transport PNR</td><td>"+element.TransportPNR+"</td></tr><tr><td>Origin</td><td>"+element.Origin+"</td></tr><tr><td>Destination</td><td>"+element.Destination+"</td></tr><tr><td>Travel Date</td><td>"+element.TravelDate+"</td></tr><tr><td>DepartureTime</td><td>"+element.DepartureTime+"</td></tr><tr><td>Total Tickets</td><td>"+element.TotalTickets+"</td></tr><tr><td>Total Amount</td><td>"+element.TotalAmount+"</td></tr><tr><td>Created</td><td>"+element.created+"</td></tr></table>"
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
</script>

