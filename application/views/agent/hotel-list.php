<?php $len = @count($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails']); ?>
<?php $this->load->view('blocks/header'); ?>
<style>
    .form-group label{ font-size:10px;}
    label{ font-size:10px !important;}
    .dropdown a{ background-color:transparent !important;}
</style>
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
<!-- add some file end -->
<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="active">Hotel Search</li>
    </ul>
    <div id="main">
        <div class="row">
            <div class="col-md-12">
                <div class="ModifySearchBox">
                    <div class="tab-pane1 fade1" id="hotels-tab1">
                        <form class="booking-item-dates-change mb40" action="<?php echo base_url('index.php/agent/hotel_list'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio"  checked="checked" name="hotel_mode"  value="Domestic"  id="hotel_domestic" class="R"  
                                                <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'Domestic') ? "checked='checked'" : " " ) : " " ?>/>
                                            Domestic
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="hotel_mode"    class="way" id="hotel_internationl"  value="International"  <?php echo (set_value('hotel_mode') == True) ? ((set_value('hotel_mode') == 'International') ? "checked='checked'" : " " ) : " " ?>>
                                            International
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-group-icon-left">
                                        <label>Your Destination</label>
                                        <input type="text" id="hotel_city" name="city" required class="search form-control" placeholder="Select City, Area or Hotel..."  value="<?php echo (set_value('city') == True) ? set_value('city') : "" ?>"/>
                                    </div>
                                </div>                                

                                <div class="col-md-3">
                                    <div class="input-daterange" data-date-format="MM d, D">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                    <label>Check in</label>
                                                    <input type="text" name="checkin" required class="form-control check-in" placeholder="mm/dd/yy" value="<?php echo (set_value('checkin') == TRUE) ? set_value('checkin') : ''; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                    <label>Check out</label>
                                                    <input type="text" name="checkout" required class="form-control check-out" placeholder="mm/dd/yy" value="<?php echo (set_value('checkout') == TRUE) ? set_value('checkout') : ''; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Rooms</label>
                                            <div class="selector">
                                                <select name="rooms" required="required" class="form-control">
                                                    <option value="1" <?php echo (set_value('rooms') == '1') ? 'selected' : ''; ?> >01</option>
                                                    <option value="2" <?php echo (set_value('rooms') == '2') ? 'selected' : ''; ?> >02</option>
                                                    <option value="3"  <?php echo (set_value('rooms') == '3') ? 'selected' : ''; ?> >03</option>
                                                    <option value="4"  <?php echo (set_value('rooms') == '4') ? 'selected' : ''; ?> >04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Adults(12+)</label>
                                            <div class="selector">
                                                <select name="adults" required="required" class="form-control">
                                                    <option value="1"  <?php echo (set_value('adults') == '1') ? 'selected' : ''; ?>>01</option>
                                                    <option value="2"  <?php echo (set_value('adults') == '2') ? 'selected' : ''; ?> >02</option>
                                                    <option value="3" <?php echo (set_value('adults') == '3') ? 'selected' : ''; ?> >03</option>
                                                    <option value="4"  <?php echo (set_value('adults') == '4') ? 'selected' : ''; ?> >04</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                            <label>Kids(0-11)</label>
                                            <div class="selector">
                                                <select name="kids" class="form-control">
                                                    <option value="0"  <?php echo (set_value('kids') == '1') ? 'selected' : ''; ?> >00</option>
                                                    <option value="1"  <?php echo (set_value('kids') == '1') ? 'selected' : ''; ?> >01</option>
                                                    <option value="2"  <?php echo (set_value('kids') == '2') ? 'selected' : ''; ?> >02</option>
                                                    <option value="3"  <?php echo (set_value('kids') == '3') ? 'selected' : ''; ?> >03</option>
                                                    <option value="4"  <?php echo (set_value('kids') == '4') ? 'selected' : ''; ?> >04</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="hidden-xs">&nbsp;</label>
                                    <button name="hotel" value="search" type="submit" class="form-control animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
        <!--<div class="row"><div class="col-md-12"><h3 class="booking-title"><?=($len > 0) ? $len : '0';?> hotels result found</h3><?php echo $this->session->flashdata('msg'); ?></div></div>-->
        <div class="row">
            <!--
            <div class="col-sm-4 col-md-3">
                <h4 class="search-results-title"><i class="soap-icon-search"></i><b id="resultfound"><?php echo $len ?></b> results found.</h4>
                <div class="toggle-container filters-container">
                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                        </h4>
                        <div id="price-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <div id="price-range"></div>
                                <br />
                                <span class="min-price-label pull-left"></span>
                                <span class="max-price-label pull-right"></span>
                                <div class="clearer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                        </h4>
                        <div id="rating-filter" class="panel-collapse collapse filters-container">
                            <div class="panel-content starcontainer">
                                <div class="one-stars-container sfirst starlist"  style="cursor:pointer;"><span class="hidden">1</span></div>
                                <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">2</span></div>
                                <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">3</span></div>
                                <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">4</span></div>
                                <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">5</span></div>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="panel style1 arrow-right">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                        </h4>
                        <div id="amenities-filter" class="panel-collapse collapse">
                            <div class="panel-content">
                                <ul class="check-square amenities filters-option">
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">Free Wi-Fi</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">Restaurant</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">Swimming pool</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">Internet</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">BusinessCenter</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">Laundry</a></li>
                                    <li onclick="jQuery(this).toggleClass('active')"><a href="#">RoomService</a></li>                                             

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div class="col-md-12">
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
                if ($len > 0) {
                    ?>
                    <ul class="booking-list hotel">
                        <?php
                        $similar = array();
                        $markepdata = $this->agent_model->get_busMrakup('Domestic Hotel');
                        $markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
                        $getValue = $this->agent_model->get_data_table('agent_commision_markup', array('forcommision' => 'Domestic Hotel', 'uid' => 4545));
                        $commission = $getValue[0]['adult_Commission'];
                        //echo $commission;
                        foreach ($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'] as $key => $hotel) {
                            $similar[] = $hotel;
                            $FacilityId = array();
                            if ($hotel['FacilityId'] != 0) {
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
                                <div class="booking-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="booking-item-img-wrap">
                                                <img src="<?php echo (($hotel['HotelImages']) !== false) ? str_replace("\\", "/", $hotel['HotelImages']) : 'http://placehold.it/270x160'; ?>" alt="<?php echo $hotel['HotelName'] ?> Image" title="<?php echo $hotel['HotelName'] ?> Image" />
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
                                                        echo @$hotel['FacilityId']['Facilities']['FacilityName'] . ',';
                                                    }
                                                    ?>
                                                <?php } ?>
                                            </div>
                                            <div>
                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <?php if ($i <= $hotel['StarCategoryId']) { ?>
                                                        <div class="one2-stars-g-container"></div>
                                                    <?php } else { ?>
                                                        <div class="one2-stars-container"></div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">                                            
                                            <span class="booking-item-price-from">Agent Markup:<?= $markup ?></span>
                                            <span class="booking-item-price" style="font-size:28px;"><small>AVG/NIGHT</small><?= "INR " . (round(($hotel['LowRate'] + $hotel['Highrate']) / 2, 2) + $markup); ?></span>
                                            <span class="btn btn-primary clickme">
                                                <?php $this->session->set_userdata('Hotel_' . $hotel['HotelId'], $hotel); ?>
                                                <?php if ($this->session->userdata('uid') != '') { ?>
                                                    <a class="button btn-small full-width text-center" title="" href="<?php echo base_url('index.php/agent/hotel_detailed/' . $hotel['Providerid'] . '/' . $hotel['HotelId']); ?>">Book Now</a>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                        $this->session->set_userdata('similar', $similar);
                        ?>
                    </ul>
                <?php } else {
                    ?>
                    <h3 align="center">Sorry! Hotel is not available on this city.</h3>
                    <div class="gap"></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('blocks/footer'); ?>

<script>
    //Finding the fare Rule and Tax  Details
    var currentlselection = "";
    var currentStar = 0;
    $(window).load(function () {
        $("#checkout").removeAttr('disabled');
    });
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
        minprice = $('.booking-list>a .details').data('price');
        maxprice = ($('.booking-list>a .details').last().data('price') + 1000);
        jQuery("#price-range").slider({
            range: true,
            min: $('.booking-list>a .details').data('price'),
            max: ($('.booking-list>a .details').last().data('price') + 1000),
            values: [$('.booking-list>a .details').data('price'), $('.booking-list>a .details').last().data('price') + 1000],
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