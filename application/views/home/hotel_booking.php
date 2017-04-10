<?php
$CheckInarray = explode("/", $ghoteldietail['CheckIn']);
$CheckOutarray = explode("/", $ghoteldietail['CheckOut']);
$CheckIn = strtotime($CheckInarray[2] . '/' . $CheckInarray[1] . '/' . $CheckInarray[0]);
$CheckOut = strtotime($CheckOutarray[2] . '/' . $CheckOutarray[1] . '/' . $CheckOutarray[0]);
$datediff = $CheckOut - $CheckIn;
$nights = floor($datediff / (60 * 60 * 24));
$room_name = "";
$room_price = "";
$room_tax = "";
if (array_key_exists(0, $ghoteldietail['RatePlanDetails']['Row'])) {
    foreach ($ghoteldietail['RatePlanDetails']['Row'] as $RatePlan) {
        if ($RoomTypeID == $RatePlan['RoomTypeID']) {
            $room_name = $RatePlan['HotelRoomTypeDesc'];
            $room_price = ($RatePlan['PromotionTotal'] > 0) ? $RatePlan['PromotionTotal'] : $RatePlan['RoomCharges'];
            $room_tax = $RatePlan['Tax'];
        }
    }
} else {
    $room_name = $ghoteldietail['RatePlanDetails']['Row']['HotelRoomTypeDesc'];
    $room_price = ($ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] > 0) ? $ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] : $ghoteldietail['RatePlanDetails']['Row']['RoomCharges'];
    $room_tax = $ghoteldietail['RatePlanDetails']['Row']['Tax'];
}
?>
<div id="page-wrapper">
    <style>
        .bg-box {
            background: #f2f2f2 !important;
            border: 1px solid #ddd !important;
            padding: 15px;
            text-align: left !important;
            margin-bottom: 30px;
            text-align: justify !important;
        }
    </style>

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Hotel Booking</h2>
            </div>

        </div>
    </div>
    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sms-6 col-sm-8 col-md-8">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="booking-section travelo-box bg-box">

                        <form class="booking-form" method="post">
                            <div class="person-information">
                                <h2>Your Personal Information</h2>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>first name</label>
                                        <input required name="first_name" type="text" class="form-control" value="<?php echo (set_value('first_name') == false) ? $user_details['first_name'] : set_value('first_name') ?>" placeholder=""/>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>last name</label>
                                        <input required name="last_name" type="text" class="form-control" value="<?php echo (set_value('last_name') == false) ? $user_details['last_name'] : set_value('last_name') ?>" placeholder=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input required name="email" type="email" class="form-control"
                                               value="<?php echo (set_value('email') == false) ? $user_details['email'] : set_value('email'); ?>"
                                               placeholder=""/>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Mobile</label>
                                        <input name="mobile" type="text" class="form-control"
                                               value="<?php echo (set_value('mobile') == false) ? $user_details['phone'] : set_value('mobile') ?>"
                                               placeholder=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Address</label>
                                        <div class="selector">
                                            <input name="address" type="text" class="form-control"
                                                   value="<?php echo (set_value('address') == false) ? $user_details['address'] : set_value('address') ?>"
                                                   placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <?php
                                        $countryValue = 1;
                                        if(!empty($user_details['country']) && $user_details['country'] !==0){
                                            $countryValue = $user_details['country'];
                                        }
                                        $countryData = $this->region_model->getCountryValue();
                                        ?>
                                        <label>Country</label>
                                        <div class="selector">
                                            <select name="country" class="form-control" id="country">
                                                <option value="">-Select Country-</option>
                                                <?php if (!empty($countryData)) {
                                                    foreach ($countryData as $value) {
                                                        if ($user_details['country'] == $value['id']) {
                                                            echo '<option value="' . $value["country"] . '" selected>' . $value['country'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["country"] . '">' . $value['country'] . '</option>';
                                                        }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <?php
                                        $state = (!empty($user_details['state'])) ? $user_details['state'] : '';
                                        $stateData = $this->region_model->getStateList($countryValue);
                                        ?>
                                        <label>State</label>
                                        <div class="selector">
                                            <select name="state" class="form-control" id="dropGetState">
                                                <option value="">-Select State-</option>
                                                <?php if (!empty($stateData)) {
                                                    foreach ($stateData as $value) {
                                                        if ($user_details['state'] == $value['id']) {
                                                            echo '<option value="' . $value["state"] . '" selected>' . $value['state'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["state"] . '">' . $value['state'] . '</option>';
                                                        }
                                                    }
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">

                                        <label>City</label>
                                        <div class="selector">

                                            <?php
                                            $city = (!empty($user_details['city'])) ? $user_details['city'] : '';
                                            $cityData = $this->region_model->getCityList($state);
                                            ?>

                                            <select name="city" id="dropGetCity" class="form-control" required>
                                                <option value="">-Select City-</option>
                                                <?php if (!empty($cityData)) {
                                                    foreach ($cityData as $value) {
                                                        if ($user_details['city'] == $value['id']) {
                                                            echo '<option value="' . $value["city"] . '" selected>' . $value['city'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["city"] . '">' . $value['city'] . '</option>';
                                                        }
                                                    }
                                                } ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        //get state
                                        $('#country').change(function () {
                                            $('#dropGetState').html();
                                            var getCountryData = $('#country').val();
                                            $.ajax({
                                                type: "get",
                                                url: "<?php echo base_url('index.php/user/getStateBooking/')?>/" + getCountryData,
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
                                                url: "<?php echo base_url('index.php/user/getcityBooking')?>/" + state1,
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
                                        <label>Postal Code</label>
                                        <input name="post" type="text" class="form-control"
                                               value="<?php echo (set_value('post') == false) ? $user_details['PinCode'] : set_value('post') ?>"
                                               placeholder=""/>
                                    </div>

                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input required type="checkbox"> By continuing, you agree to the <a
                                                href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <button type="submit" name="booking" value="confirm" class="btn btn-primary btn-large">CONFIRM BOOKING</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="booking-item-payment">
                        <header class="clearfix">
                            <a style="width:40%;" class="booking-item-payment-img" href="#">
                                <?php if($ghoteldietail["HotelName"]=="Gemini Inn"){ ?>
                                <img src="http://placehold.it/270x160" alt="<?php echo $ghoteldietail['HotelName'] ?> Image" title="<?php echo $ghoteldietail['HotelName'] ?> Image">
                                <?php } else { ?>
                                <img src="<?php echo (!empty($ghoteldietail['HotelImages'])) ? $ghoteldietail['HotelImages'] : 'http://placehold.it/270x160' ?>" alt="Image Hotel" title="<?php echo $ghoteldietail['HotelName'] ?>">
                                <?php }?>
                            </a>
                            <h2 class="booking-item-payment-title">
                                <a href="#"><?php echo $ghoteldietail['HotelName'] ?></a>
                                <span><?php echo $ghoteldietail['Address1'] ?></span></h2>
                                <a href="<?php echo site_url('hotel/hotel_detailed/' . $ghoteldietail['Providerid'] . '/' . $ghoteldietail['HotelId']); ?>" class="button">EDIT</a>
                        </header>
                        <ul class="booking-item-payment-details">
                            <li>
                                <h5>Booking for <?= $nights ?> night<?php echo ($nights > 1) ? 's' : ''; ?></h5>
                                <?php $checkin = str_replace('/', '-', $ghoteldietail['CheckIn']);
                                $checkout = str_replace('/', '-', $ghoteldietail['CheckOut']);
                                $checkin_date = date('F, d', strtotime($checkin));
                                $checkin_day = date('N', strtotime($checkin));
                                $checkout_date = date('F, d', strtotime($checkout));
                                $checkout_day = date('N', strtotime($checkout)); ?>
                                <div class="booking-item-payment-date">
                                    <p class="booking-item-payment-date-day"><?= $checkin_date ?></p>
                                </div>
                                <i class="fa fa-arrow-right booking-item-payment-date-separator"></i>
                                <div class="booking-item-payment-date">
                                    <p class="booking-item-payment-date-day"><?= $checkout_date ?></p>
                                </div>
                            </li>
                            <li>
                                <h5>Room</h5>
                                <p class="booking-item-payment-item-title"><?= $room_name ?></p>
                                <ul class="booking-item-payment-price">
                                    <li>
                                        <p class="booking-item-payment-price-title"><?= $nights ?>
                                            night<?php echo ($nights > 1) ? 's' : ''; ?></p>
                                        <p class="booking-item-payment-price-amount">Rs <?php echo $room_price ?>
                                            <small>/per day</small>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Taxes</p>
                                        <p class="booking-item-payment-price-amount"><?= $room_tax ?>
                                            <small>/per day</small>
                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="booking-item-payment-total">Total trip:
                            <span>Rs <?php echo($room_price + $room_tax) ?></span>
                        </p>
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

                    <div class=".preloader" style="display:none;">
                        <img src="<?php echo base_url('image/preloader.png'); ?>" width="50" height="25"/>
                    </div>
                    <p id="wait" align="center">Please Wait ....</p>
                    <p class="fare_rule">

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

        $(".farerule").click(function () {
            var fare = $(this).attr('id');
            datat = $("#div_" + fare).html();
            var fare = JSON.parse(datat);
            $.ajax({

                type: "post",
                url: "<?php echo base_url('index.php/flight/internal_tax_fare');?>",
                data: {value: fare},
                beforeSend: function () {


                },
                success: function (data) {
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
                url: "<?php echo base_url('index.php/flight/International_OnewayBooking');?>",
                data: {value: booking_data},
                success: function (data) {
                    alert(data);
                    window.location.href = '<?php echo base_url('index.php/flight/InternationalBookingRespons');?>';
                }
            });
        });

    });
</script>


</body>
</html>

