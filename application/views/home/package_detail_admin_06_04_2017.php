<?php include 'header.php'; ?>
<div id="page-wrapper">
    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-9">
                    <div class="tab-container style1" id="hotel-main-content">
                        <div class="tab-content">
                            <br/>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php for ($i = 1; $i <= 6; $i++) {
                                        if ($i == 1) {?>
                                            <li data-target="#carousel-example-generic"
                                                data-slide-to="<?php echo $i; ?>" class="active"></li>
                                        <?php } else {
                                            ?>
                                            <li data-target="#carousel-example-generic"
                                                data-slide-to="<?php echo $i; ?>"></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php for ($i = 1; $i <= 6; $i++) {
                                        if ($detail[0]['image_' . $i] != '') {
                                            if ($i == 1) {
                                                ?>
                                                <div class="item active">
                                                    <img
                                                        src="<?php echo base_url('upload/package/' . $detail[0]['image_' . $i]); ?>"
                                                        alt="...">
                                                    <div class="carousel-caption"></div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="item">
                                                    <img src="<?php echo base_url('upload/package/' . $detail[0]['image_' . $i]); ?>" alt="...">
                                                    <div class="carousel-caption"></div>
                                                </div>
                                            <?php } ?>
                                        <?php }
                                    } ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="hotel-features" class="tab-container">
                        <ul class="tabs">
                            <li class="active"><a href="#hotel-description" data-toggle="tab">Package Details</a></li>
                            <li><a href="#hotel-availability" data-toggle="tab">Itineary</a></li>
                            <li><a href="#hotel-things-todo" data-toggle="tab">About Place</a></li>
                            <li><a href="#hotel-write-review" data-toggle="tab">Customer Review </a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="hotel-description">
                                <div class="update-search clearfix">
                                    <h2>About Package</h2>
                                    <p> <?php echo $detail[0]['details']; ?> </p>
                                </div>
                                <h2></h2>
                                <div class="block">
                                    <div class="tab-container full-width-style white-bg">
                                        <ul class="tabs">
                                            <li class="active"><a href="#first-tab" data-toggle="tab"><i class="soap-icon-anchor circle"></i> Inclusion</a></li>
                                            <li><a href="#second-tab" data-toggle="tab"><i class="soap-icon-user circle"></i>Exclusions:-</a></li>
                                            <li><a href="#third-tab" data-toggle="tab"><i class="soap-icon-suitcase circle"></i>Cancellation <br/>Policy:-</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="first-tab">
                                                <h2 class="tab-content-title"></h2>
                                                <div class="activities image-box style2 innerstyle">
                                                    <article class="box">
                                                        <figure>
                                                            <a title="" href="#"><img style="width:160px; height:120px;" alt="" src="<?php echo base_url('image/hotel.png'); ?>"></a>
                                                        </figure>
                                                        <div class="details">
                                                            <div class="details-header">
                                                                <h4 class="box-title">Hotel</h4>
                                                            </div>
                                                            <p>
                                                                <?php if ($detail[0]['hotel']) {
                                                                    echo $detail[0]['hotel'];
                                                                } else {
                                                                    echo "Hotel  Services are not available!";
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div class="activities image-box style2 innerstyle">
                                                    <article class="box">
                                                        <figure><a title="" href="#"><img style="width:160px; height:120px;" alt="" src="<?php echo base_url('image/transport.jpg'); ?>"></a></figure>
                                                        <div class="details">
                                                            <div class="details-header">
                                                                <h4 class="box-title">Transport</h4>
                                                            </div>
                                                            <p>
                                                                <?php if ($detail[0]['transport']) {
                                                                    echo $detail[0]['transport'];
                                                                } else {
                                                                    echo "Transport Services are not available!";
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div class="activities image-box style2 innerstyle">
                                                    <article class="box">
                                                        <figure><a title="" href="#"><img style="width:160px; height:120px;" alt="" src="<?php echo base_url('image/activity.jpg'); ?>"></a></figure>
                                                        <div class="details">
                                                            <div class="details-header">
                                                                <h4 class="box-title">Activities</h4>
                                                            </div>
                                                            <p>

                                                            </p>

                                                        </div>

                                                    </article>

                                                </div>


                                            </div>

                                            <div class="tab-pane fade" id="second-tab">

                                                <h2 class="tab-content-title">Second Tab</h2>

                                                <div class="activities image-box style2 innerstyle">

                                                    <article class="box">

                                                        <figure>

                                                            <a title="" href="#">

                                                                <img width="250" height="161" alt=""

                                                                     src="<?php echo base_url('image/image1.jpg'); ?>"></a>

                                                        </figure>

                                                        <div class="details">

                                                            <div class="details-header">

                                                                <h4 class="box-title">Getting There</h4>

                                                            </div>

                                                            <p>

                                                            </p>

                                                        </div>

                                                    </article>

                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="third-tab">

                                                <h2 class="tab-content-title">Third Tab</h2>

                                                <div class="activities image-box style2 innerstyle">

                                                    <article class="box">

                                                        <figure>

                                                            <a title="" href="#">

                                                                <img width="250" height="161" alt=""

                                                                     src="<?php echo base_url('image/image1.jpg'); ?>"></a>

                                                        </figure>

                                                        <div class="details">

                                                            <div class="details-header">

                                                                <h4 class="box-title">Getting There</h4>

                                                            </div>

                                                            <p>

                                                            </p>

                                                        </div>

                                                    </article>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="tab-pane fade" id="hotel-availability">

                                <?php $count = 0;

                                if (!empty($detail[0]['days_activity'])) {

                                    $details = explode("<111>", $detail[0]['days_activity']);


                                    for ($i = 0; $i < $detail[0]['days']; $i++) {

                                        $count = $count + 1;


                                        echo "<div class='update-search clearfix'>";

                                        echo "<h2'>DAY " . $count . "</h2>";


                                        echo "<div class='clearfix'></div>";

                                        echo "</div>";

                                        if (!empty($detail[$i])) {

                                            echo "<p  style=' margin-left:25px;'>'" . $detail[$i] . "'</p>";

                                        }

                                    }

                                }

                                ?>


                            </div>


                            <div class="tab-pane fade" id="hotel-things-todo">

                                <?php $dest = $this->pack_model->getdestibyid($detail[0]['city']); ?>

                                <?php if ($dest) { ?>

                                    <h2>Things to Do</h2>

                                    <p><?php echo $dest[0]['description']; ?></p>

                                    <div class="activities image-box style2 innerstyle">

                                        <article class="box">


                                            <div class="details">

                                                <div class="details-header">

                                                    <h4 class="box-title">Getting There</h4>

                                                </div>

                                                <p>

                                                    <?php echo $dest[0]['getting_there']; ?>

                                                </p>

                                            </div>

                                        </article>

                                        <article class="box">


                                            <div class="details">

                                                <div class="details-header">


                                                    <h4 class="box-title">By Train</h4>

                                                </div>

                                                <p><?php echo $dest[0]['train']; ?></p>


                                            </div>

                                        </article>

                                        <?php if ($dest[0]['air']) { ?>

                                            <article class="box">


                                                <div class="details">

                                                    <div class="details-header">


                                                        <h4 class="box-title">By Air</h4>

                                                    </div>

                                                    <p><?php $dest[0]['air']; ?></p>


                                                </div>

                                            </article>

                                        <?php } ?>

                                        <?php if ($dest[0]['road']) { ?>

                                            <article class="box">


                                                <div class="details">

                                                    <div class="details-header">


                                                        <h4 class="box-title">By Road</h4>

                                                    </div>

                                                    <p><?php $dest[0]['road']; ?></p>


                                                </div>

                                            </article>

                                        <?php } ?>


                                        <article class="box">

                                            <figure>

                                                <a title="" href="#"><img width="250" height="161" alt="" src=""></a>

                                            </figure>

                                            <div class="details">

                                                <div class="details-header">


                                                    <h4 class="box-title">Visit Time & Do</h4>

                                                </div>

                                                <p><?php echo $dest[0]['visit_time']; ?></p>

                                                <p><?php echo $dest[0]['visit_do']; ?></p>

                                            </div>

                                        </article>

                                        <?php if ($dest[0]['acco']) { ?>

                                            <article class="box">

                                                <figure>

                                                    <a title="" href="#"><img width="250" height="161" alt=""
                                                                              src=""></a>

                                                </figure>

                                                <div class="details">

                                                    <div class="details-header">


                                                        <h4 class="box-title">Accomodation</h4>

                                                    </div>

                                                    <p><?php echo $dest[0]['acco']; ?></p>


                                                </div>

                                            </article>

                                        <?php } ?>

                                        <?php if ($dest[0]['food']) { ?>

                                            <article class="box">

                                                <figure>

                                                    <a title="" href="#"><img width="250" height="161" alt=""
                                                                              src=""/></a>

                                                </figure>

                                                <div class="details">

                                                    <div class="details-header">


                                                        <h4 class="box-title">Food</h4>

                                                    </div>

                                                    <p><?php echo $dest[0]['food']; ?></p>


                                                </div>

                                            </article>

                                        <?php } ?>

                                        <article class="box">

                                            <figure>


                                                <div class="details">

                                                    <div class="details-header">


                                                        <h4 class="box-title">Place near by</h4>

                                                    </div>

                                                    <p><?php echo $dest[0]['places_nearby']; ?></p>


                                                </div>

                                        </article>

                                    </div> <?php } ?>

                            </div>


                            <div class="tab-pane fade" id="hotel-write-review">

                                <div class="main-rating table-wrapper full-width hidden-table-sms intro">


                                    <div class="table-cell col-sm-8">

                                        <div class="overall-rating">

                                            <h4>Your overall Rating of this property</h4>

                                            <div class="star-rating clearfix">

                                                <div class="five-stars-container">
                                                    <div class="five-stars" style="width: 80%;"></div>
                                                </div>

                                                <span class="status">VERY GOOD</span>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                                <form class="review-form">

                                    <div class="form-group col-md-5 no-float no-padding">

                                        <h4 class="title">Title of your review</h4>

                                        <input type="text" name="review-title" class="input-text full-width" value=""
                                               placeholder="enter a review title"/>

                                    </div>

                                    <div class="form-group">

                                        <h4 class="title">Your review</h4>

                                        <textarea class="input-text full-width"
                                                  placeholder="enter your review (minimum 200 characters)"
                                                  rows="5"></textarea>

                                    </div>

                                    <div class="form-group">

                                        <h4 class="title">What sort of Trip was this?</h4>

                                        <ul class="sort-trip clearfix">

                                            <li><a href="#"><i class="soap-icon-businessbag circle"></i></a><span>Business</span>
                                            </li>

                                            <li><a href="#"><i
                                                        class="soap-icon-couples circle"></i></a><span>Couples</span>
                                            </li>

                                            <li><a href="#"><i
                                                        class="soap-icon-family circle"></i></a><span>Family</span></li>

                                            <li><a href="#"><i
                                                        class="soap-icon-friends circle"></i></a><span>Friends</span>
                                            </li>

                                            <li><a href="#"><i class="soap-icon-user circle"></i></a><span>Solo</span>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="form-group col-md-5 no-float no-padding">

                                        <h4 class="title">When did you travel?</h4>

                                        <div class="selector">

                                            <select class="full-width">

                                                <option value="2014-6">June 2014</option>

                                                <option value="2014-7">July 2014</option>

                                                <option value="2014-8">August 2014</option>

                                                <option value="2014-9">September 2014</option>

                                                <option value="2014-10">October 2014</option>

                                                <option value="2014-11">November 2014</option>

                                                <option value="2014-12">December 2014</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <h4 class="title">Add a tip to help travelers choose a good room</h4>

                                        <textarea class="input-text full-width" rows="3"
                                                  placeholder="write something here"></textarea>

                                    </div>

                                    <div class="form-group col-md-5 no-float no-padding">

                                        <h4 class="title">Do you have photos to share?
                                            <small>(Optional)</small>
                                        </h4>

                                        <div class="fileinput full-width">

                                            <input type="file" class="input-text" data-placeholder="select image/s"/>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <h4 class="title">Share with friends
                                            <small>(Optional)</small>
                                        </h4>

                                        <p>Share your review with your friends on different social media networks.</p>

                                        <ul class="social-icons icon-circle clearfix">

                                            <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i
                                                        class="soap-icon-twitter"></i></a></li>

                                            <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i
                                                        class="soap-icon-facebook"></i></a></li>

                                            <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i
                                                        class="soap-icon-googleplus"></i></a></li>

                                            <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i
                                                        class="soap-icon-pinterest"></i></a></li>

                                        </ul>

                                    </div>

                                    <div class="form-group col-md-5 no-float no-padding no-margin">

                                        <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>

                                    </div>

                                </form>


                            </div>

                        </div>


                    </div>

                </div>


                <div class="sidebar col-md-3">

                    <article class="detailed-logo">


                        <div class="details">

                            <h2 class="box-title"><?php echo $detail[0]['pack_name']; ?>
                                <small></small>
                            </h2>

                                <span class="price clearfix">

                                    <small class="pull-left"><?php echo $detail[0]['nights'] . "Night"; ?>

                                        &nbsp;&nbsp;<?php echo $detail[0]['days'] . "Days"; ?></small>

                                    <span class="pull-right"><?php echo "INR &nbsp;" . $detail[0]['price']; ?></span>

                                </span>

                            <div class="feedback clearfix">

                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip"
                                     data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>

                                <span class="review pull-right">270 reviews</span>

                            </div>


                            <!-- <div class="action-section">
          
                        <button type="button" class="button yellow full-width uppercase btn-small" data-toggle="modal" data-target="#myModal" id="<?php //echo $detail[0]['pack_id'];?>" >Book Now</button>

                        <a href="<?php //echo base_url()."index.php/package/package_booking/".$detail[0]['pack_id'];?>" title="" class="button yellow full-width uppercase btn-small" id="<?php //echo $detail[0]['pack_id'];?>">
                       

                      	 BOOK NOW

                      </a>

                    </div> -->

                            <br/>


                            <!--<div class="action-section">

                              <a href="hotel-booking.html" title="" class="button yellow full-width uppercase btn-small">

                                  Customize Package

                              </a>

                            </div>-->

                        </div>

                    </article>

                    <div class="travelo-box contact-box">

                        <h4>Need kpholidays Help?</h4>

                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help
                            you.</p>

                        <address class="contact-details">

                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>

                            <br>

                            <a class="contact-email" href="#">help@travelo.com</a>

                        </address>

                    </div>

                    <div class="travelo-box">

                        <h4>Similar Listings</h4>

                        <?php $pack_list = $this->pack_model->similer_pack($detail[0]['city']); ?>

                        <div class="image-box style14">

                            <?php foreach ($pack_list as $list) { ?>

                                <article class="box">

                                    <figure>

                                        <a href="#"><img
                                                src="<?php echo base_url('upload/package/' . $list['image_1']); ?>"
                                                alt="" class="img-responsive"/></a>

                                    </figure>

                                    <div class="details">

                                        <h5 class="box-title"><a href="#"><?php echo $list['pack_name']; ?></a></h5>

                                        <label class="price-wrapper">

                                            <span
                                                class="price-per-unit"><?php echo "INR" . $list['price']; ?></span><?php echo $list['nights'] . "Nights";
                                            echo $list['days'] . "Days"; ?>

                                        </label>

                                    </div>

                                    <div>


                                        <a class="button btn-small full-width text-center" title=""

                                           href="<?php echo base_url('index.php/package/package_view/' . $list['pack_id']); ?>">Select

                                        </a>

                                    </div>

                                </article>

                            <?php } ?>


                        </div>

                    </div>


                </div>

            </div>


        </div>

    </section>


    <!--footer bar open -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 style="color:#428BCA;" class="modal-title" id="myModalLabel">
                        <div class="BookOnlineHeader"><strong>Sign in now to Book Online</strong></div>
                        <!--BookOnlineHeader--></h2>
                    <a href=""></a></div>
                <div class="modal-body">
                    <div>
                        <div>
                            <input type="text" class="form-control" required id="boxemial" name="boxemial"
                                   placeholder="Email">
                        </div>
                        <p>Your booking details will be sent to this email address.</p>
                        <div class="checkbox disabled">
                            <label>
                                <input type="checkbox"
                                       onChange="jQuery('#haveaccount').toggleClass('hidden','show');jQuery('#signupdiv').toggleClass('hidden','show');"
                                       value="haveaccoutn">
                                I have a kpholidays Account. </label>
                        </div>
                        <div class="hidden" id="haveaccount">
                            <div>
                                <input type="password" class="form-control" required id="boxpassword" name="boxpassword"
                                       placeholder="Password">
                            </div>
                            <p>Forgot Password?</p>
                            <div class="Proceed-to-Book">
                                <button id="loginbtn" class="btn btn-danger">Proceed to Book</button>
                            </div>
                            <!--Proceed-to-Book-->
                        </div>
                        <div id="signupdiv" class="show">
                            <div>
                                <input type="text" class="form-control" required id="boxPhone" name="boxPhone"
                                       placeholder="Enter phone number">
                            </div>
                            <p>We'll use this number to send possible updaye alerts.</p>
                            <div class="Proceed-to-Book">
                                <button id="signuup" class="btn btn-danger">Proceed to Book</button>
                            </div>
                            <!--Proceed-to-Book-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#loginbtn").click(function () {


                var boxpassword = jQuery("#boxpassword").val();
                var boxemial = jQuery("#boxemial").val();
                if (boxemial == '') {
                    jQuery("#boxemial").focus();
                    alert('Please insert email');
                    return false;
                }
                if (boxpassword == '') {
                    jQuery("#boxpassword").focus();
                    alert('Please insert password');
                    return false;
                }
                jQuery('.bs-example-modal-sm').modal('show');
                jQuery.ajax({
                    type: "post",
                    url: "<?php echo base_url('index.php/home/checkLogin');?>",
                    data: {boxemial: boxemial, boxpassword: boxpassword},
                    success: function (data) {

                        if (data == 'false') {
                            jQuery('.bs-example-modal-sm').modal('hide');
                            alert("Invalid email or password");
                        } else {
                            updateTicketselection()
                        }

                    }
                });
            });

            jQuery("#signuup").click(function () {

                jQuery('.bs-example-modal-sm').modal('show');
                var boxemial = jQuery("#boxemial").val();
                var boxPhone = jQuery("#boxPhone").val();
                jQuery.ajax({
                    type: "post",
                    url: "<?php echo base_url('index.php/home/registerUser');?>",
                    data: {boxemial: boxemial, boxPhone: boxPhone},
                    success: function (data) {

                        var obj = jQuery.parseJSON(data);
                        if (obj.error) {
                            jQuery('.bs-example-modal-sm').modal('hide');
                            alert(obj.msg);
                            return false;
                        }
                        updateTicketselection()
                    }
                });
            });
        });
    </script>

    <?php include 'footer.php'; ?>

    <!--footer bar Close -->


</div>


<!-- Javascript -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js'); ?>"></script>


<!-- Twitter Bootstrap -->

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>


<!-- load revolution slider scripts -->

<script type="text/javascript"
        src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js'); ?>">

</script>

<script type="text/javascript"
        src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js'); ?>"></script>


<!-- load BXSlider scripts -->

<script type="text/javascript"
        src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js'); ?>"></script>


<!-- Flex Slider -->

<script type="text/javascript"
        src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js'); ?>"></script>


<!-- parallax -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js'); ?>"></script>


<!-- parallax -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js'); ?>"></script>


<!-- waypoint -->

<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>


<!-- load page Javascript -->

<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>


<!-- Google Map Api -->

<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>


<script type="text/javascript" src="<?php echo base_url('assets/js/calendar.js'); ?>"></script>


<!-- parallax -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js'); ?>"></script>


<!-- waypoint -->

<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>


<!-- load page Javascript -->

<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js'); ?>"></script>


<script type="text/javascript">

    tjq(document).ready(function () {

        // calendar panel

        var cal = new Calendar();

        var unavailable_days = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];

        var price_arr = {
            3: '$170',
            4: '$170',
            5: '$170',
            6: '$170',
            7: '$170',
            8: '$170',
            9: '$170',
            10: '$170',
            11: '$170',
            12: '$170',
            13: '$170',
            14: '$170',
            15: '$170',
            16: '$170',
            17: '$170'
        };


        var current_date = new Date();

        var current_year_month = (1900 + current_date.getYear()) + "-" + (current_date.getMonth() + 1);

        tjq("#select-month").find("[value='" + current_year_month + "']").prop("selected", "selected");

        cal.generateHTML(current_date.getMonth(), (1900 + current_date.getYear()), unavailable_days, price_arr);

        tjq(".calendar").html(cal.getHTML());


        tjq("#select-month").change(function () {

            var selected_year_month = tjq("#select-month option:selected").val();

            var year = parseInt(selected_year_month.split("-")[0], 10);

            var month = parseInt(selected_year_month.split("-")[1], 10);

            cal.generateHTML(month - 1, year, unavailable_days, price_arr);

            tjq(".calendar").html(cal.getHTML());

        });


        tjq(".goto-writereview-pane").click(function (e) {

            e.preventDefault();

            tjq('#hotel-features .tabs a[href="#hotel-write-review"]').tab('show')

        });


        // editable rating

        tjq(".editable-rating.five-stars-container").each(function () {

            var oringnal_value = tjq(this).data("original-stars");

            if (typeof oringnal_value == "undefined") {

                oringnal_value = 0;

            } else {

                //oringnal_value = 10 * parseInt(oringnal_value);

            }

            tjq(this).slider({

                range: "min",

                value: oringnal_value,

                min: 0,

                max: 5,

                slide: function (event, ui) {


                }

            });

        });

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

    var fenway = new google.maps.LatLng(48.855702, 2.292577);

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

</body>

</html>



