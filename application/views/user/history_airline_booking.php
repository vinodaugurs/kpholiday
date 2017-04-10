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
        <h2 class="entry-title">Airline Booking Data</h2>
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
                <li><a href="<?php echo base_url('index.php/user/upcoming_airline_booking'); ?>" ><i class="fa fa-calendar-o"></i> Upcoming booking</a></li>
                <li class="active"><a href="<?php echo base_url('index.php/user/history_airline_booking')?>" ><i class="fa fa-user"></i>Airline History Data</a></li>
                <li><a href="<?php echo base_url('index.php/user/cancel_airline_booking');?>"><i class="fa fa-users"></i>Cancel Ticket</a></li>
                <!-- <li><a href="#four-tab" data-toggle="tab"><i class="fa fa-credit-card"></i>QuickBook </a></li> -->
                <!--<li><a href="<?php echo base_url('index.php/user/payu_bus_booking');?>" ><i class="fa fa-money"></i>PayU Transaction</a></li>-->
              </ul>
              <div class="tab-content"> 
                 
                <!-- ------------------secound tab start ------------------------ -->
                <div class="tab-pane fade in active" id="second-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                  <button type="button" class="btn btn-success"><< Back</button>
                  </a>
                  <h2 class="tab-content-title">Airline History Data</h2>
                  <?php 
                              
                              if(count($history_airline_data) != '0'){ ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr. No</th>
                          <th>Transaction Id</th>
                          <th>Booking Type</th>
                          <th>Travel Type</th>
                          <th>Origin</th>
                          <th>Destination</th>
                          <th>HermesPNR</th>
                          <th>Arrivaldatetime</th>
                          <th>DepartureDateTime</th>
                          <th>View Detail</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r($history_airline_data);
                         foreach ($history_airline_data as $key=>$flight) { ?>
                        <tr>
                          <td><?php echo $flight['id']; ?></td>
                          <td><?php echo $flight['TransactionId']; ?></td>
                          <td><?php 
                                $type = $flight['BookingType'];
                                if($type == 'R'){echo "Roundtrip";}else{ echo "One Way";} ?></td>
                          <td><?php $type = $flight['TravelType'];
                                if($type == 'D'){echo "Domistic"; }else{echo "International";}
                                 ?></td>
                          <td><?php echo $flight['BaseOrigin']; ?></td>
                          <td><?php echo $flight['BaseDestination']; ?></td>
                          <td><?php echo $flight['HermesPNR']; ?></td>
                          <td><?php echo $flight['Arrivaldatetime']; ?></td>
                          <td><?php echo $flight['DepartureDateTime']; ?></td>
                          <td><a href="<?php $url='history_airline_booking';
                          echo base_url('index.php/user/view_detail').'/'.$flight['id']; ?>"><button class="btn btn-small">View Detail</button></a></td>
                        </tr>
                        <?php } ?>
                     
                      </tbody>
                    </table><?php echo $this->pagination->create_links(); ?>
                  </div>
                  <?php }else{ ?>
                  <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> No record found in database </div>
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