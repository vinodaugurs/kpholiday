<?php
$dst = $data1['desti'];

// print_r($data1);


$cty = $this->site_model->getcityname($dst);
// echo $this->db->last_query();die;
// print_r($cty);    
// echo $this->db->last_query(); die;
@$dst1 = $cty[0]['id'];
$bdgt = $data1['budget'];
$chkin = $data1['checkin'];
$chkout = $data1['checkout'];
$al = $data1['all'];
$a = $data1['adult'];
$ch = $data1['child'];

$data = $this->site_model->getpacklist($dst1, $bdgt, $chkin, $chkout);
// echo $this->db->last_query();die;
// print_r($data);
?>
<?php include'header.php'; ?> 


<div id="page-wrapper">

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Hotel Search Results</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                <li class="active">Hotel Search Results</li>
            </ul>
        </div>
    </div>
    <section id="content">
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <h4 class="search-results-title"><i class="soap-icon-search"></i><b id="resultfound"><?php echo count($data); ?></b> results found.</h4>
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
                                    </div><!-- end content -->
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
                                       <!-- <small>2458 REVIEWS</small>-->
                                    </div>
                                </div>
                            </div> 

                            <!--<div class="panel style1 arrow-right">
                                 <h4 class="panel-title">
                                     <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                                 </h4>
                                 <div id="accomodation-type-filter" class="panel-collapse collapse">
                                     <div class="panel-content">
                                         <ul class="check-square filters-option">
                                             <li><a href="#">All<small>(722)</small></a></li>
                                             <li><a href="#">Hotel<small>(982)</small></a></li>
                                             <li><a href="#">Resort<small>(127)</small></a></li>
                                             <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                             <li><a href="#">Condo<small>(158)</small></a></li>
                                             <li><a href="#">Residence<small>(439)</small></a></li>
                                             <li><a href="#">Guest House<small>(52)</small></a></li>
                                         </ul>
                                         <a class="button btn-mini">MORE</a>
                                     </div>
                                 </div>
                             </div>--> 

                            <!-- <div class="panel style1 arrow-right">
                               <h4 class="panel-title">
                                   <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                               </h4>
                               <div id="amenities-filter" class="panel-collapse collapse">
                                   <div class="panel-content">
                                       <ul class="check-square amenities filters-option">
                                           <li><a href="#">Free Wi-Fi</a></li>
                                           <li><a href="#">Restaurant</a></li>
                                           <li><a href="#">Swimming pool</a></li>
                                           <li><a href="#">Internet</a></li>
                                           <li><a href="#">BusinessCenter</a></li>
                                           <li><a href="#">Laundry</a></li>
                                           <li><a href="#">RoomService</a></li>                                             
                                          
                                       </ul>
                                       
                                   </div>
                               </div>
                           </div>  -->

                            <!-- <div class="panel style1 arrow-right">
                               <h4 class="panel-title">
                                   <a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>
                               </h4>
                               <div id="language-filter" class="panel-collapse collapse">
                                   <div class="panel-content">
                                       <ul class="check-square filters-option">
                                           <li><a href="#">English<small>(722)</small></a></li>
                                           <li><a href="#">Español<small>(982)</small></a></li>
                                           <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                           <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                           <li><a href="#">Suomi<small>(158)</small></a></li>
                                           <li><a href="#">Italiano<small>(439)</small></a></li>
                                           <li><a href="#">Sign Language<small>(52)</small></a></li>
                                       </ul>
                                       <a class="button btn-mini">MORE</a>
                                   </div>
                               </div>
                           </div>  -->


                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">

                        <div class="ModifySearchBox">





                            <div class="tab-pane1 fade1" id="hotels-tab1">

                                <form action="<?php echo base_url('index.php/package/all_package'); ?>" method="post">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>DESTINATION</label>

                                            <input type="text" id="destination_place" name="destination" class="form-control" placeholder="Mumbai" value="<?php echo isset($dst) ? $dst : ''; ?>" required>

                                            <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                                            </ul>

                                        </div>

                                        <script type="text/javascript">
                                            $(document).ready(function () {

                                                $("#destination_place").autocomplete({
                                                    source: function (request, response) {
                                                        console.log($('#Domestic2').is(':checked'));
                                                        var data = $('#destination_place').val();
                                                        $.ajax({
                                                            url: "<?php echo base_url('index.php/Dashboard/get_place'); ?>",
                                                            data: {mail: data},
                                                            type: 'post',
                                                            dataType: "json",
                                                            crossDomain: true,
                                                            success: function (data) {
                                                                response($.map(data.myData, function (item) {
                                                                    return {
                                                                        label: item.city,
                                                                        value: item.CODE
                                                                    }
                                                                }));
                                                            }
                                                        })
                                                    }
                                                });

                                            });
                                        </script> 



                                        <div class="col-md-3">
                                            <label>BUDGET</label>

                                            <input type="number" name="budget" class="form-control" placeholder="BUDGET" value="<?php echo isset($data1['budget']) ? $data1['budget'] : ''; ?>" required>

                                            <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                                            </ul>

                                        </div>


                                        <div class="col-md-3">
                                            <label>FROM</label>

                                            <div class="datepicker-wrap-package">
                                                <input type="text" name="checkin" id="txtFromDate" class="form-control datepicker" placeholder="Select Date" readonly="readonly" value="<?php echo isset($data1['checkin']) ? $data1['checkin'] : ''; ?>"  required>


                                            </div>

                                        </div>


                                        <div class="col-md-3">
                                            <label>To</label>


                                            <div class="datepicker-wrap-package">
                                                <input type="text"  name="checkout" id="txtToDate" data-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Select Date" readonly="readonly" value="<?php echo isset($data1['checkout']) ? $data1['checkout'] : ''; ?>" required>


                                            </div>

                                        </div>


                                    </div>              

                                    <div class="row">

                                        <div class="col-xs-2">

                                            <label>Rooms</label>

                                            <div class="selector">

                                                <select class="full-width" required="required" name="rooms">

                                                    <option value="1">01</option>

                                                    <option value="2">02</option>

                                                    <option value="3">03</option>

                                                    <option value="4">04</option>


                                                </select><span class="custom-select full-width">01</span>

                                            </div>

                                        </div>

                                        <div class="col-xs-2">

                                            <label>Adults(12+)</label>

                                            <div class="selector">

                                                <select class="full-width" required="required" name="adults">

                                                    <option value="1">01</option>

                                                    <option value="2">02</option>

                                                    <option value="3">03</option>

                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>

                                                </select><span class="custom-select full-width">01</span>

                                            </div>

                                        </div>

                                        <div class="col-xs-2">

                                            <label>Kids(0-11)</label>

                                            <div class="selector">

                                                <select class="full-width" name="kids">
                                                    <option value="0">00</option>
                                                    <option value="1">01</option>

                                                    <option value="2">02</option>

                                                    <option value="3">03</option>

                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>

                                                </select><span class="custom-select full-width">00</span>

                                            </div>

                                        </div>

                                        <div class="col-xs-2">

                                            <label>&nbsp;</label>

                                            <button class="icon-check full-width">SEARCH NOW</button>

                                        </div>

                                    </div>


                                </form>

                            </div>



                        </div><!--ModifySearchBox-->







                        <div class="sort-by-section clearfix">
                            <h4 class="sort-by-title block-sm">Sort results by:</h4>
                            <ul class="sort-bar clearfix block-sm">
                                <li class="sort-by-name"><a onClick="sorByContent('name', $(this));" class="sort-by-container" href="javascript:;"><span>name</span></a></li>
                                <li class="sort-by-price active"><a onClick="sorByContent('price', $(this));" class="sort-by-container" href="javascript:;"><span>price</span></a></li>
                                <li class="clearer visible-sms"></li>
                                <li class="sort-by-rating "><a  onClick="sorByContent('rating', $(this));" class="sort-by-container" href="javascript:;"><span>rating</span></a></li>

                            </ul>


                        </div>
                        <div class="hotel-list listing-style3 hotel">
<?php echo $this->session->flashdata('msg'); ?>
<?php
$this->session->set_userdata('search_data', $data);

if ($cty != FALSE && $data != FALSE) {
    foreach ($data as $value) {
        ?>



                                    <article class="box">
                                        <figure class="col-sm-4">
                                            <a title="" href="ajax/cruise-slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="<?php echo base_url('upload/package/') . "/" . $value['image_1']; ?>"></a>
                                        </figure>
                                        <div class="details col-sm-8" data-price="<?php echo $value['price']; ?>" data-rating="<?php echo $value['pack_rating']; ?>">
                                            <div class="clearfix">
                                                <h4 class="box-title pull-left"><?php echo $value['pack_name']; ?><small><?php echo $value['nights']; ?> nights</small></h4>
                                                <span class="price pull-right"><small>from</small><i class="fa fa-inr" aria-hidden="true"></i><?php echo $value['price']; ?></span>
                                            </div>
                                            <div class="character clearfix">
                                                <div class="col-xs-3 cruise-logo">
                                                    <!--<img src="http://placehold.it/110x25" alt="" />-->
                                                </div>
                                                <div class="col-xs-4 date">
                                                    <i class="soap-icon-clock yellow-color"></i>
                                                    <div>
                                                        <span class="skin-color">Date</span><br><?php echo $value['start_date']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 departure">
                                                    <i class="soap-icon-departure yellow-color"></i>
                                                    <div>
                                                        <span class="skin-color">Departure</span><br>Los Angeles, miami, Florida
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="review pull-left">
                                                    <div class="five-stars-container">
                                                        <span class="five-stars" style="width: <?php echo $value['pack_rating'] * 20; ?>%;"></span>
                                                    </div>
                                                    <!--<span>270 reviews</span>-->
                                                </div>


                                                <!--<a href="cruise-detailed.html" class="button btn-small pull-right">select cruise</a>-->

        <?php if ($this->session->userdata('uid') != '') { ?>
                                                    <a class="button btn-small pull-right" title="" href="<?php echo base_url('index.php/package/package_view/' . $value['pack_id']); ?>">SELECT</a>

                                                <?php } else { ?>

                                                    <a class="button btn-small pull-right" title="" href="javascript:;" onClick="onpenSignup('<?php echo $value['pack_id']; ?>');">SELECT</a>

                                                <?php } ?>


                                            </div>
                                        </div>
                                    </article>
    <?php }
} else {
    ?>

                                <h3 align="center">Sorry Package is not available on this city !</h3>



<?php } ?> 







                        </div>
                        <!--                             <a href="#" class="uppercase full-width button btn-large">load more listing</a> -->
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
<script>
    //Finding the fare Rule and Tax  Details                   
    var currentlselection = "";
    var currentStar = 0;
    $(document).ready(function () {

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
        // autocomplete

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


    });
    function updateTicketselection() {

        window.location.href = '<?php echo base_url('index.php/package/package_view'); ?>/' + currentlselection;

    }
    function onpenSignup(Providerid) {
        currentlselection = Providerid;
        $('#signupModal').modal('show');
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

    $('.amenities li').on('click', function () {
        globalSearch();
    });
    function globalSearch() {
        var resultfound = 0;
        $('.hotel-list article').each(function (index, element) {
            //console.log(serachByAmenities($(this)));    
            if (searchbyPrice($(this))) {
                if (searchbyStars($(this))) {
                    // if(serachByAmenities($(this))){
                    $(this).fadeIn();
                    // 	resultfound=resultfound+1;
                    // }else{
                    // 	$(this).fadeOut();
                    // }

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
                return $(a).find('.info .box-title').html().toUpperCase().localeCompare($(b).find('.info .box-title').html().toUpperCase());
            }
        });

        $.each(listitems, function (index, item) {
            mylist.append(item);
        });

    }

</script>
<?php include'footer.php'; ?> 

