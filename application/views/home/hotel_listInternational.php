<?php
//print_r($hotel_data);
$len = @count($hotel_data['soapBody']['SearchHotelsResponse']['SearchHotelsResult']['SearchDetails']['Search']['HotelList']['Hotel']);
$Searchid = @$hotel_data['soapBody']['SearchHotelsResponse']['SearchHotelsResult']['SearchDetails']['Search']['@attributes']['Searchid'];
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="active">Hotel Search</li>
    </ul>
    <?php echo $this->session->flashdata('msg'); ?>
    <h3 class="booking-title"><?php echo($len > 0) ? $len : '0'; ?> hotels in <?= $hotel_city; ?> on <?= $hotel_checkin; ?> - <?= $hotel_checkout; ?> for <?= $hotel_adults ?> adult<?php echo ($hotel_adults > 1) ? 's' : ''; ?></h3>
    <div class="row">
        <div class="col-md-3">
            <form class="booking-item-dates-change mb30" action="<?php echo site_url('hotel/hotel_list'); ?>" method="POST">
                <label>
                    <input type="radio"  checked="checked" name="hotel_mode"   value="Domestic"  id="hotel_domestic" class="R"  
                           <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'Domestic') ? "checked='checked'" : " " ) : " " ?>/>Domestic</label>
                <label>
                    <input type="radio" name="hotel_mode"    class="way" id="hotel_internationl"  value="International"  <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'International') ? "checked='checked'" : " " ) : " " ?>>International</label>
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>Where</label>
                    <span class="twitter-typeahead" style="position: relative; display: block; direction: ltr;"><input id="hotel_city" name="city" class="typeahead form-control tt-input" placeholder="City, Airport, Point of Interest, Hotel Name or U.S. Zip Code" value="<?php echo (set_value('city') == True) ? set_value('city') : " " ?>" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;" dir="auto" type="text" /><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Open Sans,Tahoma,Arial,helvetica,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;"><div class="tt-dataset-0"></div></span></span>
                </div>
                <div class="input-daterange">
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                        <label>Check in</label>
                        <input class="form-control check-in" name="checkin" value="<?php echo (set_value('checkin') == TRUE) ? set_value('checkin') : ''; ?>" type="text">
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                        <label>Check out</label>
                        <input class="form-control check-out" id="checkout" name="checkout" value="<?php echo (set_value('checkout') == TRUE) ? set_value('checkout') : ''; ?>" type="text">
                    </div>
                </div>
                <div class="form-group form-group- form-group-select-plus">
                    <label>Guests</label>
                    <select name="adults" required="required" class="form-control">
                        <option value="1" <?php echo (set_value('adults') == '1') ? 'selected' : ''; ?>>01</option>
                        <option value="2" <?php echo (set_value('adults') == '2') ? 'selected' : ''; ?>>02</option>
                        <option value="3" <?php echo (set_value('adults') == '3') ? 'selected' : ''; ?>>03</option>
                        <option value="4" <?php echo (set_value('adults') == '4') ? 'selected' : ''; ?>>04</option>
                        <option value="5" <?php echo (set_value('adults') == '5') ? 'selected' : ''; ?>>05</option>
                        <option value="6" <?php echo (set_value('adults') == '6') ? 'selected' : ''; ?>>06</option>
                        <option value="7" <?php echo (set_value('adults') == '7') ? 'selected' : ''; ?>>07</option>
                        <option value="8" <?php echo (set_value('adults') == '8') ? 'selected' : ''; ?>>08</option>
                        <option value="9" <?php echo (set_value('adults') == '9') ? 'selected' : ''; ?>>09</option>
                        <option value="10" <?php echo (set_value('adults') == '10') ? 'selected' : ''; ?>>10</option>
                        <option value="11" <?php echo (set_value('adults') == '11') ? 'selected' : ''; ?>>11</option>
                        <option value="12" <?php echo (set_value('adults') == '12') ? 'selected' : ''; ?>>12</option>
                        <option value="13" <?php echo (set_value('adults') == '13') ? 'selected' : ''; ?>>13</option>
                        <option value="14" <?php echo (set_value('adults') == '14') ? 'selected' : ''; ?>>14</option>
                    </select>
                </div>
                <div class="form-group form-group-select-plus">
                    <label>Rooms</label>
                    <select name="rooms" required="required" class="form-control">
                        <option value="1" <?php echo (set_value('rooms') == '1') ? 'selected' : ''; ?> >01</option>
                        <option value="2" <?php echo (set_value('rooms') == '2') ? 'selected' : ''; ?> >02</option>
                        <option value="3" <?php echo (set_value('rooms') == '3') ? 'selected' : ''; ?> >03</option>
                        <option value="4" <?php echo (set_value('rooms') == '4') ? 'selected' : ''; ?> >04</option>
                        <option value="5" <?php echo (set_value('rooms') == '5') ? 'selected' : ''; ?> >05</option>
                        <option value="6" <?php echo (set_value('rooms') == '6') ? 'selected' : ''; ?> >06</option>
                        <option value="7" <?php echo (set_value('rooms') == '7') ? 'selected' : ''; ?> >07</option>
                        <option value="8" <?php echo (set_value('rooms') == '8') ? 'selected' : ''; ?> >08</option>
                        <option value="9" <?php echo (set_value('rooms') == '9') ? 'selected' : ''; ?> >09</option>
                        <option value="10" <?php echo (set_value('rooms') == '10') ? 'selected' : ''; ?> >10</option>
                        <option value="11" <?php echo (set_value('rooms') == '11') ? 'selected' : ''; ?> >11</option>
                        <option value="12" <?php echo (set_value('rooms') == '12') ? 'selected' : ''; ?> >12</option>
                        <option value="13" <?php echo (set_value('rooms') == '13') ? 'selected' : ''; ?> >13</option>
                        <option value="14" <?php echo (set_value('rooms') == '14') ? 'selected' : ''; ?> >14</option>
                    </select>
                </div>
                <div class="form-group form-group-lg form-group-select-plus">
                    <label>Kids(2-11)</label>
                    <select name="kids" class="form-control">
                        <option value="0" <?php echo (set_value('kids') == '0') ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo (set_value('kids') == '1') ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo (set_value('kids') == '2') ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo (set_value('kids') == '3') ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo (set_value('kids') == '4') ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo (set_value('kids') == '5') ? 'selected' : ''; ?>>5</option>
                        <option value="6" <?php echo (set_value('kids') == '6') ? 'selected' : ''; ?>>6</option>
                        <option value="7" <?php echo (set_value('kids') == '7') ? 'selected' : ''; ?>>7</option>
                        <option value="8" <?php echo (set_value('kids') == '8') ? 'selected' : ''; ?>>8</option>
                        <option value="9" <?php echo (set_value('kids') == '9') ? 'selected' : ''; ?>>9</option>
                        <option value="10" <?php echo (set_value('kids') == '10') ? 'selected' : ''; ?>>10</option>
                    </select>
                </div>
                <input class="btn btn-primary" value="Upadte Search" type="submit">
            </form>

        </div>
        <div class="col-md-9">
            <div class="nav-drop booking-sort">
                <h5 class="booking-sort-title"><a href="#">Sort: Aviability<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a></h5>
                <ul class="nav-drop-menu">
                    <li><a href="#">Price (low to high)</a></li>
                    <li><a href="#">Price (hight to low)</a></li>
                    <li><a href="#">Ranking</a></li>
                    <li><a href="#">Distance</a></li>
                    <li><a href="#">Number of Reviews</a></li>
                </ul>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php
            // If responsive Sattus is then will show flight list if 0 no flight will be available go in  elsepart                       
            //this loop will view Show the no. of flight list   
            if ($len > 0) {
                ?>
                <ul class="booking-list">
                    <?php
                    $similar = array();
                    $thotel_data = $hotel_data['soapBody']['SearchHotelsResponse']['SearchHotelsResult']['SearchDetails']['Search']['HotelList']['Hotel'];
                    if (empty($thotel_data[0])) {
                        $thotel_data = array();
                        $thotel_data[0] = $hotel_data['soapBody']['SearchHotelsResponse']['SearchHotelsResult']['SearchDetails']['Search']['HotelList']['Hotel'];
                    }
                    foreach ($thotel_data as $key => $hotel) {
                        $attributes = (isset($hotel['@attributes'])) ? $hotel['@attributes'] : $hotel;
                        $similar[] = $hotel;
                        $hotel['Searchid'] = $Searchid;
                        $this->session->set_userdata('Hotel_' . $attributes['Hotelid'], $hotel);
                        ?>
                        <li>
                            <a class="booking-item" href="<?php echo site_url('hotel/hotel_detailedIntl/' . $attributes['Providerid'] . '/' . $attributes['Hotelid']); ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="booking-item-img-wrap">
                                            <img src="<?php echo ($attributes['HotelImage'] != '' and ( @getimagesize(trim(str_replace("\\", "/", $attributes['HotelImage']))) !== false)) ? str_replace("\\", "/", $attributes['HotelImage']) : 'http://placehold.it/270x160'; ?>" alt="<?php echo $attributes['HotelName'] ?> Image" title="<?php echo $attributes['HotelName'] ?> Image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="booking-item-title"><?php echo $attributes['HotelName'] ?></h5>
                                        <p class="booking-item-address"><i class="fa fa-map-marker"></i> <?php echo (!is_array($attributes['HotelLocation'])) ? $attributes['HotelLocation'] : ''; ?><?php echo (!is_array($attributes['HotelLocation'])) ? $attributes['HotelLocation'] . ',' : ''; ?><?php echo $attributes['HotelCity'] ?></p>
                                        <div class="amenities">
                                            <div>
                                                <?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $attributes['Starrating']) {
                                                        ?>
                                                        <div class="one2-stars-g-container"></div>
                                                    <?php } else { ?>
                                                        <div class="one2-stars-container"></div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <p><?= $attributes['HotelDesc'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><span class="booking-item-price-from">Avg</span>
                                        <span class="booking-item-price" style="font-size:28px;"><i class="fa fa-inr"></i> <?php echo $attributes['GIAvgAmount']; ?></span> <span class="btn btn-primary"> Book Now</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    $this->session->set_userdata('similar', $similar);
                    ?>
                </ul>
            <?php } else { ?>
                <h3 align="center">Sorry Hotel is not available on this city !</h3>
            <?php } ?>
        </div>
    </div>
    <div class="gap"></div>

</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <img src="<?php echo base_url(); ?>image/preloader.gif  bs-example-modal-smr.gif">

        </div>

    </div>



</div>
<script>
    //Finding the fare Rule and Tax  Details                   
    var currentlselection = "";
    $(window).load(function(){$("#checkout").removeAttr('disabled');});
    $(document).ready(function () {
    
        $("#checkout").removeAttr('disabled');

        $("#hotel_city").autocomplete({
            source: function (request, response) {
                //console.log($('#Domestic2').is(':checked'));
                $.ajax({
                    url: "<?php echo base_url('index.php/hotel/get_city'); ?>",
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

        $(".farerule").click(function ()
        {
            var fare = $(this).attr('id');
            datat = $("#div_" + fare).html();
            var fare = JSON.parse(datat);
            $.ajax({

                type: "post",
                url: "<?php echo base_url('index.php/flight/internal_tax_fare'); ?>",
                data: {value: fare},
                beforeSend: function () {


                },
                success: function (data)
                {
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
                url: "<?php echo base_url('index.php/flight/International_OnewayBooking'); ?>",
                data: {value: booking_data},
                success: function (data)
                {
                    alert(data);
                    window.location.href = '<?php echo base_url('index.php/flight/InternationalBookingRespons'); ?>';
                }
            });
        });

    });
</script>


<script type="text/javascript">
    var minprice = "";
    var maxprice = "";
    var currentStar = 0;
    jQuery(document).ready(function () {
        sorByContent('price', $('.sort-by-price>a'));
        minprice = $('.hotel-list>article .info').data('price');
        maxprice = ($('.hotel-list>article').last().find('.info').data('price') + 1000);
        jQuery("#price-range").slider({
            range: true,
            min: minprice,
            max: maxprice,
            values: [minprice, maxprice],
            slide: function (event, ui) {
                jQuery(".min-price-label").html("Rs " + ui.values[ 0 ]);
                jQuery(".max-price-label").html("Rs " + ui.values[ 1 ]);
            },
            change: function (event, ui) {
                minprice = ui.values[ 0 ];
                maxprice = ui.values[ 1 ];
                globalSearch();
            }
        });
        jQuery(".min-price-label").html("Rs " + jQuery("#price-range").slider("values", 0));
        jQuery(".max-price-label").html("Rs " + jQuery("#price-range").slider("values", 1));



    });

    function onpenSignup(Providerid) {
        currentlselection = Providerid;
        $('#signupModal').modal('show');
    }

    $("#loginbtn").click(function () {


        var boxpassword = $("#boxpassword").val();
        var boxemial = $("#boxemial").val();
        if (boxemial == '') {
            $("#boxemial").focus();
            alert('Please insert email');
            return false;
        }
        if (boxpassword == '') {
            $("#boxpassword").focus();
            alert('Please insert password');
            return false;
        }
        $('.bs-example-modal-sm').modal('show');
        $.ajax({
            type: "post",
            url: "<?php echo base_url('index.php/home/checkLogin'); ?>",
            data: {boxemial: boxemial, boxpassword: boxpassword},
            success: function (data)
            {

                if (data == 'false') {
                    $('.bs-example-modal-sm').modal('hide');
                    alert("Invalid email or password");
                } else {
                    updateTicketselection()
                }

            }
        });
    });

    $("#signuup").click(function () {

        $('.bs-example-modal-sm').modal('show');
        var boxemial = $("#boxemial").val();
        var boxPhone = $("#boxPhone").val();
        $.ajax({
            type: "post",
            url: "<?php echo base_url('index.php/home/registerUser'); ?>",
            data: {boxemial: boxemial, boxPhone: boxPhone},
            success: function (data)
            {

                var obj = jQuery.parseJSON(data);
                if (obj.error) {
                    $('.bs-example-modal-sm').modal('hide');
                    alert(obj.msg);
                    return false;
                }
                updateTicketselection()
            }
        });
    });


    function updateTicketselection() {

        window.location.href = '<?php echo base_url('index.php/hotel/hotel_detailedIntl'); ?>/' + currentlselection;

    }

    function globalSearch() {
        var resultfound = 0;
        $('.hotel-list article').each(function (index, element) {
            //console.log(serachByAmenities($(this)));    
            if (searchbyPrice($(this))) {
                if (searchbyStars($(this))) {
                    $(this).fadeIn();
                    resultfound = resultfound + 1;
                } else {
                    $(this).fadeOut();
                }
            } else {
                $(this).fadeOut();
            }
        });
        $('#resultfound').html(resultfound);
    }

    function searchbyPrice(obj) {
        if ($(obj).find('.info').data('price') >= minprice && $(obj).find('.info').data('price') <= maxprice) {
            return 1;
        } else {
            return 0;
        }

    }
    function searchbyStars(obj) {
        //console.log(currentStar);
        if ($(obj).find('.info').data('rating') == currentStar || currentStar == 0) {
            return 1;
        } else {
            return 0;
        }

    }

    $('.starlist').on('click', function () {
        currentStar = $(this).find('.hidden').html();
        if ($(this).hasClass('one-stars-g-container')) {
            if ($(this).hasClass('sfirst'))
                currentStar = 0;
        }
        $('.starlist').each(function (index, element) {

            star = $(this).find('.hidden').html();
            if (star <= currentStar) {
                $(this).removeClass('one-stars-g-container');
                $(this).addClass('one-stars-g-container', 'one-stars-container');
            } else {
                $(this).removeClass('one-stars-g-container');
                $(this).addClass('one-stars-container');
            }
        });
        globalSearch();
    });

    function sorByContent(byname, obj) {
        $('.sort-bar li').removeClass('active');
        obj.parent().addClass('active');
        var mylist = $('.hotel-list');
        var listitems = mylist.children('article').get();

        listitems.sort(function (a, b) {
            if (byname == 'rating' || byname == 'price') {
                var a = $(a).find('.info').data(byname);
                var b = $(b).find('.info').data(byname);
                if (byname == 'rating')
                    return (a > b) ? -1 : (a < b) ? 1 : 0;
                else
                    return (a < b) ? -1 : (a > b) ? 1 : 0;
            } else {
                return $(a).find('.box-title').html().toUpperCase().localeCompare($(b).find('.box-title').html().toUpperCase());
            }
        });

        $.each(listitems, function (index, item) {
            mylist.append(item);
        });

    }
</script>