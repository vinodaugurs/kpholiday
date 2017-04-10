<?php
/* if (!isset($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'][0])) {
  $tdata = @$hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'];
  unset($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails']);
  $hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'] = array($tdata);
  } */
$len = @count($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails']);
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
</style>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="active">Hotel Search</li>
    </ul>
    <?php echo $this->session->flashdata('msg'); ?>
    <h3 class="booking-title">
        <?php echo ($len > 0) ? $len : '0'; ?> hotels in <?= $hotel_city; ?>
        on <?= $hotel_checkin; ?> - <?= $hotel_checkout; ?> for <?= $hotel_adults ?>
        adult<?php echo ($hotel_adults > 1) ? 's' : ''; ?>
    </h3>
    <div class="row">
        <div class="col-md-3">
            <form class="booking-item-dates-change mb30" action="<?= base_url('index.php/hotel/hotel_list'); ?>"  method="POST">
                <label><input type="radio" checked="checked" name="hotel_mode" value="Domestic" id="hotel_domestic" class="R" <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'Domestic') ? "checked='checked'" : " ") : " " ?>/>Domestic</label>
                <label><input type="radio" name="hotel_mode" class="way" id="hotel_internationl" value="International" <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'International') ? "checked='checked'" : " ") : " " ?>>International</label>
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>Where</label>
                    <span class="twitter-typeahead" style="position: relative; display: block; direction: ltr;">
                        <input id="hotel_city" name="city" class="typeahead form-control tt-input" placeholder="City, Airport, Point of Interest, Hotel Name or U.S. Zip Code" value="<?php echo (set_value('city') == True) ? set_value('city') : " " ?>" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;" dir="auto" type="text"/>
                        <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Open Sans,Tahoma,Arial,helvetica,sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>
                        <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                            <div class="tt-dataset-0"></div>
                        </span>
                    </span>
                </div>
                <div class="input-daterange">
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i><label>Check in</label>
                        <input class="form-control check-in" name="checkin" value="<?php echo (set_value('checkin') == TRUE) ? set_value('checkin') : ''; ?>" type="text">
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                        <label>Check out</label>
                        <input class="form-control check-out" name="checkout" id="checkout" value="<?php echo (set_value('checkout') == TRUE) ? set_value('checkout') : ''; ?>" type="text">
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
                <input class="btn btn-primary" value="Update Search" type="submit">
            </form>
            <!--
            <aside class="booking-filters booking-filters-white">
                <h3>Filter By:</h3>
                <ul class="list booking-filters-list">
                    <li>
                        <h5 class="booking-filters-title">Price</h5>
                        <input type="text" id="price-slider">
                    </li>
                    <li>
                        <h5 class="booking-filters-title">Star Rating</h5>
                        <div class="checkbox"><label><input class="i-check starlist" type="checkbox" />5 star (220)</label></div>
                        <div class="checkbox"><label><input class="i-check starlist" type="checkbox" />4 star (112)</label></div>
                        <div class="checkbox"><label><input class="i-check starlist" type="checkbox" />3 star (75)</label></div>
                        <div class="checkbox"><label><input class="i-check starlist" type="checkbox" />2 star (60)</label></div>
                        <div class="checkbox"><label><input class="i-check starlist" type="checkbox" />1 star (20)</label></div>
                    </li>
                    <li>
                        <h5 class="booking-filters-title">Facility</h5>
                        <div class="checkbox"><label><input class="i-check" type="checkbox" />Wi-Fi (55)</label></div>
                        <div class="checkbox"><label><input class="i-check" type="checkbox" />Parking (264)</label></div>
                        <div class="checkbox"><label><input class="i-check" type="checkbox" />Airport Shuttle (137)</label></div>
                        <div class="checkbox"><label><input class="i-check" type="checkbox" />Fitness Center (15)</label></div>
                        <div class="checkbox"><label><input class="i-check" type="checkbox" />Non-Smoking Rooms (20)</label></div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" />Indoor Pool (20)</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" />Spa (20)</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" />Family Rooms (20)</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" />Pet Friendly (20)</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" />Restaurant (20)</label>
                        </div>
                    </li>                    
                </ul>
            </aside>
            -->
        </div>
        <div class="col-md-9">
            <div class="nav-drop booking-sort">
                <h5 class="booking-sort-title"><a href="#">Sort: Availability<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a></h5>
                <ul class="nav-drop-menu">
                    <li class="sort-by-name"><a onClick="sorByContent('name', $(this));" class="sort-by-container" href="javascript:;"><span>name</span></a></li>
                    <li class="sort-by-price active"><a onClick="sorByContent('price', $(this));" class="sort-by-container" href="javascript:;"><span>price</span></a></li>
                    <li class="clearer visible-sms"></li>
                    <li class="sort-by-rating "><a  onClick="sorByContent('rating', $(this));" class="sort-by-container" href="javascript:;"><span>rating</span></a></li>
                </ul>
            </div>
            <?php
            //this loop will view Show the no. of flight list
            if ($len > 0 && isset($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['Rate']['LowRate']) && ($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['Rate']['LowRate'] != 0)) {
                ?>
                <ul class="booking-list hotel">
                    <?php
                    $similar = array();
                    if (!isset($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'][0])) {
                        $tdata = $hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'];
                        unset($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails']);
                        $hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'] = array($tdata);
                    }


                    foreach ($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'] as $key => $hotel) {

                        $this->session->set_userdata('Hotel_' . $hotel['HotelId'], $hotel);
                        $similar[] = $hotel;
                        $FacilityId = array();
                        if (isset($hotel['FacilityId']) and $hotel['FacilityId'] != 0) {
                            if (isset($hotel['FacilityId']['Facilities'][0])) {
                                foreach ($hotel['FacilityId']['Facilities'] as $Facilities) {
                                    $FacilityId[] = trim($Facilities['FacilityName']);
                                }
                            } else {
                                $FacilityId[$hotel['FacilityId']['Facilities']['Facility']] = trim($hotel['FacilityId']['Facilities']['FacilityName']);
                            }
                        }
                        ?>
                        <li>
                            <a class="booking-item" href="<?php echo site_url('hotel/hotel_detailed/' . $hotel['Providerid'] . '/' . $hotel['HotelId']); ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="booking-item-img-wrap">
                                            <?php if($hotel["HotelName"]=="Gemini Inn"){ ?>
                                            <img src="<?php echo (!empty($hotel['HotelImages']) && @getimagesize($hotel['HotelImages']) !== false) ? $hotel['HotelImages'] : 'http://placehold.it/230x160'; ?>" alt="<?php echo $hotel['HotelName'] ?> Image" title="<?php echo $hotel['HotelName'] ?> Image">
                                            <?php } else { ?>
                                            <img src="<?php echo (($hotel['HotelImages']) !== false) ? str_replace("\\", "/", $hotel['HotelImages']) : 'http://placehold.it/270x160'; ?>" alt="<?php echo $hotel['HotelName'] ?> Image" title="<?php echo $hotel['HotelName'] ?> Image">
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="details col-md-6 info" data-price="<?php echo round(($hotel['LowRate'] + $hotel['Highrate']) / 2, 2); ?>" data-rating="<?php echo $hotel['StarCategoryId']; ?>">
                                        <h5 class="booking-item-title"><?php echo $hotel['HotelName'] ?></h5>
                                        <p class="booking-item-address"><i class="fa fa-map-marker"></i> <?php echo (!is_array($hotel['Location'])) ? $hotel['Location'] . ',' : ''; ?><?php echo $hotel['CityDesc'] ?></p>
                                        <div class="amenities">
                                            <?php
                                            if (isset($hotel['FacilityId']['Facilities']) and array_key_exists(0, $hotel['FacilityId']['Facilities'])) {
                                                foreach ($hotel['FacilityId']['Facilities'] as $Facilities) {
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
                                            } else {
                                                ?>

                                                <?php if (@$hotel['FacilityId']['Facilities']['Facility'] == 1) { ?>
                                                    <i class="soap-icon-wifi circle"></i>
                                                <?php } elseif (@$$hotel['FacilityId']['Facilities']['Facility'] == 2) { ?>
                                                    <i class="soap-icon-fork circle"></i>
                                                    <?php
                                                } else {
                                                    echo @$$hotel['FacilityId']['Facilities']['FacilityName'] . ',';
                                                }
                                                ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="booking-item-price-from">from</span>
                                        <span class="booking-item-price" style="font-size:28px;"><i class="fa fa-inr"></i> <?=round(($hotel['LowRate'] + $hotel['Highrate']) / 2); ?></span>
                                        <span class="btn btn-primary clickme">Book Now</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    $this->session->set_userdata('similar', $similar);
                    ?>
                </ul>
            <?php } else {
                ?>
                <h3 align="center">Sorry Hotel is not available on this city !</h3>
            <?php } ?>
        </div>
    </div>
    <div class="gap"></div>
</div>
<script>
    //Finding the fare Rule and Tax  Details
    var currentlselection = "";
    var currentStar = 0;
    $(window).load(function(){$("#checkout").removeAttr('disabled');});
    $(document).ready(function () {
    
        $("#checkout").removeAttr('disabled');
        // autocomplete
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


    });
    function updateTicketselection() {
        window.location.href = '<?php echo base_url('index.php/hotel/hotel_detailed'); ?>/' + currentlselection;
    }
</script>


<script type="text/javascript">
    var minprice = "";
    var maxprice = "";
    jQuery(document).ready(function () {
        sortUsingNestedText($('.hotel'), '.box', '.info');
        minprice = $('.hotel-list>article .details').data('price');
        maxprice = ($('.hotel-list>article .details').last().data('price') + 1000);
        jQuery("#price-range").slider({
            range: true,
            min: $('.hotel-list>article .details').data('price'),
            max: ($('.hotel-list>article .details').last().data('price') + 1000),
            values: [$('.hotel-list>article .details').data('price'), $('.hotel-list>article .details').last().data('price') + 1000],
            slide: function (event, ui) {
                jQuery(".min-price-label").html("Rs " + ui.values[0]);
                jQuery(".max-price-label").html("Rs " + ui.values[1]);
            },
            change: function (event, ui) {
                minprice = ui.values[0];
                maxprice = ui.values[1];
                globalSearch();
            }
        });
        jQuery(".min-price-label").html("Rs " + jQuery("#price-range").slider("values", 0));
        jQuery(".max-price-label").html("Rs " + jQuery("#price-range").slider("values", 1));


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


    });
    function sortUsingNestedText(parent, childSelector, keySelector) {
        var items = parent.children(childSelector).sort(function (a, b) {
            var vA = $(keySelector, a).data('price');
            var vB = $(keySelector, b).data('price');
            return (vA < vB) ? -1 : (vA > vB) ? 1 : 0;
        });
        parent.append(items);
    }

    function searchbyPrice(obj) {
        if ($(obj).find('.details').data('price') >= minprice && $(obj).find('.details').data('price') <= maxprice) {
            return 1;
        } else {
            return 0;
        }

    }
    function searchbyStars(obj) {
        //console.log(currentStar);
        if ($(obj).find('.details').data('rating') == currentStar || currentStar == 0) {
            return 1;
        } else {
            return 0;
        }

    }
    function serachByAmenities(obj) {

        var activeFlights = new Array();
        $('.amenities li').each(function (index, element) {
            if ($(this).hasClass('active')) {
                activeFlights.push($(this).find('a').html());
            }
        });
        var value = 1;
        //$('.flight article').each(function(index, element) {
        codeclass = $(obj).find('.Facilities').html();
        codeclass = JSON.parse(codeclass);
        $(activeFlights).each(function (index, element) {
            //console.log(element,codeclass,$.inArray(element,codeclass));
            if ($.inArray(element, codeclass) != -1) {
                //return 0;
            } else {

                value = 0;
            }
        });
        return value;

        // });

    }

    $('.amenities li').on('click', function () {
        globalSearch();
    });
    function globalSearch() {
        var resultfound = 0;
        $('.hotel li').each(function (index, element) {
            //console.log(serachByAmenities($(this)));
            if (searchbyPrice($(this))) {
                if (searchbyStars($(this))) {
                    if (serachByAmenities($(this))) {
                        $(this).fadeIn();
                        resultfound = resultfound + 1;
                    } else {
                        $(this).fadeOut();
                    }
                } else {
                    $(this).fadeOut();
                }
            } else {
                $(this).fadeOut();
            }
        });
        $('#resultfound').html(resultfound);
    }

    function sorByContent(byname, obj) {
        $('.sort-bar li').removeClass('active');
        obj.parent().addClass('active');
        var mylist = $('.hotel');
        var listitems = mylist.children('li').get();

        listitems.sort(function (a, b) {
            if (byname == 'rating' || byname == 'price') {
                var a = $(a).find('.info').data(byname);
                var b = $(b).find('.info').data(byname);
                if (byname == 'rating')
                    return (a > b) ? -1 : (a < b) ? 1 : 0;
                else
                    return (a < b) ? -1 : (a > b) ? 1 : 0;
            } else {
                return $(a).find('.info .booking-item-title').html().toUpperCase().localeCompare($(b).find('.info .booking-item-title').html().toUpperCase());
            }
        });

        $.each(listitems, function (index, item) {
            mylist.append(item);
        });

    }

</script>

