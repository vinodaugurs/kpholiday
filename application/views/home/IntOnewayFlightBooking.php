<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><a href="javascript:void(0);">Booking</a></li>
        <li class="active">Flight</li>
    </ul>
    <h3 class="booking-title">Flight Booking</h3>
    <div class="row">
        <div class="col-md-8">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="booking-section travelo-box">                      	

                <form class="booking-form" action="<?php echo base_url('index.php/flight/IntOnewayFlightBooking/' . $Flight_dietail['UserTrackId']); ?>" method="post">

                    <div class="person-information">
                        <h2>Your Personal Information</h2>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <label>Title</label>
                                <div class="selector">
                                    <select name="user_title" class="form-control">
                                        <option <?php echo (set_value('user_title') == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                        <option <?php echo (set_value('user_title') == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                        <option <?php echo (set_value('user_title') == 'Miss') ? 'selected' : ''; ?>>Miss</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>Name</label>

                                <input required type="text" name="user_name" class="form-control" value="<?php echo (set_value('user_name') == false) ? $user_details['first_name'] . '' . $user_details['last_name'] : set_value('user_name') ?>" placeholder="Name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <label>email address</label>
                                <input type="text" readonly required class="form-control"  name="user_email" placeholder="email address" value="<?php echo (set_value('user_email') == false) ? $user_details['email'] : set_value('user_email'); ?>" />
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>Phone number</label>
                                <input type="text" required class="form-control" name="user_contact" value="<?php echo (set_value('user_contact') == false) ? $user_details['phone'] : set_value('user_contact') ?>" placeholder="Phone number" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <label>Address</label>
                                <input type="text" required class="form-control" name="user_address" value="<?php echo (set_value('user_address') == false) ? $user_details['address'] : set_value('user_address') ?>" placeholder="Address" />
                            </div>


                            <?php
                            $countryValue = (!empty($user_details[0]['country'])) ? $user_details[0]['country'] : '';
                            $countryData = $this->region_model->getCountryValue($countryValue);
                            ?>

                            <div class="col-sm-6 col-md-5">
                                <label>Country</label>

                                <div class="selector">
                                    <select name="user_country" class="form-control" id="country">
                                        <option value="">-Select Country-</option>
                                        <?php
                                        if (!empty($countryData)) {
                                            foreach ($countryData as $value) {
                                                if ($user_details['country'] == $value['id']) {
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
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">

                                <?php
                                $state = $user_details['state'];
                                $stateData = $this->region_model->getStateValue($state);
                                ?>

                                <label>State</label>
                                <div class="selector">
                                    <select name="user_state" class="form-control" id="dropGetState">
                                        <option value="">-Select State-</option>
                                        <?php
                                        if (isset($user_details['state'])) {
                                            echo '<option value="' . $stateData["0"]["state"] . '" selected>' . $stateData['0']['state'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-6 col-md-5">
                                <label>City</label>
                                <div class="selector">

                                    <?php
                                    $city = $user_details['city'];
                                    $cityData = $this->region_model->getCityValue($city);
                                    ?>

                                    <select  name="user_city" id="dropGetCity" class="form-control" required>
                                        <option value="">-Select City-</option>
                                        <?php
                                        if (isset($user_details['city'])) {
                                            echo '<option value="' . $cityData["0"]["city"] . '" selected>' . $cityData['0']['city'] . '</option>';
                                        }
                                        ?>
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
                                <label>Country code</label>
                                <div class="selector">
                                    <select class="form-control" name="user_country">
                                        <option  <?php echo (set_value('user_city') == 91) ? 'selected' : ''; ?> value="91">India(+91)</option>                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>PinCode</label>
                                <input required type="text" class="form-control" name="user_pincode" value="<?php echo (set_value('user_pincode') == false) ? $user_details['PinCode'] : set_value('user_pincode') ?>" placeholder="PinCode" />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <?php for ($i = 0; $i < $flight_search['adult']; $i++) { ?>
                        <div class="card-information">
                            <h2>Adult Passenger Details</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Title</label>

                                    <select name="adult_title[]" class="form-control">
                                        <option <?php echo (set_value("adult_title[$i]") == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                        <option <?php echo (set_value("adult_title[$i]") == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                        <option <?php echo (set_value("adult_title[$i]") == 'Miss') ? 'selected' : ''; ?>>Miss</option>
                                    </select>

                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>First Name</label>
                                    <input type="text" required name="adult_first_name[]" class="form-control" value="<?php echo (set_value("adult_first_name[$i]") != false) ? set_value("adult_first_name[$i]") : '' ?>" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Last Name</label>
                                    <input type="text" required name="adult_last_name[]" class="form-control" value="<?php echo (set_value("adult_last_name[$i]") != false) ? set_value("adult_last_name[$i]") : '' ?>" placeholder="Last Name" />                                            
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Gender</label>
                                    <select name="adult_gender[]" class="form-control">
                                        <option <?php echo (set_value("adult_gender[$i]") == 'M') ? 'selected' : ''; ?>>M</option>
                                        <option <?php echo (set_value("adult_gender[$i]") == 'F') ? 'selected' : ''; ?>>F</option>                                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Date of Birth</label>
                                    <div class="datepicker-wrap-dob">
                                        <input type="text" required name="adult_DateofBirth[]" class="date-pick-years form-control" value="<?php echo (set_value("adult_DateofBirth[$i]") != false) ? set_value("adult_DateofBirth[$i]") : '' ?>" placeholder="Date of Birth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Number</label>                                            
                                    <input type="text" required name="adult_passport[]" class="form-control" value="<?php echo (set_value("adult_passport[$i]") != false) ? set_value("adult_passport[$i]") : '' ?>" placeholder="Passport Number" /> </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Expiry Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" required name="adult_PassportExpiryDate[]" class="date-pick-years form-control" value="<?php echo (set_value("adult_PassportExpiryDate[$i]") != false) ? set_value("adult_PassportExpiryDate[$i]") : '' ?>" placeholder="ExpiryDate" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Issuing Country</label>  
                                    <select name="adult_PassportIssuingCountry[]" class="form-control">
                                        <option <?php echo (set_value("adult_PassportIssuingCountry[$i]") == 'India') ? 'selected' : ''; ?>>India</option>                                                  
                                    </select>                                         

                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Nationality</label>  
                                    <select name="adult_Nationality[]" class="form-control">
                                        <option <?php echo (set_value("adult_Nationality[$i]") == 'Indian') ? 'selected' : ''; ?>>Indian</option>                                                  
                                    </select>                                         

                                </div>

                            </div>

                        </div>
                        <hr/>
                    <?php } ?>
                    <?php for ($i = 0; $i < $flight_search['child']; $i++) { ?>
                        <div class="card-information">
                            <h2>child Passenger Details</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Title</label>

                                    <select name="child_title[]" class="form-control">
                                        <option <?php echo (set_value("child_title[$i]") == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                        <option <?php echo (set_value("child_title[$i]") == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                        <option <?php echo (set_value("child_title[$i]") == 'Miss') ? 'selected' : ''; ?>>Miss</option>
                                    </select>

                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>First Name</label>
                                    <input type="text" required name="child_first_name[]" class="form-control" value="<?php echo (set_value("child_first_name[$i]") != false) ? set_value("child_first_name[$i]") : '' ?>" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Last Name</label>
                                    <input type="text" required name="child_last_name[]" class="form-control" value="<?php echo (set_value("child_last_name[$i]") != false) ? set_value("child_last_name[$i]") : '' ?>" placeholder="Last Name" />                                            
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Gender</label>
                                    <select name="child_gender[]" class="form-control">
                                        <option <?php echo (set_value("child_gender[$i]") == 'M') ? 'selected' : ''; ?>>M</option>
                                        <option <?php echo (set_value("child_gender[$i]") == 'F') ? 'selected' : ''; ?>>F</option>                                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Date of Birth</label>
                                    <div class="datepicker-wrap-dob">
                                        <input type="text" required name="child_DateofBirth[]" class="date-pick-years form-control" value="<?php echo (set_value("child_DateofBirth[$i]") != false) ? set_value("child_DateofBirth[$i]") : '' ?>" placeholder="Date of Birth" />    
                                    </div>                                        
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Number</label>                                            
                                    <input type="text" required name="child_passport[]" class="form-control" value="<?php echo (set_value("child_passport[$i]") != false) ? set_value("child_passport[$i]") : '' ?>" placeholder="Passport Number" /> </div>             
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Expiry Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" required name="child_PassportExpiryDate[]" class="date-pick-years form-control" value="<?php echo (set_value("child_PassportExpiryDate[$i]") != false) ? set_value("child_PassportExpiryDate[$i]") : '' ?>" placeholder="Date of Birth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Issuing Country</label> 
                                    <select name="child_PassportIssuingCountry[]" class="form-control">
                                        <option <?php echo (set_value("child_PassportIssuingCountry[$i]") == 'India') ? 'selected' : ''; ?>>India</option>                                                  
                                    </select>                                           

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Nationality</label>  
                                    <select name="child_Nationality[]" class="form-control">
                                        <option <?php echo (set_value("child_Nationality[$i]") == 'Indian') ? 'selected' : ''; ?>>Indian</option>                                                  
                                    </select>                                         

                                </div>

                            </div>


                        </div>
                        <hr/>
                    <?php } ?>
                    <?php for ($i = 0; $i < $flight_search['infant']; $i++) { ?>
                        <div class="card-information">
                            <h2>child Passenger Details</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Title</label>

                                    <select name="infant_title[]" class="form-control">
                                        <option <?php echo (set_value("infant_title[$i]") == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                        <option <?php echo (set_value("infant_title[$i]") == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                        <option <?php echo (set_value("infant_title[$i]") == 'Miss') ? 'selected' : ''; ?>>Miss</option>
                                    </select>

                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>First Name</label>
                                    <input type="text" required name="infant_first_name[]" class="form-control" value="<?php echo (set_value("infant_first_name[$i]") != false) ? set_value("infant_first_name[$i]") : '' ?>" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                        
                                    <label>Last Name</label>
                                    <input type="text" required name="infant_last_name[]" class="form-control" value="<?php echo (set_value("infant_last_name[$i]") != false) ? set_value("infant_last_name[$i]") : '' ?>" placeholder="Last Name" />                                            
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Gender</label>
                                    <select name="infant_gender[]" class="form-control">
                                        <option <?php echo (set_value("infant_gender[$i]") == 'M') ? 'selected' : ''; ?>>M</option>
                                        <option <?php echo (set_value("infant_gender[$i]") == 'F') ? 'selected' : ''; ?>>F</option>                                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Date of Birth</label>
                                    <div class="datepicker-wrap-dob">
                                        <input type="text" required name="infant_DateofBirth[]" class="date-pick-years form-control" value="<?php echo (set_value("infant_DateofBirth[$i]") != false) ? set_value("infant_DateofBirth[$i]") : '' ?>" placeholder="Date of Birth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Number</label>                                            
                                    <input type="text" required name="infant_passport[]" class="form-control" value="<?php echo (set_value("infant_passport[$i]") != false) ? set_value("infant_passport[$i]") : '' ?>" placeholder="Passport Number" /> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Expiry Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" required name="infant_PassportExpiryDate[]" class="date-pick-years form-control" value="<?php echo (set_value("infant_PassportExpiryDate[$i]") != false) ? set_value("infant_PassportExpiryDate[$i]") : '' ?>" placeholder="Date of Birth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Issuing Country</label>
                                    <select name="infant_PassportIssuingCountry[]" class="form-control">
                                        <option <?php echo (set_value("infant_PassportIssuingCountry[$i]") == 'India') ? 'selected' : ''; ?>>India</option>                                                  
                                    </select>                                               

                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Nationality</label>  
                                    <select name="infant_Nationality[]" class="form-control">
                                        <option <?php echo (set_value("infant_Nationality[$i]") == 'Indian') ? 'selected' : ''; ?>>Indian</option>                                                  
                                    </select>                                         

                                </div>

                            </div>

                        </div>
                        <hr/>
                    <?php } ?>

                    <hr />
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-5">
                            <button name="flight" value="confirm" type="submit" class="btn btn-primary">CONFIRM BOOKING</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="booking-item-payment">
                <header class="clearfix">
                    <h5 class="mb0">
                        <?php echo $flight_search['source']; ?> to <?php echo $flight_search['destination']; ?><br/> 
                        <?php
                        if ($flight_search['way'] == 'R') {
                            echo $flight_search['destination'];
                            ?> to <?php
                            echo $flight_search['source'];
                        }
                        ?><small><?php echo ($flight_search['way'] == 'O') ? 'OneWay flight' : 'Round flight' ?></small>
                    </h5>
                </header>
                <ul class="booking-item-payment-details">
                    <li>
                        <h5>Flight Details</h5>
                        <div class="booking-item-payment-flight">


                            <?php foreach ($Flight_dietail['AvailSegments'] as $AvailSegments) { ?>
                                <div class="constant-column-3 timing clearfix">
                                    <div>
                                        <label>Take off</label>
                                        <p><?php echo $AvailSegments['Origin'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?></p>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <p><?php echo $AvailSegments['Duration'] ?></p>
                                        <p>Airline:<?php echo $AvailSegments['AirlineCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></p>
                                        <p>Flight type:<?php echo $AvailSegments['ClassCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></p>
                                        <p>Number of Stops:<?php echo $AvailSegments['NumberofStops'] ?></p>
                                    </div>
                                    <div>
                                        <label>landing</label>
                                        <p><?php echo $AvailSegments['Destination'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            if (is_array($Flight_dietail['returndata'])) {
                                foreach ($Flight_dietail['returndata']['AvailSegments'] as $AvailSegments) {
                                    ?>
                                    <div class="constant-column-3 timing clearfix">
                                        <div>
                                            <label>Take off</label>
                                            <p><?php echo $AvailSegments['Origin'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?></p>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <p><?php echo $AvailSegments['Duration'] ?></p>
                                            <p>Airline:<?php echo $AvailSegments['AirlineCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></p>
                                            <p>Flight type:<?php echo $AvailSegments['ClassCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></p>
                                            <p>Number of Stops:<?php echo $AvailSegments['NumberofStops'] ?></p>
                                        </div>
                                        <div>
                                            <label>landing</label>
                                            <p class="booking-item-date"><?php echo $AvailSegments['Destination'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <li>
                        <h5>Adult Fare Details</h5>
                        <?php if ($tax_details['ResponseStatus'] == 0) { ?>
                            <ul class="booking-item-payment-price">
                                <li>
                                    <p class="booking-item-payment-price-title">Failure Remarks</p>
                                    <p class="booking-item-payment-price-amount"><?php echo $tax_details['FailureRemarks']; ?></p>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="booking-item-payment-price">
                                <li>
                                    <p class="booking-item-payment-price-title">Basic Amount</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                </li>
                                <li>
                                    <p class="booking-item-payment-price-title">Total Tax Amount</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                </li>
                                <li>
                                    <p class="booking-item-payment-price-title">Transaction Fee</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                </li>
                                <li>
                                    <p class="booking-item-payment-price-title">Service Charge</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                </li>
                                <li>
                                    <p class="booking-item-payment-price-title">Gross Amount</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                </li>
                                <li>
                                    <p class="booking-item-payment-price-title">Total Amount</p>
                                    <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']; ?></p>
                                </li>                            
                                <?php $gTotal = $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']; ?>
                                <?php if ($flight_search['way'] == 'R') { ?>
                                    <li><div class="gap"></div></li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Basic Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Total Tax Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Transaction Fee</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Service Charge</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Gross Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Return Total Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']; ?></p>
                                    </li>
                                    <?php $gTotal = $gTotal + $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']; ?>
                                <?php } ?>
                            </ul>

                            <?php if ($flight_search['child'] > 0) { ?>
                                <ul class="booking-item-payment-price">
                                    <li>
                                        <p class="booking-item-payment-price-title">Basic Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Total Tax Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Transaction Fee</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Service Charge</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Gross Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Total Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']; ?></p>
                                    </li>                            
                                    <?php $gTotal = $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']; ?>
                                    <?php if ($flight_search['way'] == 'R') { ?>
                                        <li><div class="gap"></div></li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Basic Amount</p>
                                            <p class="booking-item-payment-price-amount"><?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Total Tax Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Transaction Fee</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Service Charge</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Gross Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Total Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']; ?></p>
                                        </li>
                                        <?php $gTotal = $gTotal + $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']; ?>
                                    <?php } ?>
                                </ul>
                            <?php } ?>

                            <?php if ($flight_search['infant'] > 0) { ?>
                                <ul class="booking-item-payment-price">
                                    <li>
                                        <p class="booking-item-payment-price-title">Basic Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Total Tax Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Transaction Fee</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Service Charge</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Gross Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Total Amount</p>
                                        <p class="booking-item-payment-price-amount">INR <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']; ?></p>
                                    </li>                            
                                    <?php $gTotal = $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']; ?>
                                    <?php if ($flight_search['way'] == 'R') { ?>
                                        <li><div class="gap"></div></li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Basic Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['BasicAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Total Tax Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Transaction Fee</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TransactionFee']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Service Charge</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['ServiceCharge']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Gross Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount']; ?></p>
                                        </li>
                                        <li>
                                            <p class="booking-item-payment-price-title">Return Total Amount</p>
                                            <p class="booking-item-payment-price-amount">INR <?php echo $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']; ?></p>
                                        </li>
                                        <?php $gTotal = $gTotal + $return_tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']; ?>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <p class="booking-item-payment-total">Gross Total Amount: <span>INR <?= $gTotal ?></span></p> 
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>