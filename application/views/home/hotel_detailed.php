<?php
$hotel_detail = @$hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail'];
if(!empty($hotel_detail)){

if (!empty($hotel_detail['GalleryImages'])) {
    $hotel_gallery = explode(", ", $hotel_detail['GalleryImages']);
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
                    <p class="lh1em text-small"><i class="fa fa-map-marker"></i> <?php echo $hotel_detail['address'] ?>, <?php echo $hotel_detail['city'] ?></p>
                </div>
                <div class="col-md-5">
                    <p class="booking-item-header-price">
                        <small>price from</small>
                        <span class="text-lg"><i class="fa fa-inr"></i> <?php echo round(($ghoteldietail['LowRate'] + $ghoteldietail['Highrate']) / 2); ?></span>avg/night
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
                            <?php
                            if (!empty($hotel_gallery)) {
                                foreach ($hotel_gallery as $key => $images) { ?>
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
            <p>
            <?php 
                if(empty($hotel_detail['Description'])){
                    echo 'Description not available!';
                }else{
                    if (is_array($hotel_detail['Description'])) {
                        echo implode(",", $hotel_detail['Description']);
                    } else {
                        echo $hotel_detail['Description'];
                    } 
                }
            ?>
            </p>
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
                            <?php if (array_key_exists(0, $ghoteldietail['RatePlanDetails']['Row'])) { ?>
                                <?php foreach ($ghoteldietail['RatePlanDetails']['Row'] as $RatePlanDetails) { ?>
                                    <li>
                                        <a href="<?php echo site_url('hotel/hotel_booking/' . $ghoteldietail['HotelId'] . '/' . urlencode($RatePlanDetails['RoomTypeID']) . '/' . urlencode($RatePlanDetails['RateplanId'])); ?>"
                                           class="booking-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <?php if($hotel_detail["HotelName"]=="Gemini Inn"){ ?>
                                                    <img src="http://placehold.it/230x160" alt="<?php echo $hotel_detail['HotelName'] ?> Image" title="<?php echo $hotel_detail['HotelName'] ?> Image">
                                                    <?php } else { ?>
                                                    <img src="<?php echo (!empty($hotel_detail['ImageURL'])) ? $hotel_detail['ImageURL'] : 'http://placehold.it/230x160'; ?>" alt="Room Image" title="The pool"/>
                                                    <?php }?>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="booking-item-title"><?= $RatePlanDetails['HotelRoomTypeDesc']; ?></h5>
                                                    <div class="amenities">
                                                        <?php if(!empty($ghoteldietail['FacilityId']['Facilities'])){ ?>
                                                        <?php foreach ($ghoteldietail['FacilityId']['Facilities'] as $Facilities) {
                                                            ?>
                                                            <?php if (@$Facilities['Facility'] == 1) { ?>
                                                                <i class="soap-icon-wifi circle"></i>
                                                            <?php } elseif (@$Facilities['Facility'] == 2) { ?>
                                                                <i class="soap-icon-fork circle"></i>
                                                            <?php } else {
                                                                echo @$Facilities['FacilityName'] . ',';
                                                            } ?>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="booking-item-price"><i class="fa fa-inr"></i><?php echo ($RatePlanDetails['PromotionTotal'] > 0) ? $RatePlanDetails['PromotionTotal'] : ($RatePlanDetails['RoomCharges'] + $RatePlanDetails['Tax']); ?></span><span>/night</span>
                                                    <span class="btn btn-primary"> Book</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php }
                            } else { ?>
                                <li>
                                    <a href="<?php echo site_url('hotel/hotel_booking/' . urlencode($ghoteldietail['HotelId']) . '/' . urlencode($ghoteldietail['RatePlanDetails']['Row']['RoomTypeID']) . '/' . urlencode($ghoteldietail['RatePlanDetails']['Row']['RateplanId'])); ?>"
                                       class="booking-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?php echo (@getimagesize($hotel_detail['ImageURL']) !== false) ? $hotel_detail['ImageURL'] : 'http://placehold.it/230x160'; ?>"
                                                     alt="Room Image" title="The pool"/>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="booking-item-title"><?= $ghoteldietail['RatePlanDetails']['Row']['HotelRoomTypeDesc']; ?></h5>

                                                <?php if (isset($ghoteldietail['FacilityId']['Facilities'])) {
                                                    foreach ($ghoteldietail['FacilityId']['Facilities'] as $Facilities) {
                                                        ?>
                                                        <?php if (@$Facilities['Facility'] == 1) { ?>
                                                            <i class="soap-icon-wifi circle"></i>
                                                        <?php } elseif (@$Facilities['Facility'] == 2) { ?>
                                                            <i class="soap-icon-fork circle"></i>
                                                        <?php } else {
                                                            echo @$Facilities['FacilityName'] . ',';
                                                        } ?>
                                                    <?php }
                                                } ?>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="booking-item-price"><i class="fa fa-inr"></i><?php echo ($ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] > 0) ? $ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] : $ghoteldietail['RatePlanDetails']['Row']['RoomCharges'] + $ghoteldietail['RatePlanDetails']['Row']['Tax']; ?></span><span>/night</span>
                                                <span class="btn btn-primary"> Book</span>
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
                            <?php
                            if(!empty($hotel_detail['AmenityDetail']) && is_array($hotel_detail['AmenityDetail'])){
                                $AmenityDetail = explode(", ", $hotel_detail['AmenityDetail']);
                                foreach ($AmenityDetail as $amety) {
                                    ?>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="icon-box style1">
                                            <i class="soap-icon-<?php echo str_replace(" ", "-", $amety); ?>"></i><?php echo $amety; ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php }else{ ?>
                                <li class="col-md-4 col-sm-6">
                                    <p>Sorry! Amenities not available.</p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gap"></div>
<?php }else{ ?>
    <div class="container">
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="lh1em">Sorry! Hotel details not found...</h2>
                        <p class="lh1em text-small">You should try another query.</p>
                    </div>
                </div>
            </header>
        </div>
        <div class="gap"></div>
    </div>
<?php } ?>
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
<script type="text/javascript">
    tjq('a[href="#google-map-tab"]').on('shown.bs.tab', function (e) {
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
    var fenway = new google.maps.LatLng(<?=$hotel_detail['latitude']?>,<?=$hotel_detail['longitude']?>);
    //var fenway = new google.maps.LatLng(26.8467,80.9462);
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
        tjq("#map-canvas").height(tjq(".tab-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        map.setStreetView(panorama);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

