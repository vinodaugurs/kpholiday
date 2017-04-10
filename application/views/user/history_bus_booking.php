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
                <li><a href="<?php echo base_url('index.php/user/upcoming_bus_booking'); ?>" ><i class="fa fa-calendar-o"></i>Upcoming Booking</a></li>
                <li class="active"><a href="<?php echo base_url('index.php/user/history_bus_booking')?>" ><i class="fa fa-user"></i>History Bus Booking</a></li>
                <li><a href="<?php echo base_url('index.php/user/cancel_bus_booking');?>"><i class="fa fa-users"></i>Cancel Ticket</a></li>
               
                <!--<li><a href="<?php echo base_url('index.php/user/payu_bus_booking');?>" ><i class="fa fa-money"></i>PayU Transaction</a></li>-->
              </ul>
              <div class="tab-content"> 
                 
                <!-- ------------------secound tab start ------------------------ -->
                <div class="tab-pane fade in active" id="second-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                  <button type="button" class="btn btn-success"><< Back</button>
                  </a>
                  <h2 class="tab-content-title">Bus History Data</h2>
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
                                    <th>Sr. No</th><th>Bus Name</th><!-- <th>User Track Id</th> --><th>Transaction Id</th><th>Transport PNR</th><th>Origin</th><th>Destination</th><th>Travel Date</th><!-- <th>DepartureTime</th> --><th>TotalTickets</th><th>Total Amount</th><th>status</th><th>View Detail</th>
                                  </tr>
                                </thead>


                                <tbody>
                                <?php foreach ($history_bus_data as $key=>$bus) { ?>

                                  <tr>
                                    <td><?php echo $bus['id'];?></td>
                                    <td><?php echo $bus['BusName'] ?></td>
                                    <!-- <td><?php// echo $bus['UserTrackId'] ?></td> -->
                                    <td><?php echo $bus['TransactionId'] ?></td>
                                    <td><?php echo $bus['TransportPNR'] ?></td>
                                    <td><?php echo $bus['Origin'] ?></td>
                                    <td><?php echo $bus['Destination'] ?></td>
                                    <td><?php echo $bus['TravelDate'] ?></td>
                                    <!-- <td><?php //echo $bus['DepartureTime'] ?></td> -->
                                    <td><?php echo $bus['TotalTickets'] ?></td>
                                    <td><?php echo $bus['TotalAmount'] ?></td>
                                    <td><?php echo $bus['status']?></td>
                                    <!-- <td><?php //echo $bus['created']?></td> -->
                                    <td><a href="<?php $url='history_airline_booking';
                                    echo base_url('index.php/user/view_detail_bus').'/'.$bus['id']; ?>"><button class="btn btn-small">View Detail</button></a></td>
                                  </tr>
                                <?php } ?>
                                  </tbody>

                                </table>
                            <?php echo $this->pagination->create_links(); ?>
                                </div>
                                <?php }else{ ?>
                                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> No record found in database
                      </div>
                     <?php } ?>
                </div>
                <!-- ------------------secound tab end ------------------------ -->
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
<?php include APPPATH.'views/home/footer.php';?>