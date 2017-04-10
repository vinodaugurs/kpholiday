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
                <li><a href="<?php echo base_url('index.php/user/upcoming_hotel_booking'); ?>" ><i class="fa fa-calendar-o"></i> Upcoming hotel booking</a></li>
                <li class="active"><a href="<?php echo base_url('index.php/user/history_hotel_booking')?>" ><i class="fa fa-user"></i>History hotel Data</a></li>
                <li><a href="<?php echo base_url('index.php/user/cancel_hotel_booking');?>"><i class="fa fa-users"></i>Cancel hotel Ticket</a></li>
                <!--<li><a href="<?php echo base_url('index.php/user/payu_hotel_booking');?>" ><i class="fa fa-money"></i>PayU Transaction</a></li>-->
              </ul>
              <div class="tab-content"> 
                 
                <!-- ------------------secound tab start ------------------------ -->
                <div class="tab-pane fade in active" id="second-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                  <button type="button" class="btn btn-success"><< Back</button>
                  </a>
                  <h2 class="tab-content-title">Hotel History Data</h2>
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
                                                  <th>Sr. No</th><th>Booking ID</th><th>Hotel Image</th><th>Hotel Name</th><th>Hotel Type</th><!-- <th>Address</th> --><th>Star</th><th>Room type</th><!-- <th>TrackID</th> --><th>CheckIn</th><th>CheckOut</th><!-- <th>No Of Night</th> --><th>Room info</th><!-- <th>Telephone</th> <th>Date</th> <th>Booking Amount</th> --><!-- <th>CheckInTime</th><th>CheckOutTime</th> --><th>View detail</th>
                                                </tr>
                                              </thead>


                                              <tbody>
                                              <?php foreach ($history_hotel_data as $key=>$hotel) { ?>

                                                <tr>
                                                  <td><?php echo $key+1; ?></td>
                                                  <td><?php echo $hotel['BookingID']; ?></td>
                                                  <td><img src="<?= $hotel['ImageURL'] ?>" style="hight:100px; width: 100px;"/></td>
                                                  <td><?php echo $hotel['HotelName']; ?></td>
                                                  <td><?php echo $hotel['HotelType']; ?></td>
                                                  <!-- <td><?php //echo $hotel['address1']; ?></td> -->
                                                  <td><?php echo $hotel['Starlevel']; ?></td>
                                                  <td><?php echo $hotel['RoomType']; ?></td>
                                                  <!-- <td><?php //echo $hotel['TrackID']; ?></td> -->
                                                  <td><?php echo $hotel['CheckIn']; ?></td>
                                                  <td><?php echo $hotel['CheckOut']; ?></td>
                                                  <!-- <td><?php //echo $hotel['NoOfNight']; ?></td> -->
                                                  <td><?php echo $hotel['RoomInfo']; ?></td>
                                                  <!-- <td><?php //echo $hotel['Telephone']; ?></td> -->
                                                  <!--<td><?php //echo $hotel['Date']; ?></td>
                                                   <td><?php //echo $hotel['BookingAmount']; ?></td> -->
                                                  <!-- <td><?php //echo $hotel['CheckInTime']; ?></td>
                                                  <td><?php //echo $hotel['CheckOutTime']; ?></td> -->
                                                  <td><a href="<?php $url='history_airline_booking';
                                    echo base_url('index.php/user/view_detail_hotel').'/'.$hotel['id']; ?>"><button class="btn btn-small">View Detail</button></a></td>
                                                  
                                                </tr>
                                              <?php } ?>
                                              </tbody>

                                            </table><?php echo $this->pagination->create_links(); ?>
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