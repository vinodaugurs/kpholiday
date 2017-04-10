<?php $package = $detail[0]; ?>
<!-- facilities -->
<style>
    .btn-primary{color: #FFFFFF !important;}
</style>
<div class="container">
    <div class="booking-item-details">
        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="lh1em"><?php echo $package['pack_name']; ?></h2>
                    <p class="lh1em text-small"><?= $package['nights'] . " Nights & " . $package['days'] ." Days" ?></p>
                </div>
                <div class="col-md-3">
                    <p class="booking-item-header-price">
                        <span class="text-lg"><i class="fa fa-inr"></i><?="&nbsp;" . $package['price']?></span><br>
                        <small>For <?= character_limiter($package['transport'], 20); ?> People(s)</small>
                    </p>
                </div>
        </header>
        <div class="row">
            <div class="col-md-6">
                <div class="tabbable booking-details-tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                        </li>
                        <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                              <?php $images = explode(',', $package['gallery']);?>
                                <?php for ($i = 0; $i < count($images); $i++) { ?>
                                    <img src="<?php echo base_url('upload/package/' . $images[$i]); ?>" alt="Image  augurs" title="HOTEL PORTO BAY SAO PAULO suite lhotel living room"/>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="google-map-tab">
                            <div id="map-canvas" style="width:100%; height:500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="booking-item-meta">
                    <h3>97% <small>of traveler recommend</small></h3>
                    <div class="booking-item-rating">
                        <ul class="icon-list icon-group booking-item-rating-stars">
                            <?php
                                for($i = 1; $i <= 5; $i++) {
                                    if($i<=round($review_rating["rating_average"])) {
                                        echo "<li class='filled'></li>";
                                    } else {
                                        echo "<li class='empty'></li>";
                                    }
                                }
                            ?>
                        </ul>
                        <?php if(!empty($review_rating["rating_average"]) && count($review_rating)>0) { ?>
                        <span class="booking-item-rating-number">
                            <b><?=round($review_rating["rating_average"])?></b> of 5 <small class="text-smaller">Average rating</small>
                            <p><a class="text-default" href="javascript:void(0)">based on <?=count($review_rating)?> reviews</a></p>
                        </span>
                        <?php } else { ?>
                          <span class="booking-item-rating-number">
                            <small class="text-smaller">be the first to rate this package</small>
                          </span>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="lh1em">Traveler Rating</h4>
                        <ul class="list booking-item-raiting-list">
                            <li>
                                <div class="booking-item-raiting-list-title">Excellent </div>
                                <div class="booking-item-raiting-list-bar">
                                    <div style="width:<?=$this->package_rating_model->getTotalRating($package['pack_id'], 5)?>%;"></div>
                                </div>
                                <div class="booking-item-raiting-list-number"><?=$this->package_rating_model->getTotalRating($package['pack_id'], 5)?></div>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Very Good</div>
                                <div class="booking-item-raiting-list-bar">
                                    <div style="width:<?=$this->package_rating_model->getTotalRating($package['pack_id'], 4)?>%;"></div>
                                </div>
                                <div class="booking-item-raiting-list-number"><?=$this->package_rating_model->getTotalRating($package['pack_id'], 4)?></div>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Average</div>
                                <div class="booking-item-raiting-list-bar">
                                    <div style="width:<?=$this->package_rating_model->getTotalRating($package['pack_id'], 3)?>%;"></div>
                                </div>
                                <div class="booking-item-raiting-list-number"><?=$this->package_rating_model->getTotalRating($package['pack_id'], 3)?></div>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Poor</div>
                                <div class="booking-item-raiting-list-bar">
                                    <div style="width:<?=$this->package_rating_model->getTotalRating($package['pack_id'], 2)?>%;"></div>
                                </div>
                                <div class="booking-item-raiting-list-number"><?=$this->package_rating_model->getTotalRating($package['pack_id'], 2)?></div>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Terrible</div>
                                <div class="booking-item-raiting-list-bar">
                                    <div style="width:<?=$this->package_rating_model->getTotalRating($package['pack_id'], 1)?>%;"></div>
                                </div>
                                <div class="booking-item-raiting-list-number"><?=$this->package_rating_model->getTotalRating($package['pack_id'], 1)?></div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="lh1em">Summary</h4>
                        <ul class="list booking-item-raiting-summary-list">
                            <li>
                                <div class="booking-item-raiting-list-title">Sleep</div>
                                <ul class="icon-group booking-item-rating-stars">
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            if($review_rating["sleep"] !=0 && $i <= $review_rating["sleep"]) {
                                                echo '<li><i class="fa fa-smile-o"></i></li>';
                                            } else {
                                                echo '<li><i class="fa fa-smile-o text-gray"></i></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Location</div>
                                <ul class="icon-group booking-item-rating-stars">
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            if($review_rating["location"] !=0 && $i <= $review_rating["location"]) {
                                                echo '<li><i class="fa fa-smile-o"></i></li>';
                                            } else {
                                                echo '<li><i class="fa fa-smile-o text-gray"></i></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Service</div>
                                <ul class="icon-group booking-item-rating-stars">
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            if($review_rating["service"] !=0 && $i <= $review_rating["service"]) {
                                                echo '<li><i class="fa fa-smile-o"></i></li>';
                                            } else {
                                                echo '<li><i class="fa fa-smile-o text-gray"></i></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Clearness</div>
                                <ul class="icon-group booking-item-rating-stars">
                                    <?php
                                        for($i = 1; $i <= 5; $i++) {
                                            if($review_rating["clearness"] !=0 && $i <= $review_rating["clearness"]) {
                                                echo '<li><i class="fa fa-smile-o"></i></li>';
                                            } else {
                                                echo '<li><i class="fa fa-smile-o text-gray"></i></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <div class="booking-item-raiting-list-title">Rooms</div>
                                <ul class="icon-group booking-item-rating-stars">
                                    <?php                                        
                                        for($i = 1; $i <= 5; $i++) {
                                            if($review_rating["rooms"] !=0 && $i <= $review_rating["rooms"]) {
                                                echo '<li><i class="fa fa-smile-o"></i></li>';
                                            } else {
                                                echo '<li><i class="fa fa-smile-o text-gray"></i></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="<?php echo site_url("package/package_booking/" . $package['pack_id']); ?>" title="" class="btn btn-primary" id="<?php echo $package['pack_id']; ?>">Book Now</a></div>
        </div>
        <div class="gap"></div>
        <h3>Package Description</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-11" data-toggle="tab">Package Details</a></li>
                        <li><a href="#tab-12" data-toggle="tab">Tour Highlights</a></li>
                        <li><a href="#tab-13" data-toggle="tab">About Place</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-11"><br/>
                            <p></p>
                            <div class="col-sm-4">
                                <h4 class=" text-center">Hotel</h4>
                                <div class=" col-sm-6" style="margin:0 auto; float:none;">
                                    <img class="" alt="" src="<?php echo base_url('assets/img2/img1.png'); ?>"></div>
                                <div class="pre-wrap"><?php if ($package['hotel']) {
                                        echo $package['hotel'];
                                    } else {
                                        echo "Hotel  Services are not available!";
                                    } ?></div>
                                <div class=" clearfix"></div>
                            </div>
                            <div class="col-sm-4">
                                <h4 class=" text-center"> Transport</h4>
                                <div class=" col-sm-6 " style="margin:0 auto; float:none;">
                                    <img alt="" src="<?php echo base_url('assets/img2/img2.png'); ?>"></div>
                                <div class="pre-wrap"><?php if ($package['transport']) {
                                        echo $package['transport'];
                                    } else {
                                        echo "Transport Services are not available!";
                                    } ?></div>
                                <div class=" clearfix"></div>
                            </div>
                            <div class=" col-sm-4">
                                <h4 class=" text-center">Activities</h4>
                                <div class=" col-sm-6 " style="margin:0 auto; float:none;">
                                    <img alt="" src="<?php echo base_url('assets/img2/img3.png'); ?>"></div>
                                <div class="pre-wrap"><?php if ($package['activities']) {
                                        echo $package['activities'];
                                    } else {
                                        echo "Transport Services are not available!";
                                    } ?></div>
                                <div class=" clearfix"></div>
                            </div>

                            <h3 class=" text-center hidden">Exclusions :-</h3>
                            <h3 class=" text-center hidden">Cancellation Policy :-</h3>

                        </div>

                        <div class="tab-pane fade" id="tab-12">
                            <h2 class=" text-center">Tour Highlights</h2>
                            <p class="mt10"><?=$package['tour_highlight']?></p>
                        </div>

                        <div class="tab-pane fade" id="tab-13">
                            <h2 class=" text-center">About Place :-</h2>
                            <p class="mt10"><?=$package['details']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr/>
        <br>
        <div class="row">
            <div class="col-md-8">
                <h3 class="mb20">Package Reviews</h3>
                
                <ul class="booking-item-reviews list">
                    
                    <?php if(!empty($reviews)){ ?>
                    <?php foreach($reviews as $review){ ?>
                    <li>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="booking-item-review-person">
                                    <p class="booking-item-review-person-name"><a href="#">John Doe</a></p>
                                    <p class="booking-item-review-person-loc">Palm Beach, FL</p>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="booking-item-review-content">
                                    <h5><?=$review["review_title"]?></h5>
                                    <ul class="icon-group booking-item-rating-stars">
                                        <?php for($i=1; $i<=5; $i++){ ?>
                                        <?php if($i<=$review["rating_average"]){ ?>
                                        <li><i class="fa fa-star"></i></li>
                                        <?php }else{ ?>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                    <p><?=$review["review_text"]?></p>
                                    <p class="text-small mt20"><p>Commented on :<?=$review["review_date"]?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php }} ?>
                </ul>
                <div class="gap gap-small"></div>
                <?php $userId = $this->session->userdata('uid');?>
                <?php if($review_submit_button && !empty($userId)){ ?>
                <div class="box bg-gray">
                    <h3>Write a Review</h3>
                    <form action="<?=base_url('index.php/home/submitReview')?>" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Review Title</label>
                                    <input class="form-control" type="text" name="review_title" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Review Text</label>
                                    <textarea class="form-control" name="review_text" required="required" rows="6" style="resize:none;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="list booking-item-raiting-summary-list stats-list-select">
                                    <li>
                                        <div class="booking-item-raiting-list-title">Sleep</div>
                                        <ul class="icon-group booking-item-rating-stars" id="sleep_rating">
                                            <li><i class="fa fa-smile-o" data-val="1"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="2"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="3"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="4"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="5"></i></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="booking-item-raiting-list-title">Location</div>
                                        <ul class="icon-group booking-item-rating-stars" id="location_rating">
                                            <li><i class="fa fa-smile-o" data-val="1"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="2"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="3"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="4"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="5"></i></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="booking-item-raiting-list-title">Service</div>
                                        <ul class="icon-group booking-item-rating-stars" id="service_rating">
                                            <li><i class="fa fa-smile-o" data-val="1"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="2"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="3"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="4"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="5"></i></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="booking-item-raiting-list-title">Clearness</div>
                                        <ul class="icon-group booking-item-rating-stars" id="cleaness_rating">
                                            <li><i class="fa fa-smile-o" data-val="1"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="2"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="3"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="4"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="5"></i></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="booking-item-raiting-list-title">Rooms</div>
                                        <ul class="icon-group booking-item-rating-stars" id="rooms_rating">
                                            <li><i class="fa fa-smile-o" data-val="1"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="2"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="3"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="4"></i></li>
                                            <li><i class="fa fa-smile-o" data-val="5"></i></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input type="hidden" name="pack_id" value="<?=$package['pack_id']?>">
                                <input type="hidden" name="sleep" id="sleep" value="1">
                                <input type="hidden" name="location" id="location" value="1">
                                <input type="hidden" name="service" id="service" value="1">
                                <input type="hidden" name="clearness" id="clearness" value="1">
                                <input type="hidden" name="rooms" id="rooms" value="1">
                                <input class="btn btn-primary" name="sbmt" type="submit" value="Leave a Review"/>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <h4>About the Package </h4>
                <p class="mb30"><?=$package['details']?></p>
                <h4>Package Facilities</h4>
                <ul class="booking-item-features booking-item-features-expand mb30 clearfix">
                  <?php 
                    $packFacilities = explode(',', $package['facilities']);
                    foreach ($packFacilities as $key => $value) {
                      ?>
                        <li><i class="fa fa-anchor"></i><span class="booking-item-feature-title"><?=rtrim($value, "=1")?></span></li>
                      <?php
                    }
                  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#sleep_rating li i").click(function(){
            $("#sleep").val($(this).attr("data-val"));
        });
        $("#location_rating li i").click(function(){
            $("#location").val($(this).attr("data-val"));
        });
        $("#service_rating li i").click(function(){
            $("#service").val($(this).attr("data-val"));
        });
        $("#clearness_rating li i").click(function(){
            $("#clearness").val($(this).attr("data-val"));
        });
        $("#rooms_rating li i").click(function(){
            $("#rooms").val($(this).attr("data-val"));
        });
    });
</script>