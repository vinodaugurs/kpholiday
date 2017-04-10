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
               <li><a href="<?php echo base_url('index.php/user/upcoming_hotel_booking'); ?>" ><i class="fa fa-calendar-o"></i>Upcoming hotel booking</a></li>
                <li><a href="<?php echo base_url('index.php/user/history_hotel_booking')?>" ><i class="fa fa-user"></i>History hotel Data</a></li>
                <li class="active"><a href="<?php echo base_url('index.php/user/cancel_hotel_booking');?>" ><i class="fa fa-users"></i>Cancel hotel Ticket</a></li>
                <li><a href="<?php echo base_url('index.php/user/payu_hotel_booking');?>"><i class="fa fa-money"></i>PayU Transaction</a></li>
              </ul>
              <div class="tab-content"> 
                
                <!-- ------------------Third tab Start ------------------------ -->
                <div class="tab-pane fade in active" id="third-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                  <button type="button" class="btn btn-success"><< Back</button>
                  </a>
                  <h2 class="tab-content-title">Cancel hotel Ticket </h2>


                  <?php 
                                            // print_r($booking_cancel_bus);

                                            if(count($booking_cancel_hotel) != '0'){ ?>
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Sr. No</th>
                                        <th>M Trans Id</th>
                                        <th>Booking ID</th>
                                        
                                        <th>cancel Date</th>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($booking_cancel_hotel as $key=>$cancelBooking) { ?>
                                      <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $cancelBooking['HermesPNR'] ?></td>
                                        <td><?php echo $cancelBooking['AirlinePNR'] ?></td>
                                        
                                        <td><?php echo $cancelBooking['created'] ?></td>

                                      <?php } ?>
                                    </tbody>
                                  </table><?php echo $this->pagination->create_links(); ?>
                                </div>
                                <?php }else{ ?>
                                <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> No record found in database </div>
                                <?php } ?>


                </div>
                <!-- ------------------Third tab end ------------------------ -->

                
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