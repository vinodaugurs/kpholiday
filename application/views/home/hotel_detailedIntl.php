<?php
$AmenityDetail = @explode(", ", $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['AmenityDetail']['Amenity']);
$hotel_detail = $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail'];
if (!empty($hotel_detail['GalleryImages']['Images'])) {
    $hotel_gallery = explode(", ", $hotel_detail['GalleryImages']['Images']);
    $hotel_gallery = str_replace(',', '', $hotel_gallery);
} else {
    $hotel_gallery = array();
}
?>
<div class="container">
    <div class="booking-item-details">
        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="lh1em"><?php echo $hotel_detail['HotelName'] ?></h2>
                    <p class="lh1em text-small"><i class="fa fa-map-marker"></i> <?php echo $hotel_detail['address'] ?>
                        , <?php echo $hotel_detail['city'] ?>, <?php echo $hotel_detail['country'] ?></p>
                </div>
                <div class="col-md-5">
                    <p class="booking-item-header-price">
                        <small>price from</small>
                        <span class="text-lg"><i class="fa fa-inr"></i> <?php echo $ghoteldietail['@attributes']['GIAvgAmount']; ?></span>avg/night
                    </p>

                </div>
            </div>
        </header>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="tabbable booking-details-tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a></li>
                    <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-1">
                        <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                            <?php if (!empty($hotel_gallery)) {
                                foreach ($hotel_gallery as $key => $images) {
                                    ?>
                                    <img src="<?php echo (!empty($images)) ? $images : 'http://placehold.it/114x85' ?>" alt="Hotel Image" title="<?= $hotel_detail['HotelName']; ?>"/>
                                <?php }
                            } else { ?>
                                <img src="http://placehold.it/365x255" alt="Hotel Image" title="<?= $hotel_detail['HotelName']; ?>"/>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="google-map-tab">
                        <div id="map-canvas" style="width:100%; height:500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3>Hotel Description</h3>
            <div class="row">
                <div class="col-md-4">
                    <div><strong>Hotel Type:</strong>
                        <ul class="icon-group booking-item-rating-stars">
                            <?php
                                for($i = 1; $i <= 5; $i++) {
                                    if($hotel_detail['Starlevel'] !=0 && $i <= $hotel_detail['Starlevel']) {
                                        echo '<li><i class="fa fa-star"></i></li>';
                                    } else {
                                        echo '<li><i class="fa fa-star-o"></i></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div><label><strong>Country:</strong></label><?php echo $hotel_detail['country'] ?></div>
                </div>
                <div class="col-md-4">
                    <div><label><strong>City:</strong></label><?php echo $hotel_detail['city'] ?></div>
                </div>
            </div>
            <hr>
            <h4>About <?= $hotel_detail['HotelName'] ?></h4>
            <p><?=(empty($hotel_detail['Description'])? 'Description not available!': $hotel_detail['Description'])?></p>
        </div>
    </div>
    <div class="gap"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab-12" data-toggle="tab">Availability</a></li>
                    <li><a href="#tab-13" data-toggle="tab">Amenities</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-12">
                        <ul class="booking-list">
                            <?php if (array_key_exists(0, $ghoteldietail['RoomTypes']['RoomType'])) { ?>
                                <?php foreach ($ghoteldietail['RoomTypes']['RoomType'] as $RatePlanDetails) { ?>
                                    <li>
                                        <a href="<?=site_url('hotel/hotel_bookingIntl/' . $RatePlanDetails['@attributes']['Hotelid'] . '/' . urlencode($RatePlanDetails['@attributes']['Bookingkey'])); ?>" class="booking-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="<?php echo (!empty($RatePlanDetails['@attributes']['ImageURL']) && @getimagesize($RatePlanDetails['@attributes']['ImageURL']) !== false) ? $RatePlanDetails['@attributes']['ImageURL'] : 'http://placehold.it/230x160'; ?>" alt="Room Image" title="The pool"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="booking-item-title"><?php echo $RatePlanDetails['@attributes']['Roomname']; ?></h5>
                                                    <dl class="description">
                                                        <dt>Max Guests:</dt>
                                                        <dd><?php echo $RatePlanDetails['@attributes']['MaxAdult']; ?>
                                                            Adult,<?php echo $RatePlanDetails['@attributes']['MaxChild']; ?>
                                                            Child
                                                        </dd>
                                                    </dl>
                                                    <div class="amenities">
                                                        <?php if(!empty($AmenityDetail)){ ?>
                                                            <?php foreach ($AmenityDetail as $Facilities) { ?>
                                                                <?php if (@$Facilities == 1) { ?>
                                                                    <i class="soap-icon-wifi circle"></i>
                                                                <?php } elseif (@$Facilities == 2) { ?>
                                                                    <i class="soap-icon-fork circle"></i>
                                                                <?php } else {
                                                                    echo @$Facilities . ',';
                                                                } ?>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                            <p>Sorry! Amenity details not available.</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="booking-item-price"><i class="fa fa-inr"></i><?php echo $RatePlanDetails['@attributes']['GIRoomChargesINR']; ?></span><span>/night </span><span class="btn btn-primary"> Book</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php }
                            } else { ?>
                                <li>
                                    <a href="<?php echo site_url('hotel/hotel_bookingIntl/' . $ghoteldietail['@attributes']['Hotelid'] . '/' . urlencode($ghoteldietail['RoomTypes']['RoomType']['@attributes']['Bookingkey'])); ?>" class="booking-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?php echo (!empty($hotel_detail['ImageURL']) && @getimagesize($hotel_detail['ImageURL']) !== false) ? $hotel_detail['ImageURL'] : 'http://placehold.it/230x160'; ?>" alt="Room Image" title="The pool"/>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="booking-item-title"><?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['Roomname']; ?></h5>
                                                <dl class="description">
                                                    <dt>Max Guests:</dt>
                                                    <dd><?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['MaxAdult']; ?>
                                                        Adult,<?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['MaxChild']; ?>
                                                        Child
                                                    </dd>
                                                </dl>
                                                <div class="amenities">
                                                    <?php if(!empty($AmenityDetail)){ ?>
                                                        <?php foreach ($AmenityDetail as $Facilities) {
                                                            ?>
                                                            <?php if (@$Facilities == 1) { ?>
                                                                <i class="soap-icon-wifi circle"></i>
                                                                <!--<i class="soap-icon-fitnessfacility circle"></i>-->
                                                            <?php } elseif (@$Facilities == 2) { ?>
                                                                <i class="soap-icon-fork circle"></i>
                                                            <?php } else {
                                                                echo @$Facilities . ',';
                                                            } ?>
                                                            <!--<i class="soap-icon-television circle"></i>-->
                                                        <?php } ?>
                                                    <?php }else{ ?>
                                                        <p>Sorry! Amenity details not available.</p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="booking-item-price">Rs<?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR']; ?></span>
                                                <span>/night</span><span class="btn btn-primary">Book</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="tab-13">
                        <h2>Amenities</h2>
                        <ul class="amenities clearfix style1">
                            <?php if(!empty($AmenityDetail)){ ?>
                            <?php foreach ($AmenityDetail as $amety) { ?>
                                <li class="col-md-4 col-sm-6">
                                    <div class="icon-box style1">
                                        <i class="soap-icon-<?php echo str_replace(" ", "-", $amety); ?>"></i><?php echo $amety; ?>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php }else{ ?>
                                <p>Sorry! Amenity details not available.</p>
                            <?php } ?>
                        </ul>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gap"></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cancellation Policy</h4>
                <a href=""></a>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <div class=".preloader" style="display:none;">
                    <img src="<?php echo base_url('image/preloader.png'); ?>" width="50" height="25"/>
                </div>
                <p id="wait" align="center">Please Wait ....</p>
                <p class="fare_rule"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div id="progress_bar" class="ui-progress-bar ui-container">
                <div class="ui-progress" style="width: 79%;">
                    <span class="ui-label" style="display:none;">Processing <b class="value">79%</b></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Google Map Api -->
<script>    //Finding the fare Rule and Tax  Details
    //jQuery.noConflict();
    $(document).ready(function () {

        $(".farerule").click(function () {
            $('.fare_rule').html('');
            $("#wait").show();
            var hotel_id = $(this).data('id');
            var hotel_bkey = $(this).data('key');
            $.ajax({

                type: "post",
                url: "<?php echo base_url('index.php/hotel/GetBookingTrackandCancelPolIntl');?>/" + encodeURI(hotel_id) + "/" + encodeURI(hotel_bkey),
                beforeSend: function () {},
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
<script type="text/javascript">
    /*
    tjq(document).ready(function () {
        tjq("#price-range").slider({
            range: true,
            min: 0,
            max: 1000,
            values: [100, 800],
            slide: function (event, ui) {
                tjq(".min-price-label").html("$" + ui.values[0]);
                tjq(".max-price-label").html("$" + ui.values[1]);
            }
        });
        tjq(".min-price-label").html("$" + tjq("#price-range").slider("values", 0));
        tjq(".max-price-label").html("$" + tjq("#price-range").slider("values", 1));

        function convertTimeToHHMM(t) {
            var minutes = t % 60;
            var hour = (t - minutes) / 60;
            var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
            var date = new Date("2014/01/01 " + timeStr + ":00");
            var hhmm = date.toLocaleTimeString(navigator.language, {hour: '2-digit', minute: '2-digit'});
            return hhmm;
        }

        tjq("#flight-times").slider({
            range: true,
            min: 0,
            max: 1440,
            step: 5,
            values: [360, 1200],
            slide: function (event, ui) {

                tjq(".start-time-label").html(convertTimeToHHMM(ui.values[0]));
                tjq(".end-time-label").html(convertTimeToHHMM(ui.values[1]));
            }
        });
        tjq(".start-time-label").html(convertTimeToHHMM(tjq("#flight-times").slider("values", 0)));
        tjq(".end-time-label").html(convertTimeToHHMM(tjq("#flight-times").slider("values", 1)));
    });

    tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
        var center = panorama.getPosition();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
    tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
        fenway = panorama.getPosition();
        panoramaOptions.position = fenway;
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    });
    var map = null;
    var panorama = null;
    var fenway = new google.maps.LatLng(?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['latitude']?>,?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['longitude']?>);
    var mapOptions = {
        center: fenway,
        zoom: 12
    };
    var panoramaOptions = {
        position: fenway,
        pov: {
            heading: 34,
            pitch: 10
        }
    };
    function initialize() {
        tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    */

    <!------------------------->
    //CODE ADDED BY VINOD YADAV
    <!------------------------->
    jQuery('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
        var center = panorama.getPosition();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
    jQuery('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
        fenway = panorama.getPosition();
        panoramaOptions.position = fenway;
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    });
    var map = null;
    var panorama = null;
    var fenway = new google.maps.LatLng(<?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['latitude']?>,<?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['longitude']?>);
    var mapOptions = {
        center: fenway,
        zoom: 12
    };
    var panoramaOptions = {
        position: fenway,
        pov: {
            heading: 34,
            pitch: 10
        }
    };
    function initialize() {
        jQuery("#map-tab").height(jQuery("#hotel-main-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>