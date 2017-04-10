   
<style>
    .bg-box{
        background:#f2f2f2 !important; 
        border:1px solid #ddd !important; 
        padding:15px; 
        text-align:left !important; 
        margin-bottom:30px; 
        text-align:justify !important;
    }
</style>
<div id="page-wrapper">


    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Package Booking</h2>
            </div>
        </div>
    </div>
    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">


                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    <div class="booking-section travelo-box bg-box">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <form class="booking-form" method="post">





                            <div class="person-information">
                                <h2>Your Personal Information</h2>



                                <div class="form-group row ">
                                    <div style="font-color:red;"><?php echo validation_errors(); ?></div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Title</label>
                                        <select name="title" class="form-control">
                                            <option <?php echo (set_value('title') == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                            <option <?php echo (set_value('title') == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                            <option <?php echo (set_value('title') == 'Miss') ? 'selected' : ''; ?>>Miss</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Name</label>                                            
                                        <input required type="text" name="name" class="form-control" value="<?php echo isset($user_details[0]['first_name']) ? $user_details[0]['first_name'] . ' ' . $user_details[0]['last_name'] : "" ?>" placeholder="Name" />
                                    </div>
                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input type="text" required class="form-control"  name="email" placeholder="email address" value="<?php echo isset($user_details[0]['email']) ? $user_details[0]['email'] : "" ?>" />                                          
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Mobile</label>                                           
                                        <input type="text" required class="form-control" name="mobile" value="<?php echo isset($user_details[0]['phone']) ? $user_details[0]['phone'] : "" ?>" placeholder="Phone number" />
                                    </div>

                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Address</label>
                                        <div class="selector">                                              
                                            <input type="text" required class="form-control" name="address" value="<?php echo isset($user_details[0]['address']) ? $user_details[0]['address'] : "" ?>" placeholder="Address" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <?php
                                        $countryValue = (!empty($user_details[0]['country'])) ? $user_details[0]['country'] : '';
                                        $countryData = $this->region_model->getCountryValue();
                                        ?>
                                        <label>Country</label>
                                        <div class="selector">
                                            <select name="country" class="form-control" id="country">
                                                <option value="">-Select Country-</option>
                                                <?php
                                                if (!empty($countryData)) {
                                                    foreach ($countryData as $value) {
                                                        if ($countryValue == $value['id']) {
                                                            echo '<option value="' . $value["country"] . '" selected>' . $value['country'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["country"] . '">' . $value['country'] . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>



                                            </select>
                                        </div>
                                    </div>

                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">

                                        <?php
                                        $state = (!empty($user_details[0]['state'])) ? $user_details[0]['state'] : '';
                                        $stateData = $this->region_model->getStateList($user_details[0]['country']);
                                        ?>

                                        <label>State</label>
                                        <div class="selector">
                                            <select name="state" class="form-control" id="dropGetState">
                                                <option value="">-Select State-</option>
                                                <?php
                                                if (!empty($stateData)) {
                                                    foreach ($stateData as $value) {
                                                        if ($user_details[0]['state'] == $value['id']) {
                                                            echo '<option value="' . $value["state"] . '" selected>' . $value['state'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["state"] . '">' . $value['state'] . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">

                                        <label>City</label>
                                        <div class="selector">

                                            <?php
                                            $city = (!empty($user_details[0]['city'])) ? $user_details[0]['city'] : '';
                                            $cityData = $this->region_model->getCityList($user_details[0]['state']);
                                            ?>

                                            <select  name="city" id="dropGetCity" class="form-control" required>
                                                <option value="">-Select City-</option>
                                                <?php
                                                if (!empty($cityData)) {
                                                    foreach ($cityData as $value) {
                                                        if ($user_details[0]['city'] == $value['id']) {
                                                            echo '<option value="' . $value["city"] . '" selected>' . $value['city'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["city"] . '">' . $value['city'] . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class=" clearfix"></div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        //get state
                                        $('#country').change(function () {
                                            $('#dropGetState').html();
                                            var getCountryData = $('#country').val();
                                            $.ajax({
                                                type: "get",
                                                url: "<?php echo base_url('index.php/user/getStateBooking/') ?>/" + getCountryData,
                                                success: function (dataJson) {

                                                    data = JSON.parse(dataJson)
                                                    var optionss = '<option value="">-Select State-</option>';
                                                    $(data).each(function (index, element) {
                                                        optionss = optionss + '<option value="' + element.state + '">' + element.state + '</option>'
                                                    });

                                                    $('#dropGetState').html(optionss);
                                                    $('#dropGetState').siblings('.custom-select').remove();
                                                    changeTraveloElementUI();

                                                },
                                                error: function (data) {
                                                }
                                            });
                                        });



                                        //get city data
                                        $('#dropGetState').change(function () {
                                            var state1 = $('#dropGetState').val();
                                            $.ajax({
                                                type: "get",
                                                url: "<?php echo base_url('index.php/user/getcityBooking') ?>/" + state1,
                                                success: function (dataJson) {
                                                    data = JSON.parse(dataJson)
                                                    var optionss = '<option value="">-Select City-</option>';
                                                    $(data).each(function (index, element) {
                                                        optionss = optionss + '<option value="' + element.city + '">' + element.city + '</option>'
                                                    });
                                                    $('#dropGetCity').html(optionss);
                                                    $('#dropGetCity').siblings('.custom-select').remove();
                                                    changeTraveloElementUI();
                                                },
                                                error: function (data) {
                                                }
                                            });
                                        });



                                    });
                                </script>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>PostalCode</label>                                            
                                        <input required type="text" class="form-control" name="post" value="<?php echo isset($user_details[0]['PinCode']) ? $user_details[0]['PinCode'] : "" ?>" placeholder="PinCode" />
                                    </div>


                                    <div class="col-sm-6 col-md-5">
                                        <label>IdProof Type</label>
                                        <select name="IdProofId" class="form-control">                                         
                                            <option <?php echo (set_value('IdProofId') == '3') ? 'selected' : ''; ?> value="3">VoterId</option>
                                            <option <?php echo (set_value('IdProofId') == '4') ? 'selected' : ''; ?> value="4">Driving License</option>
                                            <option <?php echo (set_value('IdProofId') == '5') ? 'selected' : ''; ?> value="5">PAN Card</option>
                                            <option <?php echo (set_value('IdProofId') == '1') ? 'selected' : ''; ?> value="1">Passport</option>
                                            <option <?php echo (set_value('IdProofId') == '2') ? 'selected' : ''; ?> value="2">Aadhar Number</option>
                                        </select>
                                    </div>
                                    <div class=" clearfix"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>IdProof Number</label>
                                        <input name="IdProofNumber" required type="text" class="form-control" value="<?php echo (set_value('IdProofNumber') != false) ? set_value('IdProofNumber') : ''; ?>" placeholder="" />
                                    </div>

                                    <input type="hidden" name="package_id" value="<?php echo $detail[0]['pack_id'] ?>" />
                                    <input type="hidden" name="user_id" value="<?php echo (!empty($user_details[0]['uid'])) ? $user_details[0]['uid'] : '' ?>" />

                                    <!--<div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input  type="checkbox"> I want to receive <span class="skin-color">kpholidays</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>-->

                                    <div class=" clearfix"></div>
                                </div>

                                <hr />
                                <!--<div class="card-information">
                                    <h2>Passenger Details</h2>
                                <?php // for($i=1;$i<=$pasenger_count;$i++){ ?>
                                <?php // $j=$i-1; ?>-->
                                <!--<div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>PassengerName <?php // echo $i  ?></label>
                                        <input name="PassengerName[]" required type="text" class="input-text full-width" placeholder="Passenger Name" value="<?php echo (set_value("PassengerName[$j]") != false) ? set_value("PassengerName[$j]") : '' ?>" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Gender</label>
                                        <div class="selector">
                                            <select name="PassengerGender[]" class="full-width">
                                                <option <?php // echo (set_value("PassengerGender[$j]")=='M')?'selected':'';   ?> value="M">Male</option>
                                                 <option <?php // echo (set_value("PassengerGender[$j]")=='F')?'selected':'';   ?> value="F">Female</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Age</label>
                                        <input type="number" name="PassengerAge[]" required class="input-text full-width" value="<?php echo (set_value("PassengerAge[$j]") != false) ? set_value("PassengerAge[$j]") : '' ?>" placeholder="" />
                                        
                                        <input type="hidden" name="PassengerSeatNo[]"  class="input-text full-width" value="<?php echo (set_value("PassengerSeatNo[$j]") != false) ? set_value("PassengerSeatNo[$j]") : $seatselected[$j] ?>" placeholder="" />
                                        
                                        <input type="hidden" name="PassengerSeatTypeId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerSeatTypeId[$j]") != false) ? set_value("PassengerSeatTypeId[$j]") : '' ?>" placeholder="" />
                                        <input type="hidden" name="PassengerFare[]"  class="input-text full-width" value="" placeholder="<?php echo (set_value("PassengerFare[$j]") != false) ? set_value("PassengerFare[$j]") : '' ?>" />
                                        <input type="hidden"  name="PassengerBoardingId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerBoardingId[$j]") != false) ? set_value("PassengerBoardingId[$j]") : $boarding_point ?>" placeholder="" />
                                        <input type="hidden" name="PassengerDroppingId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerDroppingId[$j]") != false) ? set_value("PassengerDroppingId[$j]") : $dropping_point ?>" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                       
                                    </div>
                                </div>
                                <hr/>
                                <?php // }  ?>
                            </div>-->
                                <hr/>


                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input required type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" name="bookb" value="confirm" class="btn btn-primary">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                <!--<div class="booking-details travelo-box">
                    <h4>Booking Details</h4>
                    <article class="image-box hotel listing-style1">
                        <figure class="clearfix">
                            
                            <div class="travel-title">
                <?php // $Buses=$this->session->userdata('SearchOutput'); ?>
                                <h5 class="box-title"><?php // echo $bus_dietail['BusName']  ?><small><?php // echo $bus_dietail['TransportName']  ?></small></h5>
                <?php // if(isset($seatselected)){ ?>
                                <a href="<?php // echo base_url('index.php/bus/GetSeatMap/'.$bus_dietail['ScheduleId'].'/'.$Buses['UserTrackId']);  ?>" class="button">EDIT</a>
                <?php // }  ?>
                            </div>
                        </figure>
                        <div class="details">
                            
                            <div class="constant-column-5 timing clearfix">
                                
                            </div>
                            
                        </div>
                    </article>
                    
                    <h4>Other Details</h4>
                    <dl class="other-details">
                        <dt class="feature">Bus Type:</dt><dd class="value"><?php // echo $bus_dietail['BusType']  ?></dd>
                        <dt class="feature">Boarding:</dt><dd class="value"><?php // echo $boarding_point_txt  ?></dd>
                        <dt class="feature">Boarding Time:</dt><dd class="value"><?php // echo $boarding_point_time;  ?></dd>
                        <dt class="feature">Dropping:</dt><dd class="value"><?php // echo $dropping_point_txt  ?></dd>
                        <dt class="feature">DroppingPoints Time:</dt><dd class="value"><?php // echo $dropping_point_time;  ?></dd>
                        <dt class="feature">Seat(s):</dt><dd class="value"><?php // echo $pasenger_count;  ?></dd>
                        <dt class="feature">Base Fare:</dt><dd class="value"><?php // echo $base_price;  ?></dd>
                        <dt class="feature">Service Tax:</dt><dd class="value"><?php // echo $tax_price;  ?></dd>
                        <dt class="total-price">Total Price</dt><dd class="total-price-value"><?php // echo $totla_price;  ?></dd>
                    </dl>
                </div>-->

                <div class="travelo-box contact-box bg-box">
                    <h4>Need Help?</h4>
                    <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                    <address class="contact-details">
                        <span class="contact-phone"><i class="soap-icon-phone"></i> +91-9956241414</span>
                        <br>
                        <a class="contact-email" href="#">help@kpholidays.com</a> 
                    </address>
                </div>
            </div>
        </div>
</div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Fare Details</h4>
                <a href=""></a>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->

                <div  class=".preloader"  style="display:none;">
                    <img src="<?php echo base_url('image/preloader.png'); ?>"  width="50" height="25"/>  
                </div>
                <p  id="wait" align="center">Please Wait ....</p>
                <p  class="fare_rule">

                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Google Map Api -->
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script>    //Finding the fare Rule and Tax  Details                   

                                    $(document).ready(function () {

                                        $(".farerule").click(function ()
                                        {
                                            var fare = $(this).attr('id');
                                            datat = $("#div_" + fare).html();
                                            var fare = JSON.parse(datat);
                                            $.ajax({

                                                type: "post",
                                                url: "<?php echo base_url('index.php/flight/internal_tax_fare'); ?>",
                                                data: {value: fare},
                                                beforeSend: function () {


                                                },
                                                success: function (data)
                                                {
                                                    $('.fare_rule').html(data);
                                                    $(".preloader").hide();
                                                    $("#wait").hide();
                                                }
                                            });
                                        });
                                        $(".selectnow").click(function () {

                                            var booking_data = $(this).attr('id');
                                            datat = $("#sdiv_" + booking_data).html();
                                            var booking_data = JSON.parse(datat);
                                            $.ajax({
                                                type: "post",
                                                url: "<?php echo base_url('index.php/flight/International_OnewayBooking'); ?>",
                                                data: {value: booking_data},
                                                success: function (data)
                                                {
                                                    alert(data);
                                                    window.location.href = '<?php echo base_url('index.php/flight/InternationalBookingRespons'); ?>';
                                                }
                                            });
                                        });

                                    });
</script>