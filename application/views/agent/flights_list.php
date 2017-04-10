<?php $len = count(@$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights']); ?>
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
        <div class="col-md-12" id="flights-tab">
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
    <!--<div class="row"><div class="col-md-12"><h3 class="booking-title"><?=($len > 0) ? $len : '0';?> flights result found</h3><?php echo $this->session->flashdata('msg'); ?></div></div>-->
    <div class="row">
        <div class="col-md-12">
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
            <!--Flight list -->
            <div class="flight-list listing-style3 flight">
                <?php echo $this->session->flashdata('msg'); ?>
                <ul class="booking-list">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php
                    // If responsive Sattus is then will show flight list if 0 no flight will be available go in  elsepart                       
                    //this loop will view Show the no. of flight list   
                    $flights_name = array();
                    if (@$flight_data['ResponseStatus'] == 1) {
                        for ($i = 0; $i < $len; $i++) {
                            $code = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['AirlineCode'];
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
                                                        $departureDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['DepartureDateTime'];
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
                                                        <p class="booking-item-destination">
                                                            <!--London, England, United Kingdom (LHR)-->
                                                            <?=$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Origin'];?>
                                                        </p>
                                                    </div>
                                                    <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                        <?php
                                                        $arrival_date_part = date("Y-m-d");
                                                        $arrival_time_part = date("H:i:s");
                                                        $arrivalDateTime = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments']) - 1]['ArrivalDateTime'];
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
                                                        <p class="booking-item-destination"><?=$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Destination'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h5><?= $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['Duration'] ?></h5>
                                                <p>
                                                    <?php $numOfStop = $flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][0]['NumberofStops']; ?>
                                                    <?php if($numOfStop==0 || $numOfStop == '0' || $numOfStop == ''){echo "non-stop";}else{echo $numOfStop."-stop";} ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
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
                                                    <?=(isset($CurrencyCode) && !empty($CurrencyCode)) ? $CurrencyCode : "INR"; ?>
                                                    <?=$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][count($flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments']) - 1]['AvailPaxFareDetails'][0]['Adult']['GrossAmount']; ?>
                                                </span><span>/person</span>
                                                <!--<p class="booking-item-flight-class">Class: First</p>-->
                                                <div style="display:none" id="sdiv_<?php echo $tmpid; ?>"><?php echo json_encode($Select_Airline); ?></div>
                                                <a class="btn btn-primary selectnow clickme" id="<?php echo $tmpid ?>" href="javascript:void(0);">Book Now</a>
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
                                                                <?=$flight_data['AvailabilityOutput']['AvailableFlights']['OngoingFlights'][$i]['AvailSegments'][$gkey]['Duration'];?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="gap"></div>
                                                <?php } ?>
                                            </div>
                                            <!--
                                            <div class="col-md-8">
                                                <p>Flight Details</p>
                                                <h5 class="list-title">London (LHR) to Charlotte (CLT)</h5>
                                                <ul class="list">
                                                    <li>US Airways 731</li>
                                                    <li>Economy / Coach Class ( M), AIRBUS INDUSTRIE A330-300</li>
                                                    <li>Depart 09:55 Arrive 15:10</li>
                                                    <li>Duration: 9h 15m</li>
                                                </ul>
                                                <h5>Stopover: Charlotte (CLT) 7h 1m</h5>
                                                <h5 class="list-title">Charlotte (CLT) to New York (JFK)</h5>
                                                <ul class="list">
                                                    <li>US Airways 1873</li>
                                                    <li>Economy / Coach Class ( M), Airbus A321</li>
                                                    <li>Depart 22:11 Arrive 23:53</li>
                                                    <li>Duration: 1h 42m</li>
                                                </ul>
                                                <p>Total trip time: 17h 58m</p>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    } else {
                        ?>
                        <li><h3 align="center">Sorry Flight is not available on this Route !</h3></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    //Finding the fare Rule and Tax  Details 
    var currentlselection = "";
    var flightList =<?php echo json_encode($flights_name) ?>;
    var minprice = "";
    var maxprice = "";
    var mintime;
    var maxtime;
    jQuery(document).ready(function () {
        jQuery(".farerule").click(function ()
        {
            jQuery('.fare_rule').html('');
            jQuery(".preloader").show();
            jQuery("#wait").show();
            var fare = jQuery(this).attr('id');
            var markup = jQuery(this).data('markup');
            datat = jQuery("#div_" + fare).html();
            var fare = JSON.parse(datat);
            jQuery.ajax({
                type: "post",
                url: "<?php echo base_url('index.php/flight/tax_fare'); ?>",
                data: {value: fare},
                beforeSend: function () {},
                success: function (data)
                {
                    jQuery('.fare_rule').html(data);
                    jQuery('.table-striped').append('<tr><th>Agent Markup</th><td>' + markup + '</td></tr>');
                    jQuery(".preloader").hide();
                    jQuery("#wait").hide();
                }
            });
        });
        jQuery(".selectnow").click(function () {
            currentlselection = jQuery(this);
            <?php if ($this->session->userdata('uid') != '') {?>updateTicketselection();<?php } else {?>
                jQuery('#signupModal').modal('show');
            <?php } ?>
        });
        //autocomplete for flight city code
        jQuery("#source").autocomplete({
            source: function (request, response) {
                console.log(jQuery('#Domestic2').is(':checked'));
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
                console.log(jQuery('#Domestic2').is(':checked'));
                jQuery.ajax({url: "<?php echo base_url('index.php/flight/get_airport_code'); ?>",
                    data: {term: request.term, domestic: jQuery('#Domestic2').is(':checked')},
                    dataType: "json",
                    success: function (data) {
                        response(jQuery.map(data.myData, function (item) {
                            return {
                                label: item.CITYAIRPORT,
                                value: item.CODE
                            }
                        }));
                    }})
            }
        });
    });
    function updateTicketselection() {
        jQuery('#waitmodel').modal('show');
        var booking_data = currentlselection.attr('id');
        datat = jQuery("#sdiv_" + booking_data).html();
        var booking_data = JSON.parse(datat);
        jQuery.ajax({
            type: "post",
            url: "<?php echo base_url('index.php/flight/updateTicketselection'); ?>",
            data: {value: booking_data},
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
<?php $this->load->view('blocks/footer'); ?>
