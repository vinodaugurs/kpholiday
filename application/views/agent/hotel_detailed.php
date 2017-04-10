<?php
$hotel_galeery = @explode(", ", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['GalleryImages']);
$markepdata = $this->agent_model->get_busMrakup('Domestic Hotel');
$markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
?>
<?php $this->load->view('agent/header'); ?> 
<?php include 'sub-header.php';?>
<div id="page-wrapper">
    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-9">
                    <div class="tab-container style1" id="hotel-main-content">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                            <li><a data-toggle="tab" href="#map-tab">map</a></li>
                            <li><a data-toggle="tab" href="#steet-view-tab">street view</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="photos-tab" class="tab-pane fade in active">
                                <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                    <ul class="slides">
                                        <?php
                                        if (is_array($hotel_galeery)) {
                                            foreach ($hotel_galeery as $galeryimg) {
                                                ?>
                                                <li><img width="900" height="500" src="<?php echo str_replace("\\", "/", trim(@$galeryimg, ",")); ?>" alt="" /></li>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <li><img width="70" height="70" src="<?php echo str_replace("\\", "/", @$hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL']); ?>" alt="" /></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                    <ul class="slides">
                                        <?php
                                        if (!empty($hotel_galeery)) {
                                            foreach ($hotel_galeery as $galeryimg) {
                                                ?>
                                                <li><img width="70" height="70" src="<?php echo str_replace("\\", "/", trim(@$galeryimg, ",")); ?>" alt="" /></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div id="map-tab" class="tab-pane fade"></div>
                            <div id="steet-view-tab" class="tab-pane fade" style="height: 500px;"></div>
                        </div>
                    </div>
                    <div id="hotel-features" class="tab-container">
                        <ul class="tabs">
                            <li><a href="#hotel-description" data-toggle="tab">Description</a></li>
                            <li class="active"><a href="#hotel-availability" data-toggle="tab">Availability</a></li>
                            <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade " id="hotel-description">
                                <div class="intro table-wrapper full-width hidden-table-sms">
                                    <div class="col-sm-5 col-lg-4 features table-cell">
                                        <ul>
                                            <li><label>hotel type:</label><?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel'] ?> STAR</li>
                                            <li><label>Country:</label><?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['country'] ?></li>
                                            <li><label>City:</label><?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['city'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="long-description">
                                    <h2>About  <?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['HotelName'] ?></h2>
                                    <p>
                                        <?php
                                        if (is_array($hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Description'])) {
                                            echo implode(",", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Description']);
                                        } else {
                                            echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Description'];
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade in active" id="hotel-availability">
                                <h2>Available Rooms</h2>
                                <div class="room-list listing-style3 hotel">
                                    <?php if (array_key_exists(0, $ghoteldietail['RatePlanDetails']['Row'])) { ?>
                                        <?php foreach ($ghoteldietail['RatePlanDetails']['Row'] as $RatePlanDetails) { ?>
                                            <article class="box">
                                                <figure class="col-sm-4 col-md-3">
                                                    <a class="hover-effect popup-gallery" href="javascript:void(0);" title="<?=@$hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL']?>">
                                                        <img width="230" height="160" style="max-height:160px;max-width:230px" src="<?php echo (@getimagesize(str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL'])) !== false) ? str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL']) : 'http://placehold.it/230x160' ?>" alt="">
                                                    </a>
                                                </figure>
                                                <div class="details col-xs-12 col-sm-8 col-md-9">
                                                    <div>
                                                        <div>
                                                            <div class="box-title">
                                                                <h4 class="title"><?php echo $RatePlanDetails['HotelRoomTypeDesc']; ?></h4>
                                                            </div>
                                                            <div class="amenities">
                                                                <?php foreach ($ghoteldietail['FacilityId']['Facilities'] as $Facilities) {
                                                                    ?>
                                                                    <?php if (@$Facilities['Facility'] == 1) { ?> 
                                                                        <i class="soap-icon-wifi circle"></i>
                                                                    <?php } elseif (@$Facilities['Facility'] == 2) { ?>
                                                                        <i class="soap-icon-fork circle"></i>
                                                                        <?php
                                                                    } else {
                                                                        echo @$Facilities['FacilityName'] . ',';
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="price-section">
                                                            <span class="price"><small>PER/NIGHT</small>Rs<?php echo ($RatePlanDetails['PromotionTotal'] > 0) ? ($RatePlanDetails['PromotionTotal'] + $markup) : ($RatePlanDetails['RoomCharges'] + $RatePlanDetails['Tax'] + $markup); ?></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="action-section">
                                                            <a href="<?php echo base_url('index.php/agent/hotel_booking/' . $ghoteldietail['HotelId'] . '/' . urlencode($RatePlanDetails['RoomTypeID']) . '/' . urlencode($RatePlanDetails['RateplanId'])); ?>" title="" class="button btn-small full-width text-center">BOOK NOW</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <article class="box">
                                            <figure class="col-sm-4 col-md-3">
                                                <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" style="max-height:160px;max-width:230px" src="<?php echo (@getimagesize(str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL'])) !== false) ? str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL']) : 'http://placehold.it/230x160'; ?>" alt=""></a>
                                            </figure>
                                            <div class="details col-xs-12 col-sm-8 col-md-9">
                                                <div>
                                                    <div>
                                                        <div class="box-title">
                                                            <h4 class="title"><?php echo $ghoteldietail['RatePlanDetails']['Row']['HotelRoomTypeDesc']; ?></h4>                                                            
                                                        </div>
                                                        <div class="amenities">
                                                            <?php
                                                            if (isset($ghoteldietail['FacilityId']['Facilities'])) {
                                                                foreach ($ghoteldietail['FacilityId']['Facilities'] as $Facilities) {
                                                                    ?>
                                                                    <?php if (@$Facilities['Facility'] == 1) { ?> 
                                                                        <i class="soap-icon-wifi circle"></i> 
                                                                    <?php } elseif (@$Facilities['Facility'] == 2) { ?>
                                                                        <i class="soap-icon-fork circle"></i>
                                                                        <?php
                                                                    } else {
                                                                        echo @$Facilities['FacilityName'] . ',';
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="price-section">
                                                        <span class="price"><small>PER/NIGHT</small>Rs<?php echo ($ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] > 0) ? ($ghoteldietail['RatePlanDetails']['Row']['PromotionTotal'] + $markup) : $ghoteldietail['RatePlanDetails']['Row']['RoomCharges'] + $ghoteldietail['RatePlanDetails']['Row']['Tax'] + $markup; ?></span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="action-section">
                                                        <a href="<?php echo base_url('index.php/agent/hotel_booking/' . urlencode($ghoteldietail['HotelId']) . '/' . urlencode($ghoteldietail['RatePlanDetails']['Row']['RoomTypeID']) . '/' . urlencode($ghoteldietail['RatePlanDetails']['Row']['RateplanId'])); ?>" title="" class="button btn-small full-width text-center">BOOK NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hotel-amenities">
                                <h2>Amenities</h2>
                                <ul class="amenities clearfix style1">
                                    <?php
                                    if(!empty(@$hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['AmenityDetail'])){
                                        $AmenityDetail = explode(", ", @$hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['AmenityDetail']);
                                        foreach ($AmenityDetail as $amety) {
                                            ?>
                                            <li class="col-md-4 col-sm-6">
                                                <div class="icon-box style1"><i class="soap-icon-<?php echo str_replace(" ", "-", $amety); ?>"></i><?php echo $amety; ?></div>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                        
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
                                    <?php } ?>    
                                        
                                </ul>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-3">
                    <article class="detailed-logo">
                        <figure>
                            <img width="114" height="85" style="max-width:114px;max-height:85px" src="<?php echo (@getimagesize(str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL'])) !== false) ? str_replace("\\", "/", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['ImageURL']) : 'http://placehold.it/114x85' ?>" alt="">
                        </figure>
                        <div class="details">
                            <h2 class="box-title"><?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['HotelName'] ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['address'] ?>, <?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['city'] ?></span></small></h2>
                            <span class="price clearfix">
                                <small class="pull-left">avg/night</small>
                                <span class="pull-right">Rs <?php echo round(($ghoteldietail['LowRate'] + $ghoteldietail['Highrate']) / 2, 2); ?></span>
                            </span>
                            <div class="feedback clearfix">
                                <div title="<?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel'] ?> stars" class="<?php echo str_replace(" ", '-', $ghoteldietail['StarCategoryDesc']) ?>s-container" data-toggle="tooltip" data-placement="bottom"><span class="<?php echo str_replace(" ", '-', $ghoteldietail['StarCategoryDesc']) ?>s" style="width: 80%;"><?php echo $ghoteldietail['StarCategoryDesc'] ?></span></div>
                               <!-- <span class="review pull-right">270 reviews</span>-->
                            </div>
                            <p class="description"><?php echo @implode(",", $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['Description']) ?>.</p>
                            <!-- <a class="button yellow full-width uppercase btn-small">add to wishlist</a> -->
                        </div>
                    </article>
                    <div class="travelo-box contact-box">
                        <h4>Need kpholidays Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                            <br>
                            <a class="contact-email" href="#">help@kpholidays.com</a>
                        </address>
                    </div>
                    <div class="travelo-box">
                        <?php $similarhotel_dietail = $this->session->userdata('similar'); ?>

                        <h4>Similar Listings</h4>
                        <div class="image-box style14">
                            <?php
                            foreach ($similarhotel_dietail as $skey => $similar) {
                                if ($similar['HotelId'] == $ghoteldietail['HotelId'])
                                    continue;
                                if ($skey == 5)
                                    break;
                                ?>
                                <article class="box">
                                    <figure>
                                        <a href="<?php echo base_url('index.php/agent/hotel_detailed/' . $similar['Providerid'] . '/' . $similar['HotelId']); ?>">
                                            <img width="63" height="59" style="max-height:59px;max-width:63px" src="<?php echo (@getimagesize(str_replace("\\", "/", $similar['HotelImages'])) !== false) ? str_replace("\\", "/", $similar['HotelImages']) : 'http://placehold.it/63x59' ?>" alt="" />
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="<?php echo base_url('index.php/agent/hotel_detailed/' . $similar['Providerid'] . '/' . $similar['HotelId']); ?>"><?php echo $similar['HotelName'] ?></a></h5>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">Rs <?php echo round(($similar['LowRate'] + $similar['Highrate']) / 2, 2); ?></span>avg/night
                                        </label>
                                    </div>
                                </article>
                            <?php } ?>

                        </div>
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

                    <div  class=".preloader"  style="display:none;">
                        <img src="<?php echo base_url('image/preloader.png'); ?>"  width="50" height="25"/>  
                    </div>
                    <p  id="wait" align="center">Please Wait ....</p>
                    <p  class="fare_rule">

                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
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
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript">
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
    var fenway = new google.maps.LatLng(<?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['latitude'] ?>,<?php echo $hoteldetail_data['HotelDetailsResponse']['HotelDetailsResult']['HotelDetails']['HotelDetail']['longitude'] ?>);
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
</script>
<?php $this->load->view('agent/footer'); ?> 

