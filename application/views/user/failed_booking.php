<?php include(APPPATH.'views/home/header.php');?>
    <div id="page-wrapper">

<style>

.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;overflow-x:scroll;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd;-webkit-overflow-scrolling:touch}
</style>
       <section id="content">
       <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Failed Bookings</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li class="active">Failed Bookings</li>
                </ul>
            </div>
        </div>

            <div class="container">
            
              <div class="row">

                    <div id="main" class="col-md-12 Runningtext">
                        <div class="Runningtext-Box">
                          <a href="<?php echo base_url('index.php/user/index'); ?>"><button type="button" class="btn btn-success"><< Back</button></a>
                            
                            


                            <?php //print_r($page_data)
                            if(count($page_data) != '0'){
                             ?>     
                             <!-- <div class="table-responsive">      -->
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Sr. No</th>
                                    <th>User Track Id</th>
                                    <th>For Booking</th>
                                    <th>PyaU ID</th>
                                    <th>Total Amount</th>
                                    <!-- <th>Data</th> -->

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($page_data as $key => $value) {?>
                                  <tr>
                                    <td><?php echo $key +'1'; ?></td>
                                    <td><?php echo @$value['UserTrackId']; ?></td>
                                    <td><?php echo @$value['ForBooking']; ?></td>
                                    <td><?php echo @$value['PyaUID']; ?></td>
                                    <td><?php echo @$value['TotalAmount']; ?></td>
                                    <!-- <td><?php //echo @$value['data'] ?></td> -->

                                  </tr>
                                  <?php }  ?>
                                </tbody>
                              </table>
                              
                              <?php }else{ ?>

                              <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>No record found in database</strong> 
                              </div>

                              <?php } ?>
                            
                                                        



                            
                         <div class=" clearfix"></div>
                        </div><!--Runningtext-Box-->
                    </div> <!--#main-->
               </div><!--row-->
            </div><!--container-->
        </section><!--content-->
     </div><!--page-wrapper-->
<?php include(APPPATH.'views/home/footer.php');?>
