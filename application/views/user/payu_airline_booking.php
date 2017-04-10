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
                <li><a href="<?php echo base_url('index.php/user/upcoming_airline_booking'); ?>"><i class="fa fa-calendar-o"></i> Future booking</a></li>
                <li><a href="<?php echo base_url('index.php/user/history_airline_booking');?>" ><i class="fa fa-user"></i>Airline History Data</a></li>
                <li><a href="<?php echo base_url('index.php/user/cancel_airline_booking');?>" ><i class="fa fa-users"></i>Cancel Ticket</a></li>
                <!-- <li><a href="#four-tab" data-toggle="tab"><i class="fa fa-credit-card"></i>QuickBook </a></li> -->
                <li class="active"><a href="<?php echo base_url('index.php/user/payu_airline_booking');?>"><i class="fa fa-money"></i>PayU Transaction</a></li>
              </ul>
              <div class="tab-content"> 
                
                <div class="tab-pane fade in active" id="five-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                  <button type="button" class="btn btn-success"><< Back</button>
                  </a> <br/>
                  <h2 class="tab-content-title">PayU Transaction </h2>
                  <br/>
                  <div class="tab-container trans-style box"> </div>
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
                              <?php echo $this->pagination->create_links(); ?>
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