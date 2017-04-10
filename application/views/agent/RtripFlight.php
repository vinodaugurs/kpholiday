<?php
$Olen = @count($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights']);
$Rlen = @count($flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights']);
?>
<?php $this->load->view('blocks/header'); ?>
<style>
    .ui-autocomplete li{
        line-height: 1em;
        padding: 15px 20px;
        font-size: 13px;
        border-bottom: 1px solid #e6e6e6;
    }
    .ui-autocomplete li:hover{
        color: #fff;
        text-decoration: none;
        background-color: #ed8323;
        border: none;
    }
    .ui-autocomplete a:hover{
        color: #fff;
        text-decoration: none;
        background-color: #ed8323;
        border: none;
    }
    .ui-autocomplete {
        margin-top: 7px;
        background: #fff;
        border: 1px solid #e6e6e6;
        max-height: 300px;
        overflow-y: auto;
        white-space: nowrap;
    }
</style>

<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="active">Flight Search</li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <form class="booking-item-dates-change mb40" id="flight" method="post" action="<?php echo base_url('index.php/agent/flight_list'); ?>">
                <div class="row flight-brd">
                    <div class="col-md-3">
                        <div class="radio" style="margin-bottom:0 !important;">
                            <label>
                                <input type="radio" name="flight_mode" value="Domestic" id="Domestic2" class="R"  <?php echo (set_value('flight_mode') == True) ? ((set_value('flight_mode') == 'Domestic') ? "checked='checked'" : "" ) : "checked='checked'" ?> >
                                Domestic 
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="radio" style="margin-bottom:0 !important;">
                            <label>
                                <input type="radio" name="flight_mode" class="way" id="International" value="International"
                                       <?php echo (set_value('flight_mode') == True) ? ((set_value('flight_mode') == 'International') ? "checked='checked'" : " ") : "" ?>>
                                International 
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="radio" style="margin-bottom:0 !important;">
                            <label>
                                <input type="radio" name="way" onclick="jQuery('#arrive').prop('disabled', true); jQuery('#arrive').parent().find('img').removeClass('ui-datepicker-trigger');" class="way" id="inlineRadio1" value="O" 
                                       <?php echo (set_value('way') == True) ? ((set_value('way') == 'O') ? "checked='checked'" : "") : "checked='checked'" ?>>
                                One Way 
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="radio" style="margin-bottom:0 !important;">
                            <label>
                                <input type="radio" name="way" value="R" onclick="jQuery('#arrive').prop('disabled', false); jQuery('#arrive').parent().find('img').addClass('ui-datepicker-trigger');" id="inlineRadio2" class="R"
                                       <?php echo (set_value('way') == True) ? ((set_value('way') == 'R') ? "checked='checked'" : "") : "" ?>>
                                Round Trip
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-4 Select-Origin-Div" style="padding-right:0;">
                        <div class="form-group">
                            <label>Select Origin</label>
                            <input type="text" required class="form-control ui-autocomplete-input" placeholder="Select Origin" name="source" id="source" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="<?php echo (set_value('source') == True) ? set_value('source') : "" ?>">
                        </div>
                    </div>
                    <div class="col-md-4 Select-Origin-Div">
                        <div class="form-group">
                            <label>Select Destination</label>
                            <input type="text" required class="form-control ui-autocomplete-input" placeholder="Select Destination" name="destination" id="destination" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="<?php echo (set_value('destination') == True) ? set_value('destination') : "" ?>">
                        </div>
                    </div>
                    <div class="col-md-2 Select-Origin-Div2">
                        <div class="form-group">
                            <label>Class</label>
                            <div class="selector">
                                <select name="ClassType" required="required" class="form-control" >
                                    <option value="Economy" <?php echo (set_value('ClassType') == 'Economy') ? 'selected' : ''; ?>>Economy</option>
                                    <option value="Business" <?php echo (set_value('ClassType') == 'Business') ? 'selected' : ''; ?>>Business</option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6" style="padding:0px;">
                                <label>Departing On</label>
                                <div class="datepicker-wrap">
                                    <input type="text" required name="departure" class="form-control check-in" value="<?php echo (set_value('departure') == TRUE) ? set_value('departure') : ''; ?>" placeholder="Departure Date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Change On</label>
                                <div class="datepicker-wrap">
                                    <input type="text" disabled="disabled" class="form-control check-out" required placeholder="Arriving On" name="arrive" value="<?php echo (set_value('arrive') == TRUE) ? set_value('departure') : ''; ?>" id="arrive">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Adults(12+)</label>
                        <div class="selector">
                            <select class="form-control" required="" name="adult">
                                <option value="1" <?php echo (set_value('adult') == '1') ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (set_value('adult') == '2') ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo (set_value('adult') == '3') ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo (set_value('adult') == '4') ? 'selected' : ''; ?>>4</option>
                                <option value="5" <?php echo (set_value('adult') == '5') ? 'selected' : ''; ?>>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:0px;">
                        <label>Kids(2-11)</label>
                        <div class="selector">
                            <select class="form-control" name="child">
                                <option value="0" <?php echo (set_value('child') == '0') ? 'selected' : ''; ?>>0</option>
                                <option value="1" <?php echo (set_value('child') == '1') ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (set_value('child') == '2') ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo (set_value('child') == '3') ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo (set_value('child') == '4') ? 'selected' : ''; ?>>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:0;">
                        <label>Infants(0-2)</label>
                        <div class="selector">
                            <select class="form-control" name="infant">
                                <option value="0" <?php echo (set_value('infant') == '0') ? 'selected' : ''; ?>>0</option>
                                <option value="1" <?php echo (set_value('infant') == '1') ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (set_value('infant') == '2') ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo (set_value('infant') == '3') ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo (set_value('infant') == '4') ? 'selected' : ''; ?>>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2" style="float:right;">
                        <label>&nbsp;</label>
                        <button class="form-control icon-check" id="clickme"  >SEARCH NOW</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="booking-list">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php
                // If responsive Sattus is then will show flight list if 0 no flight will be available go in  elsepart                       
                //this loop will view Show the no. of flight list   
                $flights_name = array();
                if ($flight_data['ResponseStatus'] == 1) {
                    echo "<row><div class='col-md-6'>";
                    for ($i = 0; $i < $Olen; $i++) {
                        $code = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['AirlineCode'];
                        $data = $this->region_model->get_icon($code);
                        if (isset($data[0]['fligt_name']) && !in_array($data[0]['fligt_name'], $flights_name)) {
                            $flights_name[$code] = $data[0]['fligt_name'];
                        } else {
                            $flights_name[$code] = $code;
                        }
                        ?>
                        <li>
                            <div class="booking-item-container">
                                <div class="booking-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="booking-item-airline-logo">
                                                <img title="<?= (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?>" alt="<?php echo (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?>" src="<?php echo base_url('assets/ico/' . $data[0]['fimage']); ?>">
                                                <p><?= (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?></p>
                                            </div>
                                        </div>                                
                                        <div class="col-md-5">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <?php
                                                    $departure_date_part = date("Y-m-d");
                                                    $departure_time_part = date("H:i:s");
                                                    $departureDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['DepartureDateTime'];
                                                    if (!empty($departureDateTime)) {
                                                        $departure_explode = explode(" ", $departureDateTime);
                                                        $date_part = explode("/", $departure_explode[0]);
                                                        $departure_date_part = $date_part[2] . "-" . $date_part[1] . "-" . $date_part[0];
                                                        $departure_time_part = $departure_explode[1];
                                                    }
                                                    ?>
                                                    <h5><?= date('G:ia', strtotime($departure_time_part)); ?> <!--10:25 PM--></h5>
                                                    <p>
                                                        <?php $numOfStop = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['NumberofStops']; ?>
                                                        <?php
                                                        if ($numOfStop == 0 || $numOfStop == '0' || $numOfStop == '') {
                                                            echo "non-stop";
                                                        } else {
                                                            echo $numOfStop . "-stop";
                                                        }
                                                        ?>
                                                    </p>
                                                    <p class="booking-item-destination">
                                                        <!--London, England, United Kingdom (LHR)-->
                                                        <?= $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Origin']; ?>
                                                    </p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <?php
                                                    $arrival_date_part = date("Y-m-d");
                                                    $arrival_time_part = date("H:i:s");
                                                    $arrivalDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments']) - 1]['ArrivalDateTime'];
                                                    if (!empty($arrivalDateTime)) {
                                                        $arrival_explode = explode(" ", $arrivalDateTime);
                                                        $date_part = explode("/", $arrival_explode[0]);
                                                        $arrival_date_part = $date_part[2] . "-" . $date_part[1] . "-" . $date_part[0];
                                                        $arrival_time_part = $arrival_explode[1];
                                                    }
                                                    ?>
                                                    <h5><?= date('G:ia', strtotime($arrival_time_part)); ?> <!--10:25 PM--></h5>
                                                    <p>
                                                        <?php
                                                        $duration = @$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Duration'];
                                                        $find_val = array("hrs", "mins", "Hrs", "Mins");
                                                        $replace_val = array("h", "m", "h", "m");
                                                        $total_duration = str_replace($find_val, $replace_val, $duration);
                                                        ?>    
                                                        <?= $total_duration ?>
                                                    </p>
                                                    <p class="booking-item-destination"><?= $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Destination']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <?php
                                            $Select_Airline = array();
                                            $Select_Airline['UserTrackId'] = $flight_data['UserTrackId'];
                                            foreach ($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'] as $fr => $OngoingFl) {
                                                $tmp_Farearray = array();
                                                $tmp_Farearray['FlightId'] = $OngoingFl['FlightId'];
                                                $tmp_Farearray['AirlineCode'] = $OngoingFl['AirlineCode'];
                                                $tmp_Farearray['ClassCode'] = $OngoingFl['AvailPaxFareDetails'][0]['ClassCode'];
                                                $tmp_Farearray['BasicAmount'] = $OngoingFl['AvailPaxFareDetails'][0]['Adult']['BasicAmount'];
                                                $tmp_Farearray['FlightNumber'] = $OngoingFl['FlightNumber'];
                                                $tmp_Farearray['Origin'] = $OngoingFl['Origin'];
                                                $tmp_Farearray['Destination'] = $OngoingFl['Destination'];
                                                $tmp_Farearray['NumberofStops'] = $OngoingFl['NumberofStops'];
                                                $tmp_Farearray['CurrencyCode'] = $OngoingFl['CurrencyCode'];
                                                $tmp_Farearray['DepartureDateTime'] = $OngoingFl['DepartureDateTime'];
                                                $tmp_Farearray['ArrivalDateTime'] = $OngoingFl['ArrivalDateTime'];
                                                $tmp_Farearray['Duration'] = $OngoingFl['Duration'];
                                                $Select_Airline['AvailSegments'][] = $tmp_Farearray;
                                            }
                                            $tmpid = md5(uniqid(rand(), true));
                                            ?>
                                            <span class="booking-item-price" style="font-size:24px;">
                                                <?php $CurrencyCode = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['CurrencyCode']; ?>
                                                <?= (isset($CurrencyCode) && !empty($CurrencyCode)) ? $CurrencyCode : "INR"; ?>
                                                <?= $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments']) - 1]['AvailPaxFareDetails'][0]['Adult']['GrossAmount']; ?>
                                            </span>
                                            <!--<p class="booking-item-flight-class">Class: First</p>-->
                                            <span  style="display:none;" id="selectoneway"></span>
                                            <div style="display:none" id="sdiv_<?php echo $tmpid; ?>"><?php echo json_encode($Select_Airline); ?></div>
                                            <a class="btn btn-primary" onClick="OngoingFlight(this)" id="<?php echo $tmpid ?>" href="javascript:void(0);">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-item-details">
                                    <div class="row">
                                        <div class="slidingDiv">
                                            <?php foreach ($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'] as $gkey => $AvailSegments) { ?>                                
                                                <div class="time">
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class=""></span><strong>Source & destination</strong><br/>
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['Origin']; ?>
                                                            to
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['Destination']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="take-off col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>Take off</strong></span><br>
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['DepartureDateTime']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>landing</strong></span><br>
                                                            <?php
                                                            // This will show arrive date and time of flight
                                                            echo $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['ArrivalDateTime'];
                                                            ?>	
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>total time</strong></span><br>
                                                            <?= $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['Duration']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="gap"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    echo "</div><div class='col-md-6'>";
                    for ($i = 0; $i < $Rlen; $i++) {
                        $code = $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['AirlineCode'];
                        $data = $this->region_model->get_icon($code);
                        if (isset($data[0]['fligt_name']) && !in_array($data[0]['fligt_name'], $flights_name)) {
                            $flights_name[$code] = $data[0]['fligt_name'];
                        } else {
                            $flights_name[$code] = $code;
                        }
                        ?>
                        <li>
                            <div class="booking-item-container">
                                <div class="booking-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="booking-item-airline-logo">
                                                <img title="<?= (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?>" alt="<?php echo (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?>" src="<?php echo base_url('assets/ico/' . $data[0]['fimage']); ?>">
                                                <p><?= (isset($flights_name[$code])) ? $flights_name[$code] : $code; ?></p>
                                            </div>
                                        </div>                                
                                        <div class="col-md-5">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <?php
                                                    $departure_date_part = date("Y-m-d");
                                                    $departure_time_part = date("H:i:s");
                                                    $departureDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['DepartureDateTime'];
                                                    if (!empty($departureDateTime)) {
                                                        $departure_explode = explode(" ", $departureDateTime);
                                                        $date_part = explode("/", $departure_explode[0]);
                                                        $departure_date_part = $date_part[2] . "-" . $date_part[1] . "-" . $date_part[0];
                                                        $departure_time_part = $departure_explode[1];
                                                    }
                                                    ?>
                                                    <h5><?= date('G:ia', strtotime($departure_time_part)); ?> <!--10:25 PM--></h5>
                                                    <p>
                                                        <?php $numOfStop = $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['NumberofStops']; ?>
                                                        <?php
                                                        if ($numOfStop == 0 || $numOfStop == '0' || $numOfStop == '') {
                                                            echo "non-stop";
                                                        } else {
                                                            echo $numOfStop . "-stop";
                                                        }
                                                        ?>
                                                    </p>
                                                    <p class="booking-item-destination">
                                                        <!--London, England, United Kingdom (LHR)-->
                                                        <?= $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['Origin']; ?>
                                                    </p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <?php
                                                    $arrival_date_part = date("Y-m-d");
                                                    $arrival_time_part = date("H:i:s");
                                                    $arrivalDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments']) - 1]['ArrivalDateTime'];
                                                    if (!empty($arrivalDateTime)) {
                                                        $arrival_explode = explode(" ", $arrivalDateTime);
                                                        $date_part = explode("/", $arrival_explode[0]);
                                                        $arrival_date_part = $date_part[2] . "-" . $date_part[1] . "-" . $date_part[0];
                                                        $arrival_time_part = $arrival_explode[1];
                                                    }
                                                    ?>
                                                    <h5><?= date('G:ia', strtotime($arrival_time_part)); ?> <!--10:25 PM--></h5>
                                                    <p>
                                                        <?php
                                                        $duration = @$flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['Duration'];
                                                        $find_val = array("hrs", "mins", "Hrs", "Mins");
                                                        $replace_val = array("h", "m", "h", "m");
                                                        $total_duration = str_replace($find_val, $replace_val, $duration);
                                                        ?>    
                                                        <?= $total_duration ?>
                                                    </p>
                                                    <p class="booking-item-destination"><?= $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['Destination']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <?php
                                            $Select_Airline = array();
                                            $Select_Airline['UserTrackId'] = $flight_data['UserTrackId'];
                                            foreach ($flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'] as $fr => $OngoingFl) {
                                                $tmp_Farearray = array();
                                                $tmp_Farearray['FlightId'] = $OngoingFl['FlightId'];
                                                $tmp_Farearray['AirlineCode'] = $OngoingFl['AirlineCode'];
                                                $tmp_Farearray['ClassCode'] = $OngoingFl['AvailPaxFareDetails'][0]['ClassCode'];
                                                $tmp_Farearray['BasicAmount'] = $OngoingFl['AvailPaxFareDetails'][0]['Adult']['BasicAmount'];
                                                $tmp_Farearray['FlightNumber'] = $OngoingFl['FlightNumber'];
                                                $tmp_Farearray['Origin'] = $OngoingFl['Origin'];
                                                $tmp_Farearray['Destination'] = $OngoingFl['Destination'];
                                                $tmp_Farearray['NumberofStops'] = $OngoingFl['NumberofStops'];
                                                $tmp_Farearray['CurrencyCode'] = $OngoingFl['CurrencyCode'];
                                                $tmp_Farearray['DepartureDateTime'] = $OngoingFl['DepartureDateTime'];
                                                $tmp_Farearray['ArrivalDateTime'] = $OngoingFl['ArrivalDateTime'];
                                                $tmp_Farearray['Duration'] = $OngoingFl['Duration'];
                                                $Select_Airline['AvailSegments'][] = $tmp_Farearray;
                                            }
                                            $tmpid = md5(uniqid(rand(), true));
                                            ?>
                                            <span class="booking-item-price" style="font-size:24px;">
                                                <?php $CurrencyCode = $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][0]['CurrencyCode']; ?>
                                                <?= (isset($CurrencyCode) && !empty($CurrencyCode)) ? $CurrencyCode : "INR"; ?>
                                                <?= $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments']) - 1]['AvailPaxFareDetails'][0]['Adult']['GrossAmount']; ?>
                                            </span>
                                            <div style="display:none" id="sdiv_<?php echo $tmpid; ?>"><?php echo json_encode($Select_Airline); ?></div>
                                            <a class="btn btn-primary selectnow ReturnFlight clickme" id="<?php echo $tmpid ?>" href="javascript:void(0);">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-item-details">
                                    <div class="row">
                                        <div class="slidingDiv">
                                            <?php foreach ($flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'] as $gkey => $AvailSegments) { ?>                                
                                                <div class="time">
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class=""></span><strong>Source & destination</strong><br/>
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][$gkey]['Origin']; ?>
                                                            to
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][$gkey]['Destination']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="take-off col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>Take off</strong></span><br>
                                                            <?php echo $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][$gkey]['DepartureDateTime']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>landing</strong></span><br>
                                                            <?php
                                                            // This will show arrive date and time of flight
                                                            echo $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][$gkey]['ArrivalDateTime'];
                                                            ?>	
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color"><strong>total time</strong></span><br>
                                                            <?= $flight_data['AvailabilityOutput']['AvailableFlights']['ReturnFlights'][$i]['AvailSegments'][$gkey]['Duration']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="gap"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    echo "</div>";
                } else {
                    ?>
                    <li><h3 align="center">Sorry! Direct Flight is not available on this Route !</h3></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php $this->load->view('blocks/footer'); ?>
<script>    //Finding the fare Rule and Tax  Details                   


    var currentlselection = "";
    var currentlselectionTo = "";
    var login = false;
    var flightList =<?php echo json_encode($flights_name) ?>;
    jQuery(document).ready(function () {
        jQuery(".ReturnFlight").click(function () {
            var going_data = jQuery("#selectoneway").text();
            if (going_data == '') {
                alert("First Select Source");
                return false;
            }
            currentlselectionTo = jQuery(this).attr('id');
            updateTicketselection();
        });
        //autocomplete for flight city code
        jQuery("#source").autocomplete({
            source: function (request, response) {
                // console.log(jQuery('#Domestic2').is(':checked'));
                jQuery.ajax({
                    url: "<?php echo base_url('index.php/flight/get_airport_code'); ?>",
                    data: {term: request.term, domestic: jQuery('#Domestic2').is(':checked')},
                    dataType: "json",
                    crossDomain: true,
                    success: function (data) {
                        response(jQuery.map(data.myData, function (item) {
                            return {
                                label: item.CITYAIRPORT,
                                value: item.CODE
                            }
                        }));
                    }
                })
            }
        });

        jQuery("#destination").autocomplete({
            source: function (request, response) {
                //console.log(jQuery('#Domestic2').is(':checked'));
                jQuery.ajax({
                    url: "<?php echo base_url('index.php/flight/get_airport_code'); ?>",
                    data: {term: request.term, domestic: jQuery('#Domestic2').is(':checked')},
                    dataType: "json",
                    success: function (data) {
                        response(jQuery.map(data.myData, function (item) {
                            return {
                                label: item.CITYAIRPORT,
                                value: item.CODE
                            }
                        }));
                    }
                })
            }
        });
    });

    function updateTicketselection() {
        var going_data = jQuery("#selectoneway").text();
        if (going_data == '') {
            alert("First Select Source");
            return false;
        }
        datat = jQuery("#sdiv_" + going_data).html();
        going_data = JSON.parse(datat);


        datat = jQuery("#sdiv_" + currentlselectionTo).html();
        if (datat == '') {
            alert("Select Return Flight");
            return false;
        }
        jQuery('#waitmodel').modal('show');
        var return_data = JSON.parse(datat);

        jQuery.ajax({
            type: "post",
            url: "<?php echo base_url('index.php/flight/updateTicketselection'); ?>",
            data: {value: going_data, returndata: return_data},
            success: function (data)
            {
                if (data != 'true') {
                    window.location.href = '<?php echo base_url('index.php/agent/OnewayFlightBooking'); ?>/' + data;
                } else {
                    jQuery('#waitmodel').modal('hide');
                    jQuery('.bs-example-modal-sm').modal('hide');
                    alert('Login Problem Occurs');
                }
            }
        });
    }
</script>
<script>
<?php if ($this->session->userdata('uid') != '') { ?>
        login = true;
<?php } ?>
    function OngoingFlight(e)
    {
        currentlselection = jQuery(this);
        var ongoingflight = jQuery(e).attr('id');
        document.getElementById('selectoneway').innerHTML = ongoingflight;
        if (login != true) {
            return true;
        }
        alert('Select Return Flight');
    }
</script>