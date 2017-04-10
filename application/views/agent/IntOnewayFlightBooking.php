<?php $this->load->view('agent/header'); ?> 
<?php include 'sub-header.php'; ?>

<div class="container">
    <div class="row">
        <div id="main" class="col-sms-6 col-sm-8 col-md-9">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="booking-section travelo-box">


                <form class="booking-form" action="<?php echo base_url('index.php/agent/IntOnewayFlightBooking/' . $Flight_dietail['UserTrackId']); ?>" method="post">

                    <div class="person-information">
                        <h2>Your Personal Information</h2>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <label>Title</label>
                                <select name="user_title" class="form-control">
                                    <option <?php echo (set_value('user_title') == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                                    <option <?php echo (set_value('user_title') == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                                    <option <?php echo (set_value('user_title') == 'Miss') ? 'selected' : ''; ?>>Miss</option>
                                </select>
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
                            $countryValue = $user_details['country'];
                            $countryData = $this->region_model->getCountryValue($countryValue);
                            ?>
                            <div class="col-sm-6 col-md-5">
                                <label>Country</label>
                                <select name="user_country" class="form-control" id="country">
                                    <option value="">-Select Country-</option>
                                    <?php
                                    foreach ($countryData as $value) {

                                        if ($user_details['country'] == $value['id']) {
                                            echo '<option value="' . $value["country"] . '" selected>';
                                        } else {
                                            echo '<option value="' . $value["country"] . '">';
                                        }

                                        echo $value['country'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <?php
                                $state = $user_details['state'];
                                $stateData = $this->region_model->getStateValue($state);
                                ?>
                                <label>State</label>
                                <select name="user_state" class="form-control" id="dropGetState">
                                    <option value="">-Select State-</option>
                                    <?php
                                    if (isset($user_details['state'])) {
                                        echo '<option value="' . $stateData["0"]["state"] . '" selected>' . $stateData['0']['state'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>City</label>
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
                                <select class="form-control" name="user_country">
                                    <option  <?php echo (set_value('user_city') == 91) ? 'selected' : ''; ?> value="91">India(+91)</option>                                       
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>Pin Code</label>
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
                                        <input type="text" required name="adult_DateofBirth[]" class="form-control date-pick-years" value="<?php echo (set_value("adult_DateofBirth[$i]") != false) ? set_value("adult_DateofBirth[$i]") : '' ?>" placeholder="DateofBirth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Number</label>                                            
                                    <input type="text" required name="adult_passport[]" class="form-control" value="<?php echo (set_value("adult_passport[$i]") != false) ? set_value("adult_passport[$i]") : '' ?>" placeholder="Passport Number" /> </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Expiry Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" required name="adult_PassportExpiryDate[]" class="form-control date-pick-years" value="<?php echo (set_value("adult_PassportExpiryDate[$i]") != false) ? set_value("adult_PassportExpiryDate[$i]") : '' ?>" placeholder="ExpiryDate" /> </div>                                           
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
                                        <input type="text" required name="child_DateofBirth[]" class="form-control date-pick-years" value="<?php echo (set_value("child_DateofBirth[$i]") != false) ? set_value("child_DateofBirth[$i]") : '' ?>" placeholder="DateofBirth" />    
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
                                        <input type="text" required name="child_PassportExpiryDate[]" class="form-control date-pick-years" value="<?php echo (set_value("child_PassportExpiryDate[$i]") != false) ? set_value("child_PassportExpiryDate[$i]") : '' ?>" placeholder="DateofBirth" /> </div>                                           
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
                                        <input type="text" required name="infant_DateofBirth[]" class="form-control date-pick-years" value="<?php echo (set_value("infant_DateofBirth[$i]") != false) ? set_value("infant_DateofBirth[$i]") : '' ?>" placeholder="DateofBirth" /> </div>                                           
                                </div>
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Number</label>                                            
                                    <input type="text" required name="infant_passport[]" class="form-control" value="<?php echo (set_value("infant_passport[$i]") != false) ? set_value("infant_passport[$i]") : '' ?>" placeholder="Passport Number" /> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">                                       
                                    <label>Passport Expiry Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" required name="infant_PassportExpiryDate[]" class="form-control date-pick-years" value="<?php echo (set_value("infant_PassportExpiryDate[$i]") != false) ? set_value("infant_PassportExpiryDate[$i]") : '' ?>" placeholder="DateofBirth" /> </div>                                           
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
                                <input type="checkbox" class="i-check" required> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-5">
                            <button name="flight" value="confirm" type="submit" class="btn btn-primary btn-large">CONFIRM BOOKING</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar col-sms-6 col-sm-4 col-md-3">
            <div class="booking-details travelo-box">
                <h4>Booking Details</h4>
                <article class="flight-booking-details">
                    <figure class="clearfix">
                        <!-- <a title="" href="flight-detailed.html" class="middle-block"><img class="middle-item" alt="" src="<?php //echo base_url();    ?>img/places03.jpg"></a> -->
                        <div class="travel-title">
                            <h5 class="box-title"><?php echo $flight_search['source']; ?> to <?php echo $flight_search['destination']; ?><br/> <?php
                                if ($flight_search['way'] == 'R') {
                                    echo $flight_search['destination'];
                                    ?> to <?php
                                    echo $flight_search['source'];
                                }
                                ?><small><?php echo ($flight_search['way'] == 'O') ? 'Oneway flight' : 'Round flight' ?></small></h5>
                            <a href="flight-detailed.html" class="button">EDIT</a>
                        </div>
                    </figure>
                    <div class="details">
                        <?php foreach ($Flight_dietail['AvailSegments'] as $AvailSegments) { ?>
                            <div class="constant-column-3 timing clearfix">
                                <div>
                                    <label>Take off</label>
                                    <span><?php echo $AvailSegments['Origin'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?></span>
                                </div>
                                <div class="duration text-center">
                                    <i class="soap-icon-clock"></i>
                                    <span><?php echo $AvailSegments['Duration'] ?></span>
                                    <span>Airline:<?php echo $AvailSegments['AirlineCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></span>
                                    <span>Flight type:<?php echo $AvailSegments['ClassCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></span>
                                    <span>NumberofStops:<?php echo $AvailSegments['NumberofStops'] ?></span>



                                </div>
                                <div>
                                    <label>landing</label>
                                    <span><?php echo $AvailSegments['Destination'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?></span>
                                </div>
                            </div>

                            <?php
                            $markepdata = $this->agent_model->get_domesticFlightMrakup($Flight_dietail['AvailSegments'][0]['AirlineCode'], 'International Flight');

                            $adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
                            $Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
                            $Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;
                        }
                        ?>

                        <?php
                        if (is_array($Flight_dietail['returndata'])) {
                            foreach ($Flight_dietail['returndata']['AvailSegments'] as $AvailSegments) {
                                ?>
                                <div class="constant-column-3 timing clearfix">
                                    <div>
                                        <label>Take off</label>
                                        <span><?php echo $AvailSegments['Origin'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['DepartureDateTime']))) ?></span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php echo $AvailSegments['Duration'] ?></span>
                                        <span>Airline:<?php echo $AvailSegments['AirlineCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></span>
                                        <span>Flight type:<?php echo $AvailSegments['ClassCode'] ?>-<?php echo $AvailSegments['FlightNumber'] ?></span>
                                        <span>NumberofStops:<?php echo $AvailSegments['NumberofStops'] ?></span>



                                    </div>
                                    <div>
                                        <label>landing</label>
                                        <span><?php echo $AvailSegments['Destination'] ?> &nbsp;<?php echo date("M d, Y", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?><br /><?php echo date("h:i s", strtotime(str_replace("/", '-', $AvailSegments['ArrivalDateTime']))) ?></span>
                                    </div>
                                </div>
                                <?php
                            }

                            $markepdata = $this->agent_model->get_domesticFlightMrakup($Flight_dietail['returndata']['AvailSegments'][0]['AirlineCode'], 'International Flight');
                            $Return_adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
                            $Return_Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
                            $Return_Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;

                            $adult_markup = $adult_markup + $Return_adult_markup;
                            $Child_markup = $Child_markup + $Return_Child_markup;
                            $Infant_markup = $Infant_markup + $Return_Infant_markup;
                        }
                        ?>
                    </div>
                </article>

                <h4>Adult Fare Details</h4>
                <?php $gTotal = 0; ?>
                <dl class="other-details">
                    <?php //print_r($tax_details);   ?>
                    <dt class="feature">BasicAmount:</dt><dd class="value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['BasicAmount']; ?></dd>
                    <dt class="feature">TotalTaxAmount:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></dd>
                    <dt class="feature">TransactionFee:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['TransactionFee']; ?></dd>
                    <dt class="feature">ServiceCharge:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['ServiceCharge']; ?></dd>
                    <dt class="total-price">GrossAmount</dt><dd class="total-price-value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount']; ?></dd>
                    <dt class="total-price">Agent Markup</dt><dd class="total-price-value">Rs <?php echo $adult_markup * $flight_search['adult']; ?></dd>
                    <dt class="total-price">Total Amount</dt><dd class="total-price-value">Rs <?php echo ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']) + ($adult_markup * $flight_search['adult']); ?>  <small>(GrossAmount*Passenger)</small></dd>
                    <?php $gTotal = ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['adult']) + ($adult_markup * $flight_search['adult']); ?>
                </dl>
                <?php if ($flight_search['child'] > 0) { ?>
                    <h4>Child Fare Details</h4>
                    <dl class="other-details">
                        <dt class="feature">BasicAmount:</dt><dd class="value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['BasicAmount']; ?></dd>
                        <dt class="feature">TotalTaxAmount:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></dd>
                        <dt class="feature">TransactionFee:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['TransactionFee']; ?></dd>
                        <dt class="feature">ServiceCharge:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['ServiceCharge']; ?></dd>
                        <dt class="total-price">GrossAmount</dt><dd class="total-price-value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount']; ?></dd>
                        <dt class="total-price">Agent Markup</dt><dd class="total-price-value">Rs <?php echo $Child_markup * $flight_search['child']; ?></dd>
                        <dt class="total-price">Total Amount</dt><dd class="total-price-value">Rs <?php echo ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']) + ($Child_markup * $flight_search['child']); ?>  <small>(GrossAmount*Passenger)</small></dd>
                        <?php $gTotal = $gTotal + ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['child']) + ($Child_markup * $flight_search['child']); ?>

                    </dl>

                <?php } ?>
                <?php if ($flight_search['infant'] > 0) { ?>
                    <h4>Infant Fare Details</h4>
                    <dl class="other-details">
                        <dt class="feature">BasicAmount:</dt><dd class="value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['BasicAmount']; ?></dd>
                        <dt class="feature">TotalTaxAmount:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TotalTaxAmount']; ?></dd>
                        <dt class="feature">TransactionFee:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['TransactionFee']; ?></dd>
                        <dt class="feature">ServiceCharge:</dt><dd class="value"><?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['ServiceCharge']; ?></dd>
                        <dt class="total-price">GrossAmount</dt><dd class="total-price-value">Rs <?php echo $tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount']; ?></dd>
                        <dt class="total-price">Agent Markup</dt><dd class="total-price-value">Rs <?php echo $Infant_markup * $flight_search['infant']; ?></dd>
                        <dt class="total-price">Total Amount</dt><dd class="total-price-value">Rs <?php echo ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']) + ($Infant_markup * $flight_search['infant']); ?>  <small>(GrossAmount*Passenger)</small></dd>
                        <?php $gTotal = $gTotal + ($tax_details['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] * $flight_search['infant']) + ($Infant_markup * $flight_search['infant']); ?>

                    </dl>

                <?php } ?>
                <dl class="other-details">
                    <dt class="total-price">Grand Total Amount</dt><dd class="total-price-value">Rs <?php echo $gTotal; ?>  </dd>
                </dl>
            </div>

            <div class="travelo-box contact-box">
                <h4>Need KP Holidays Help?</h4>
                <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                <address class="contact-details">
                    <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                    <br>
                    <a class="contact-email" href="#">help@KP Holidays.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?> 

