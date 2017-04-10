<!-- TOP AREA -->
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
<div class="top-area show-onload">
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-parallax" style="background-image:url(<?php echo base_url(); ?>assets/img/196_365_2048x1365.jpg);"></div>
        <div class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-tabs search-tabs-bg mt50">
                            <h1>Find Your Perfect Trip</h1>
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-building-o"></i> <span>Hotels</span></a></li>
                                    <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-plane"></i><span>Flights</span></a></li>
                                    <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-bus"></i> <span>Buses</span></a></li>
                                    <li><a href="https://www.irctc.co.in" target="_blank"><i class="fa fa-train" aria-hidden="true"></i> <span >Train</span></a></li>
                                    <li><a href="javascript:void(0)" data-toggle="tab"><i class="fa fa-bolt"></i><span>Recharge</span></a></li>
                                    <li style="display:none;"><a href="#tab-5" data-toggle="tab"><i class="fa fa-bolt"></i> <span>Activities</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                        <h2>Search and Save on Hotels</h2>
                                        <form action="<?php echo site_url('hotel/hotel_list'); ?>" method="POST">
                                            <div class="form-group form-group-lg form-group-icon-left">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-6">
                                                        <label>
                                                            <input type="radio" checked="checked" name="hotel_mode" value="Domestic" id="hotel_domestic" class="R"/> Domestic
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label>
                                                            <input type="radio" name="hotel_mode" class="way" id="hotel_internationl" value="International"> International
                                                        </label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                <label>Where are you going?</label>
                                                <input class="typeahead form-control" placeholder="Enter city location where you are going..." id="hotel_city" name="city" type="text"/>
                                            </div>
                                            <div class="input-daterange" data-date-format="mm/dd/yy">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Check-in</label>
                                                            <input class="form-control check-in" name="checkin" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Check-out</label>
                                                            <input class="form-control check-out" name="checkout" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group form-group-lg form-group-select-plus">
                                                            <label>Rooms</label>
                                                            <select name="rooms" class="form-control">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group form-group-lg form-group-select-plus">
                                                            <label>Guests</label>
                                                            <select name="adults" class="form-control">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group form-group-lg form-group-select-plus">
                                                            <label>Kids(2-11)</label>
                                                            <select name="kids" class="form-control">
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg clickme" type="submit">Search for Hotels</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2">
                                        <h2>Search for Cheap Flights</h2>
                                        <form method="post" action="<?= base_url() ?>index.php/flight/flight_list">
                                            <div class="form-group form-group-lg form-group-icon-left">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-6">
                                                        <label> <input type="radio" checked="checked" name="flight_mode" value="Domestic" id="flight_domestic" class="R"/>&nbsp;Domestic</label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> <input type="radio" name="flight_mode" class="way" id="flight_internationl" value="International">&nbsp;International</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <label> <input type="radio" checked="checked" name="way" value="O" id="flight_One_way" class="R"/>&nbsp;One way</label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> <input type="radio" name="way" class="way" id="flight_RoundTrip" value="R">&nbsp;Round Trip</label></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-lg form-group-icon-left">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <i class="fa fa-map-marker input-icon" style="margin-left:15px;"></i>
                                                        <label> Select Origin</label>
                                                        <input class="form-control " placeholder="Select Origin" name="source" id="source" type="text"/>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <i class="fa fa-map-marker input-icon" style="margin-left:15px;"></i>
                                                        <label>Select Destination</label>
                                                        <input class="form-control " placeholder="Select Destination" name="destination" id="destination" type="text"/>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <i class="fa fa-plane input-icon" style="margin-left:15px;"></i>
                                                        <label>Class</label>
                                                        <select name="ClassType" class="form-control">
                                                            <option value="Economy">Economy</option>
                                                            <option value="Business">Business</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-daterange" data-date-format="mm/dd/yy">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Departing On</label>
                                                            <input class="form-control check-in" name="departure" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Return On</label>
                                                            <input class="form-control check-out" name="arrive" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group form-group-lg form-group-select-plus">
                                                            <label>Adults(12+)</label>
                                                            <select name="adult" class="form-control">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="10">11</option>
                                                                <option value="10">12</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group form-group-lg form-group-select-plus">
                                                            <label>Kids(2-11)</label>
                                                            <select name="child" class="form-control">
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group  form-group-lg form-group-select-plus">
                                                            <label>Infants(0-2)</label>
                                                            <select name="infant" class="form-control">
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg clickme" type="submit">Search for Flights</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab-4">
                                        <h2>Search for Cheap Rental Buses</h2>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Pick-up Location</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Drop-off Location</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-daterange" data-date-format="M d, D">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Pick-up Date</label>
                                                            <input class="form-control" name="start" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                            <label>Pick-up Time</label>
                                                            <input class="time-pick form-control" value="12:00 AM" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Drop-off Date</label>
                                                            <input class="form-control" name="end" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                            <label>Drop-off Time</label>
                                                            <input class="time-pick form-control" value="12:00 AM" type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg clickme" type="submit">Search for Rental Buses</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab-5">
                                        <h2>Search for Activities</h2>
                                        <form>
                                            <div class="input-daterange" data-date-format="M d, D">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i
                                                                class="fa fa-map-marker input-icon"></i>
                                                            <label>Where are you going?</label>
                                                            <input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>From</label>
                                                            <input class="form-control" name="start" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>To</label>
                                                            <input class="form-control" name="end" type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg clickme" type="submit">Search for Activities</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="loc-info text-right hidden-xs hidden-sm">
                            <h3 class="loc-info-title"><img src="<?php echo base_url(); ?>assets/img/flags/32/in-f.png" alt="Image augurs" title="kpholidays"/>Lucknow</h3>
                            <p class="loc-info-weather"><span class="loc-info-weather-num">+31</span><i
                                    class="im im-rain loc-info-weather-icon"></i>
                            </p>
                            <ul class="loc-info-list">
                                <li><a href="#"><i class="fa fa-building-o"></i> 277 Hotels from Rs.1500/night</a></li>
                                <li><a href="#"><i class="fa fa-home"></i> 130 Rentals from Rs.1200/night</a></li>
                                <li><a href="#"><i class="fa fa-Bue"></i> 294 View Offers from Rs.1100/day</a></li>
                                <li><a href="#"><i class="fa fa-bolt"></i> 200 Activities this Week</a></li>
                            </ul>
                            <a class="btn btn-white btn-ghost mt10" style="color: #FFFFFF;" href="#"><i class="fa fa-angle-right"></i> Explore</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TOP AREA  -->
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap" data-gutter="60">
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i
                        class="fa fa-dollar box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Price Guarantee</a></h5>
                    <p class="thumb-desc">At Kpholidays we make sure you get the best deals from us, Right from hotels,
                        flights, buses and recharge. </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i
                        class="fa fa-lock box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Trust & Safety</a></h5>
                    <p class="thumb-desc">You can count on us, At Kpholidays we maintain customer trust and uttermost
                        safety of people we care.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header"><i
                        class="fa fa-thumbs-o-up box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">Best Travel Agent</a></h5>
                    <p class="thumb-desc">Our Agents are top class in world, we filter our agents and only with passion
                        for travel are among our team.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
</div>
<div class="bg-holder">
    <div class="bg-mask"></div>
    <div class="bg-parallax"
         style="background-image:url(<?php echo base_url(); ?>assets/img/hotel_the_cliff_bay_spa_suite_2048x1310.jpg);"></div>
    <div class="bg-content">
        <div class="container">
            <div class="gap gap-big text-center text-white">
                <h2 class="text-uc mb20">Last Minute Deal</h2>
                <ul class="icon-list list-inline-block mb0 last-minute-rating">
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                </ul>
                <h5 class="last-minute-title">The Back Waters - Kerala</h5>
                <p class="last-minute-date">Fri 24 Mar - Sun 05 Apr</p>
                <p class="mb20"><b>Rs.5000</b> / person</p>
                <a class="btn btn-white btn-ghost mt10" style="color: #FFFFFF;" href="javascript:void();"><i class="fa fa-angle-right"></i> Book Now</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="gap"></div>
    <h2 class="text-center">Top Destinations</h2>
    <div class="gap">
        <div class="row row-wrap">
            <?php
            if (!empty($destinations)) {
                foreach ($destinations as $dest) {
                    ?>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="<?php echo site_url('home/view_detail/' . $dest['id']); ?>">
                                    <img width="270" height="160" src="<?php echo base_url('upload/destination/' . $dest['main_image']); ?>" alt="Image  augurs" title="the journey home"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><?php echo $dest['name']; ?>
                                    <small>
                                        <?php
                                        $countryobj = $this->region_model->getCountryValue($dest['country']);
                                        echo $countryobj[0]['country'];
                                        ?>
                                    </small>
                                </h4>
                                <p class="thumb-desc"><?= character_limiter($dest["description"], 70); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <h5 class="Btn-Explore"><a href="<?= base_url() ?>index.php/home/view_all_destinations" class="pull-right">Explore Destinations...</a></h5>
    </div>
    <div class="gap"></div>
    <h2 class="text-center">Popular Packages</h2>
    <div class="gap">
        <div class="row row-wrap">
            <?php
            if (!empty($packages)) {
                foreach ($packages as $pack) {
                    ?>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="<?php echo site_url('home/package_detail/' . $pack['pack_id']); ?>">
                                    <img width="270" height="160" src="<?php echo base_url('upload/package/' . $pack['front_image']); ?>" alt="Package Image" title="the journey home"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><?php echo $pack['pack_name']; ?>
                                    <small>
                                        <?php
                                        $countryobj = $this->region_model->getCountryValue($pack['country']);
                                        echo $countryobj[0]['country'];
                                        ?>
                                    </small>
                                </h4>
                                <p class="thumb-desc"><?= character_limiter($pack["details"], 70); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <h5 class="Btn-Explore"><a href="<?= base_url() ?>index.php/home/view_all_packages" class="pull-right">Explore Packages...</a></h5>
    </div>
</div>
<script>
    //autocomplete for flight city code
    $("#source").autocomplete({
        source: function (request, response) {
            console.log($('#Domestic2').is(':checked'));
            $.ajax({
                url: "<?= base_url() ?>index.php/flight/get_airport_code",
                data: {term: request.term, domestic: $('#Domestic2').is(':checked')},
                dataType: "json",
                crossDomain: true,
                success: function (data) {
                    //alert(JSON.stringify(data));
                    response($.map(data.myData, function (item) {
                        return {
                            label: item.CITYAIRPORT,
                            value: item.CODE
                        }
                    }));
                }
            });
        }
    });

    $("#destination").autocomplete({
        source: function (request, response) {
            console.log($('#Domestic2').is(':checked'));
            $.ajax({
                url: "<?php echo site_url('flight/get_airport_code'); ?>",
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

    $("#hotel_city").autocomplete({
        source: function (request, response) {
            //console.log($('#Domestic2').is(':checked'));
            $.ajax({
                url: "<?php echo site_url('hotel/get_city'); ?>",
                data: {term: request.term, domestic: $('#hotel_domestic').is(':checked')},
                dataType: "json",
                success: function (data) {
                    response($.map(data.myData, function (item) {
                        return {
                            label: item.state,
                            value: item.state
                        }
                    }));
                }
            })
        }
    });

    $("#bus_origin").autocomplete({
        source: function (request, response) {
            $("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="First choose  Origin" />');
            $.ajax({
                url: "<?php echo site_url('bus/BusGetOrigin'); ?>",
                data: {term: request.term},
                dataType: "json",
                success: function (data) {
                    response($.map(data.myData, function (item) {
                        return {
                            label: item.OriginId,
                            value: item.OriginName
                        }
                    }));
                }
            })
        },
        select: function (event, ui) {
            $("#bus_origin_code").val(ui.item.value);
        }
    });

    var lastSearch = "";
    $("#bus_origin").blur(function (e) {
        if (lastSearch == $("#bus_origin").val()) {
            return false;
        }
        $("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="Please Wait..." />');
        $.ajax({
            url: "<?php echo site_url('bus/BusGetDestination'); ?>",
            data: {term: $("#bus_origin").val()},
            dataType: "json",
            success: function (data) {
                lastSearch = $("#bus_origin").val();
                if (data == false) {
                    alert("Sorry! no bus available from this origin");
                    $("#bus_destination")
                            .replaceWith('<select  id="bus_destination" required="required" placeholder="chose diffrent origin..."  name="Destination" class="input-text full-width"><option value="">please chose diffrent origin</option></select>');
                } else {
                    var optionss = '';
                    $(data).each(function (index, element) {
                        optionss = optionss + '<option value="' + element.DestinationId + '">' + element.DestinationName + '</option>'
                    });
                    $("#bus_destination").replaceWith('<select onchange="$(\'#bus_destination_code\').val($(\'#bus_destination>option:selected\').text());" id="bus_destination" required="required"  name="Destination" class="input-text full-width"><option value=\'\'>--Select Destination--' + optionss + '</select>');
                }
            }
        });
    });
</script>