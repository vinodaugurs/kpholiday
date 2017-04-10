<?php
$len = (int) @count($flight_data['LCCAvailabilityOutput']['AvailableFlights']);
$lenFSC = @count($flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights']);
?>
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
    .btn-primary{color: #FFFFFF !important;}
</style>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?=base_url()?>">Home</a></li>
        <li class="active">Flights</li>
    </ul>    
    <h3 class="booking-title"><?=$len+$lenFSC?> Flight results found.</h3>
    <div class="row">
        <div class="col-md-3">
            <form class="booking-item-dates-change mb30" action="<?= base_url('index.php/flight/flight_list'); ?>"  method="POST">
                <div class="form-group form-group-icon-left">
                    <label style="display: inline;"><input type="radio" name="flight_mode" value="Domestic" id="Domestic2" class="R"  <?php echo (set_value('flight_mode') == True) ? ((set_value('flight_mode') == 'Domestic') ? "checked='checked'" : " " ) : " " ?> >Domestic </label>
                    <label style="display: inline;"><input type="radio" name="flight_mode" class="way" id="International" value="International" <?php echo (set_value('flight_mode') == True) ? ((set_value('flight_mode') == 'International') ? "checked='checked'" : " ") : " " ?>>International</label>
                </div>
                
                <div class="form-group form-group-icon-left">
                    <label style="display: inline;"><input type="radio" name="way" onclick="$('#arrive').prop('disabled', true);$('#arrive').parent().find('img').removeClass('ui-datepicker-trigger');" class="way" id="inlineRadio1" value="O" <?php echo (set_value('way') == True) ? ((set_value('way') == 'O') ? "checked='checked'" : " ") : " " ?>>One Way</label>
                    <label style="display: inline;"><input type="radio" name="way" value="R" onclick="$('#arrive').prop('disabled', false);$('#arrive').parent().find('img').addClass('ui-datepicker-trigger');" id="inlineRadio2" class="R" <?php echo (set_value('way') == True) ? ((set_value('way') == 'R') ? "checked='checked'" : " ") : " " ?>>Round Trip</label>
                </div>
                
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>From</label>
                    <input type="text" required class="typeahead form-control" placeholder="Select Origin" name="source" id="source" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="<?php echo (set_value('source') == True) ? set_value('source') : " " ?>">
                </div>
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>To</label>
                    <input type="text" required class="form-control" placeholder="Select Destination" name="destination" id="destination" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="<?php echo (set_value('destination') == True) ? set_value('destination') : " " ?>">
                </div>
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>Class</label>
                    <select name="ClassType" required="required" class="form-control" >
                        <option value="Economy" <?php echo (set_value('ClassType') == 'Economy') ? 'selected' : ''; ?>>Economy</option>
                        <option value="Business" <?php echo (set_value('ClassType') == 'Business') ? 'selected' : ''; ?>>Business</option>
                    </select>
                </div>
                <div class="input-daterange">
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i><label>Departing</label>
                        <input class="form-control check-in" name="departure" value="<?php echo (set_value('departure') == TRUE) ? set_value('departure') : ''; ?>" type="text">
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                        <label>Return On</label>
                        <input class="form-control check-out" name="arrive" id="arrive" value="<?php echo (set_value('arrive') == TRUE) ? set_value('arrive') : ''; ?>" type="text">
                    </div>
                </div>
                <div class="form-group form-group- form-group-select-plus">
                    <label>Adults(12+)</label>
                    <select name="adult" required="required" class="form-control">
                        <option value="1" <?php echo (set_value('adult') == '1') ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo (set_value('adult') == '2') ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo (set_value('adult') == '3') ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo (set_value('adult') == '4') ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo (set_value('adult') == '5') ? 'selected' : ''; ?>>5</option>
                    </select>
                </div>
                <div class="form-group form-group-select-plus">
                    <label>Kids(2-11)</label>
                    <select name="child" required="required" class="form-control">
                        <option value="0" <?php echo (set_value('child') == '0') ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo (set_value('child') == '1') ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo (set_value('child') == '2') ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo (set_value('child') == '3') ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo (set_value('child') == '4') ? 'selected' : ''; ?>>4</option>
                    </select>
                </div>
                <div class="form-group form-group-select-plus">
                    <label>Infants(0-2)</label>
                    <select name="infant" required="required" class="form-control">
                        <option value="0" <?php echo (set_value('infant') == '0') ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo (set_value('infant') == '1') ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo (set_value('infant') == '2') ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo (set_value('infant') == '3') ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo (set_value('infant') == '4') ? 'selected' : ''; ?>>4</option>
                    </select>
                </div>                
                <input class="btn btn-primary" type="submit" value="Update Search" />
            </form>          
        </div>
        
        <div class="col-md-9">
            <div class="nav-drop booking-sort">
                <h5 class="booking-sort-title"><a href="#">Sort: Price (low to high)<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a></h5>
                <ul class="nav-drop-menu">
                    <li><a href="#">Price (high to low)</a>
                    </li>
                    <li><a href="#">Duration</a>
                    </li>
                    <li><a href="#">Stops</a>
                    </li>
                    <li><a href="#">Arrival</a>
                    </li>
                    <li><a href="#">Departure</a>
                    </li>
                </ul>
            </div>
            <ul class="booking-list">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php
                // If responsive Sattus is then will show flight list if 0 no flight will be available go in  elsepart                       
                //this loop will view Show the no. of flight list   
                $flights_name = array();
                if ($flight_data['ResponseStatus'] == 1) {
                    for ($i = 0; $i < $len; $i++) {
                        $code = $flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['AirlineCode'];
                        $data = $this->region_model->get_icon($code);
                        if (isset($data[0]['fligt_name']) and ! in_array($data[0]['fligt_name'], $flights_name)) {
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
                                                <p><?=(isset($flights_name[$code])) ? $flights_name[$code] : $code; ?></p>
                                            </div>
                                        </div>                                
                                        <div class="col-md-5">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <?php
                                                    $departure_date_part = date("Y-m-d");
                                                    $departure_time_part = date("H:i:s");
                                                    $departureDateTime = $flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['DepartureDateTime'];
                                                        if(!empty($departureDateTime)){
                                                            $departure_explode = explode(" ", $departureDateTime);
                                                            $date_part = explode("/", $departure_explode[0]);
                                                            $departure_date_part = $date_part[2]."-".$date_part[1]."-".$date_part[0];
                                                            $departure_time_part = $departure_explode[1];
                                                        }
                                                    ?>
                                                    <h5><?=date('G:ia', strtotime($departure_time_part));?> <!--10:25 PM--></h5>
                                                    <p class="booking-item-date">
                                                        <?=date("D, M j ", strtotime($departure_date_part));?>
                                                    </p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <?php
                                                    $arrival_date_part = date("Y-m-d");
                                                    $arrival_time_part = date("H:i:s");
                                                    $arrivalDateTime = $flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][count($flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments']) - 1]['ArrivalDateTime'];
                                                        if(!empty($arrivalDateTime)){
                                                            $arrival_explode = explode(" ", $arrivalDateTime);
                                                            $date_part = explode("/", $arrival_explode[0]);
                                                            $arrival_date_part = $date_part[2]."-".$date_part[1]."-".$date_part[0];
                                                            $arrival_time_part = $arrival_explode[1];
                                                        }
                                                    ?>
                                                    <h5><?=date('G:ia', strtotime($arrival_time_part));?> <!--10:25 PM--></h5>
                                                    <p class="booking-item-date">
                                                        <?=date("D, M j ", strtotime($arrival_date_part));?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <h5><?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['Duration']?></h5>
                                            <p>
                                                <?php $numOfStop = $flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['NumberofStops']; ?>
                                                <?php if($numOfStop==0 || $numOfStop == '0' || $numOfStop == ''){echo "non-stop";}else{echo $numOfStop."-stop";} ?>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                            $Select_Airline = array();
                                            $Select_Airline['UserTrackId'] = $flight_data['UserTrackId'];
                                            $Select_Airline['Fmethod'] = 'LCC';
                                            foreach ($flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'] as $fr => $OngoingFl) {
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
                                                <?php $CurrencyCode = $flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['CurrencyCode']; ?>
                                                <?=(isset($CurrencyCode) && !empty($CurrencyCode)) ? $CurrencyCode : "INR"; ?>
                                                <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][count($flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments']) - 1]['AvailPaxFareDetails'][0]['Adult']['GrossAmount'];?>
                                            </span><span>/person</span>
                                            <div style="display:none" id="sdiv_<?php echo $tmpid; ?>"><?php echo json_encode($Select_Airline); ?></div>
                                            <a class="btn btn-primary selectnow clickme" id="<?php echo $tmpid ?>" href="javascript:void(0);">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-item-details">
                                    <div class="row">
                                        <div class="slidingDiv">
                                        <?php foreach ($flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'] as $gkey => $AvailSegments) { ?>
                                            <div class="time">
                                                <div class="total-time col-sm-3">
                                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                    <div> <span class=""></span>Source & destination<br/>
                                                        <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Origin']; ?> to <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Destination']; ?> </div>
                                                </div>
                                                <div class="take-off col-sm-3">
                                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                    <div> <span class="skin-color">Take off</span><br>
                                                        <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['DepartureDateTime']?>
                                                    </div>
                                                </div>
                                                <div class="landing col-sm-3">
                                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                    <div> <span class="skin-color">landing</span><br>
                                                        <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['ArrivalDateTime']?>
                                                    </div>
                                                </div>
                                                <div class="total-time col-sm-3">
                                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                    <div> <span class="skin-color">total time</span><br>
                                                        <?=$flight_data['LCCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Duration'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" clearfix"></div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
                <!--CODE FOR OTHER AVAILABLE FLIGHT-->
                <?php
                if ($flight_dataFSC['ResponseStatus'] == 1) {
                    for ($i = 0; $i < $lenFSC; $i++) {
                        $code = $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['AirlineCode'];
                        $data = $this->region_model->get_icon($code);
                        if (isset($data[0]['fligt_name'])) {
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
                                                <p><?=(isset($flights_name[$code])) ? $flights_name[$code] : $code; ?></p>
                                            </div>
                                        </div>                                
                                        <div class="col-md-5">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <?php
                                                    $departure_date_part = date("Y-m-d");
                                                    $departure_time_part = date("H:i:s");
                                                    $departureDateTime = $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['DepartureDateTime'];
                                                        if(!empty($departureDateTime)){
                                                            $departure_explode = explode(" ", $departureDateTime);
                                                            $date_part = explode("/", $departure_explode[0]);
                                                            $departure_date_part = $date_part[2]."-".$date_part[1]."-".$date_part[0];
                                                            $departure_time_part = $departure_explode[1];
                                                        }
                                                    ?>
                                                    <h5><?=date('G:ia', strtotime($departure_time_part));?> <!--10:25 PM--></h5>
                                                    <p class="booking-item-date">
                                                        <?=date("D, M j ", strtotime($departure_date_part));?>
                                                    </p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <?php
                                                    $arrival_date_part = date("Y-m-d");
                                                    $arrival_time_part = date("H:i:s");
                                                    $arrivalDateTime = $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][count($flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments']) - 1]['ArrivalDateTime'];
                                                        if(!empty($arrivalDateTime)){
                                                            $arrival_explode = explode(" ", $arrivalDateTime);
                                                            $date_part = explode("/", $arrival_explode[0]);
                                                            $arrival_date_part = $date_part[2]."-".$date_part[1]."-".$date_part[0];
                                                            $arrival_time_part = $arrival_explode[1];
                                                        }
                                                    ?>
                                                    <h5><?=date('G:ia', strtotime($arrival_time_part));?> <!--10:25 PM--></h5>
                                                    <p class="booking-item-date">
                                                        <?=date("D, M j ", strtotime($arrival_date_part));?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <h5><?=$flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['Duration']?></h5>
                                            <p>
                                                <?php $numOfStop = $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['NumberofStops']; ?>
                                                <?php if($numOfStop==0 || $numOfStop == '0' || $numOfStop == ''){echo "non-stop";}else{echo $numOfStop."-stop";} ?>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                            $Select_Airline = array();
                                            $Select_Airline['UserTrackId'] = $flight_dataFSC['UserTrackId'];
                                            $Select_Airline['Fmethod'] = 'FSC';
                                            foreach ($flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'] as $fr => $OngoingFl) {
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
                                                <?php $CurrencyCode = $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][0]['CurrencyCode']; ?>
                                                <?=(isset($CurrencyCode) && !empty($CurrencyCode)) ? $CurrencyCode : "INR"; ?>
                                                <?=$flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][count($flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments']) - 1]['AvailPaxFareDetails'][0]['Adult']['GrossAmount'];?>
                                            </span><span>/person</span>
                                            <div style="display:none" id="sdiv_<?php echo $tmpid; ?>"><?php echo json_encode($Select_Airline); ?></div>
                                            <a class="btn btn-primary selectnow clickme" id="<?php echo $tmpid ?>" href="javascript:void(0);">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-item-details">
                                    <div class="row">
                                        <div class="slidingDiv">
                                        <?php foreach ($flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'] as $gkey => $AvailSegments) { ?>
                                            <div class="time">
                                                <div class="total-time col-sm-3">
                                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                    <div> <span class=""></span>Source & destination<br/>
                                                        <?php echo $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Origin']; ?> to <?php echo $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Destination']; ?> </div>
                                                </div>
                                                <div class="take-off col-sm-3">
                                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                    <div> <span class="skin-color">Take off</span><br>
                                                        <?php echo $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['DepartureDateTime']; ?>
                                                    </div>
                                                </div>
                                                <div class="landing col-sm-3">
                                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                    <div> <span class="skin-color">landing</span><br>
                                                        <?php // This will show arrive date and time of flight

                                                        echo $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['ArrivalDateTime'];
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="total-time col-sm-3">
                                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                    <div> <span class="skin-color">total time</span><br>
                                                        <?php // Total duartion of flight 

                                                        echo $flight_dataFSC['FSCAvailabilityOutput']['AvailableFlights'][$i]['AvailSegments'][$gkey]['Duration'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" clearfix"></div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                } ?>
                <?php
                if(($len + $lenFSC)==0) {
                ?>
                    <li><h3 align="center">Sorry! Direct Flight is not available on this Route !</h3></li>
                <?php } ?>
            </ul>
        </div>        
    </div>
    <div class="gap"></div>
</div>
<script>
    $(document).ready(function(){
        $("#source").autocomplete({
            source: function (request, response) {
                console.log($('#Domestic2').is(':checked'));
                $.ajax({
                    url: "<?php echo base_url('index.php/flight/get_airport_code'); ?>",
                    data: {term: request.term, domestic: $('#Domestic2').is(':checked')},
                    dataType: "json",
                    crossDomain: true,
                    success: function (data) {
                        response($.map(data.myData, function (item) {
                            return {
                                label: item.CITYAIRPORT,
                                value: item.CODE
                            }
                        }));
                    }
                })
            }
        });
        $("#destination").autocomplete({
            source: function (request, response) {
                console.log($('#Domestic2').is(':checked'));
                $.ajax({
                    url: "<?php echo base_url('index.php/flight/get_airport_code'); ?>",
                    data: {term: request.term, domestic: $('#Domestic2').is(':checked')},
                    dataType: "json",
                    success: function (data) {
                        response($.map(data.myData, function (item) {
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
    $(".selectnow").click(function () {
        currentlselection = $(this);
        <?php if ($this->session->userdata('uid') != '') {?>
        updateTicketselection();
        <?php } else { ?>
            var booking_data = currentlselection.attr('id');
            datat = $("#sdiv_" + booking_data).html();
            booking_data = JSON.parse(datat);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('index.php/flight/ticketselection'); ?>",
                data: {value: booking_data},
                success: function (data){window.location.href = '<?php echo base_url('index.php/flight/IntOnewayFlightBooking'); ?>/' + data;}
            });
        <?php } ?>
    });
    function updateTicketselection() {
        var booking_data = currentlselection.attr('id');
        datat = $("#sdiv_" + booking_data).html();
        booking_data = JSON.parse(datat);
        $.ajax({
            type: "post",
            url: "<?=base_url('index.php/flight/updateTicketselection');?>",
            data: {value: booking_data},
            success: function (data){
                if (data != 'true') {
                    window.location.href = '<?php echo base_url('index.php/flight/IntOnewayFlightBooking'); ?>/' + data;
                } else {
                    $('.bs-example-modal-sm').modal('hide');
                    alert('Login Problem Occurs');
                }
            }
        });
    }
</script>