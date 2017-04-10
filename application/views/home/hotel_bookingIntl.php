<?php
$search_post = $this->session->userdata('search_post');
$CheckInarray = explode("/", $search_post['checkin']);
$CheckOutarray = explode("/", $search_post['checkout']);
$CheckIn = strtotime($CheckInarray[2] . '/' . $CheckInarray[0] . '/' . $CheckInarray[1]);
$CheckOut = strtotime($CheckOutarray[2] . '/' . $CheckOutarray[0] . '/' . $CheckOutarray[1]);
$datediff = $CheckOut - $CheckIn;
$nights = floor($datediff / (60 * 60 * 24));
$room_name = "";
$room_price = "";
$room_tax = "";

if (array_key_exists(0, $ghoteldietail['RoomTypes']['RoomType'])) {
    foreach ($ghoteldietail['RoomTypes']['RoomType'] as $RatePlan) {
        if ($Bookingkey == $RatePlan['@attributes']['Bookingkey']) {
            $room_name = $RatePlan['@attributes']['Roomname'];
            $room_price = ($RatePlan['@attributes']['GIRoomChargesINR']);
            $room_tax = $RatePlan['@attributes']['TaxesINR'];
        }
    }
} else {
    $room_name = $ghoteldietail['RoomTypes']['RoomType']['@attributes']['Roomname'];
    $room_price = $ghoteldietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'];
    $room_tax = $ghoteldietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'];
}
?>
<div id="page-wrapper">
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Hotel Booking</h2>
            </div>
        </div>
    </div>

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
    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-xs-12 col-sm-8 col-md-8">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="booking-section travelo-box bg-box">

                        <form class="booking-form" method="post">
                            <div class="person-information">
                                <h2>Your Personal Information</h2>
                                <div class="form-group row ">
                                    <div style="font-color:red;"><?php echo validation_errors(); ?></div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>first name</label>
                                        <input required name="first_name" type="text" class="form-control" value="<?php echo (set_value('first_name') == false) ? $user_details['first_name'] : set_value('first_name') ?>" placeholder=""/>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>last name</label>
                                        <input required name="last_name" type="text" class="form-control" value="<?php echo (set_value('last_name') == false) ? $user_details['last_name'] : set_value('last_name') ?>" placeholder=""/>
                                    </div>
                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input type="text" required class="form-control" name="email"
                                               placeholder="email address"
                                               value="<?php echo isset($user_details['email']) ? $user_details['email'] : "" ?>"/>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Mobile</label>
                                        <input type="text" required class="form-control" name="mobile"
                                               value="<?php echo isset($user_details['phone']) ? $user_details['phone'] : "" ?>"
                                               placeholder="Phone number"/>
                                    </div>

                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Address</label>
                                        <div class="selector">
                                            <input type="text" required class="form-control" name="address" value="<?php echo isset($user_details['address']) ? $user_details['address'] : "" ?>" placeholder="Address"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <?php $countryData = $this->region_model->getCountryValue(0); ?>
                                        <label>Country</label>
                                        <div class="selector">
                                            <select name="country" class="form-control" id="dropGetCountry">
                                                <option value="">-Select Country-</option>
                                                <?php if (!empty($countryData)) {
                                                    foreach ($countryData as $value) {
                                                        if ($user_details['country'] == $value['id']) {
                                                            echo '<option value="' . $value["id"] . '" selected>' . $value['country'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["id"] . '">' . $value['country'] . '</option>';
                                                        }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" clearfix"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <?php $state = $user_details['country']; $stateData = $this->region_model->getStateList($state); ?>
                                        <label>State</label>
                                        <div class="selector">
                                            <select name="state" class="form-control" id="dropGetState">
                                                <option value="">-Select State-</option>
                                                <?php if (!empty($stateData)) {
                                                    foreach ($stateData as $value) {
                                                        if ($user_details['state'] == $value['id']) {
                                                            echo '<option value="' . $value["id"] . '" selected>' . $value['state'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["id"] . '">' . $value['state'] . '</option>';
                                                        }
                                                    }
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>City</label>
                                        <div class="selector">
                                            <?php $city = $user_details['state']; $cityData = $this->region_model->getCityList($city); ?>
                                            <select name="city" id="dropGetCity" class="form-control" required>
                                                <option value="">-Select City-</option>
                                                <?php if (!empty($cityData)) {
                                                    foreach ($cityData as $value) {
                                                        if ($user_details['city'] == $value['id']) {
                                                            echo '<option value="' . $value["id"] . '" selected>' . $value['city'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $value["id"] . '">' . $value['city'] . '</option>';
                                                        }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <script lang="JavaScript" type="text/javascript">
                                    $(document).ready(function () {
                                        $('#dropGetCountry').change(function () {
                                            $('#dropGetState').html();
                                            var country = $('#dropGetCountry').val();
                                            $.ajax({
                                                type: "get",
                                                url: "<?php echo base_url('index.php/Home/getState/')?>/" + country,
                                                success: function (dataJson) {
                                                    data = JSON.parse(dataJson)
                                                    var optionss = '<option value="">-Select State-</option>';
                                                    $(data).each(function (index, element) {
                                                        optionss = optionss + '<option value="' + element.id + '">' + element.state + '</option>'
                                                    });
                                                    $('#dropGetState').html(optionss);
                                                    $('#dropGetState').siblings('.custom-select').remove();
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
                                                url: "<?php echo base_url('index.php/Home/getcity')?>/" + state1,
                                                success: function (dataJson) {
                                                    data = JSON.parse(dataJson)
                                                    var optionss = '<option value="">-Select City-</option>';
                                                    $(data).each(function (index, element) {
                                                        optionss = optionss + '<option value="' + element.id + '">' + element.city + '</option>'
                                                    });
                                                    $('#dropGetCity').html(optionss);
                                                    $('#dropGetCity').siblings('.custom-select').remove();
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
                                        <input required type="checkbox"> By continuing, you agree to the <a href="javascript:void(0)"><span class="skin-color">Terms and Conditions</span></a>.
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
                                <img src="<?php echo (!empty($ghoteldietail['@attributes']['HotelImage'])) ? $ghoteldietail['@attributes']['HotelImage'] : 'http://placehold.it/270x160' ?>"
                                     alt="Image Hotel" title="hotel 1">
                            </a>
                            <h2 class="booking-item-payment-title"><a
                                        href="#"><?php echo $ghoteldietail['@attributes']['HotelName'] ?></a>
                                <span><?php echo $ghoteldietail['@attributes']['HotelAddess'] ?></span></h2>
                            <a href="<?php echo site_url('hotel/hotel_detailedIntl/' . $ghoteldietail['@attributes']['Providerid'] . '/' . $ghoteldietail['@attributes']['Hotelid']); ?>"
                               class="button">EDIT</a>
                        </header>
                        <ul class="booking-item-payment-details">
                            <li>
                                <h5>Booking for <?= $nights ?> night<?php echo ($nights > 1) ? 's' : ''; ?></h5>
                                <?php $checkin = str_replace('/', '-', $search_post['checkin']);
                                $checkout = str_replace('/', '-', $search_post['checkout']);
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