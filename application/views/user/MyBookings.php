<?php include(APPPATH.'views/home/header.php');?>
  <div class="container">
      <h1 class="page-title">Travel Profile</h1>
  </div>
  <div class="container">
    <div class="row">
    <?php include(APPPATH.'views/user/user-profile-sidebar.php'); ?>
      <div class="col-md-9">
          <h4>Total Traveled</h4>
          <div class="row">
            <div id="main" class="col-md-12 Runningtext">
                <div class="Runningtext-Box">
                    <div class=" col-sm-3">
                      <a class="hover-effect" title="" href="<?php echo base_url('index.php/user/upcoming_airline_booking'); ?>">
                        <article class="box">
                          <div class="col-centered">
                            <figure>
                              <i class="fa fa-plane user-profile-statictics-icon"></i>
                            </figure>
                          </div>
                          <div class="details text-center">
                            <h4 class="box-title">Airline<small>KPHolidays</small></h4>
                          </div>
                        </article>
                      </a>
                    </div>

                    <div class=" col-sm-3">
                      <a class="hover-effect" title="" href="<?php echo base_url('index.php/user/upcoming_bus_booking');?>">
                        <article class="box">
                          <div class="col-centered">
                            <figure>
                              <i class="fa fa-bus user-profile-statictics-icon"></i>
                            </figure>
                          </div>
                          <div class="details text-center">
                            <h4 class="box-title">Bus<small>KPHolidays</small></h4>
                          </div>
                        </article>
                      </a>
                    </div>
                    
                    <div class=" col-sm-3">
                      <a class="hover-effect" title="" href="<?php echo base_url('index.php/user/upcoming_hotel_booking');?>">
                        <article class="box">
                          <div class="col-centered">
                            <figure>
                              <i class="fa fa-building-o user-profile-statictics-icon"></i>
                            </figure>
                          </div>
                          <div class="details text-center">
                            <h4 class="box-title">Hotels<small>KPHolidays</small></h4>
                          </div>
                        </article>
                      </a>
                    </div>
                    <div class=" col-sm-3">
                      <a class="hover-effect" title="" href="<?php echo base_url('index.php/user/package');?>">
                        <article class="box">
                          <div class="col-centered">
                            <figure>
                              <i class="fa fa-building-o user-profile-statictics-icon"></i>
                            </figure>
                          </div>
                          <div class="details text-center">
                            <h4 class="box-title">Package<small>KPHolidays</small></h4>
                          </div>
                        </article>
                      </a>
                    </div>
                 <div class=" clearfix"></div>
                </div><!--Runningtext-Box-->
            </div> <!--#main-->
       </div><!--row-->
          <!-- <div id="map-canvas" style="width:100%; height:400px;"></div> -->
      </div>
    </div>
  </div>



      <div class="gap"></div>
<?php include(APPPATH.'views/home/footer.php');?>
