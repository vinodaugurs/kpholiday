<?php include(APPPATH . 'views/home/header.php'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style2.css">


<style>
    .box-home{ background-color:#fff; padding:20px; margin-bottom:50px;}
    .box-home p{ font-size:14px; line-height:25px;  

    }

    .promo-box{ margin-bottom:0;}

    .own_package
    {
        background:rgba(0,0,0,0.3);
        padding:10px;
        margin-top:25px;
    }
    .own_package_white
    {
        background:rgba(255,255,255,1);
        padding:10px;
    }
    .own_package h1{
        color:#fff;
        font-size:22px;
    }
    .small-text
    {
        color:#fff;
        font-size:14px;
    }
    .small-text-black
    {
        color:#000;
        font-size:14px;
    }
    .section#content
    {
        padding-top:0px;
    }
    .grey_bor{
        border:3px solid #333;
    }
    .room
    {
        margin-top:10px;
        color:#000;
        font-size:16px;
    }
    .own_pack_shadow
    {
        -webkit-box-shadow: 2px 2px 14px 0px rgba(255, 255, 255, 1);
        -moz-box-shadow:    2px 2px 14px 0px rgba(255, 255, 255, 1);
        box-shadow:         2px 2px 14px 0px rgba(255, 255, 255, 1);
    }
    label.error,span.error
    {
        clear:both;
        font-weight:600;
        color:red;
    }
    .datepicker-wrap label  
    {
        position: absolute; 
    }
</style>

<!--Header Section Close here-->
<div id="page-wrapper">


    <?php
    $destinations = $this->user_model->destinations();
    $packages = $this->pack_model->packeges();
    ?>

    <section id="content">
        <div class="honeymoon section global-map-area promo-box parallax" data-stellar-background-ratio="0.5">

            <div class="container">

                <div class="col-sm-3 content-section description pull-right">

                    <div class="row places image-box style9">
                        <img src="<?php echo base_url('image/img/places01.jpg'); ?>" alt="" />
                        <br>
                        <br>
                        <br>
                        <img src="<?php echo base_url('image/img/places02.jpg'); ?>" alt="" />
                    </div>

                </div>

                <div class="col-sm-9" style="margin-bottom: 20px;"> 
                    <form name="own_packages" id="own_packages" >
                        <div class="own_pack_shadow">
                            <div class="col-md-11 own_package">
                                <h1>Build Your Own Package</h1>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="small-text" >Starting City</p>
                                        <div class="selector start_city" style="margin-bottom: 10px">
                                            <select name="start_city" id="start_city" required="required" class="full-width">
                                                <option value="" >Select the departure city</option>
                                                <?php
                                                if ($city->num_rows() > 0) {
                                                    foreach ($city->result() as $rows) {
                                                        ?>
                                                        <option value="<?php echo $rows->city; ?>" ><?php echo $rows->city; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small-text"> Starting Date</p>
                                        <div class="datepicker-wrap">
                                            <input type="text" name="start_date" id="start_date" required="required" class="form-control" placeholder="mm/dd/yyyy" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 own_package_white">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" required="required" class="form-control" placeholder="Select City You Wish To Travel" name="source" id="source" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="room">Mention Number of Rooms & Travelers</p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-xs-3" style="">
                                        <label>Rooms</label>
                                        <div class="selector">
                                            <select class="full-width form-control" required name="rooms" id="rooms">
                                                <option value="" >Rooms</option>
                                                <option value="1" selected >1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3" style="">
                                        <label>Adults(12+)</label>
                                        <div class="selector">
                                            <select class="full-width form-control" required name="adult" id="adult">
                                                <option value="">Adults</option>
                                                <option value="1">1</option>
                                                <option value="2" selected >2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3">
                                        <label>Kids(2-11)</label>
                                        <div class="selector">
                                            <select class="full-width form-control"  name="child" id="child" >
                                                <option value="" >Child</option>
                                                <option value="0" selected >0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3">
                                        <label>Infants(0-2)</label>
                                        <div class="selector">
                                            <select class="full-width form-control"  name="infants" id="infants">
                                                <option value="" >Infants</option>
                                                <option value="0" selected >0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" clearfix"></div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="small-text-black"> Email</p>
                                        <input type="text" name="emails" id="emails" required="required" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small-text-black"> Contact Number</p>
                                        <input type="text" name="contact" id="contact" required="required" maxlength="10" class="form-control" />
                                    </div>
                                </div>
                                <div class=" clearfix"></div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:10px;">
                                        <a class="btn btn-danger btn-md" id="package_btn" ><span id ="loader"><i class="fa fa-check"></i> Make your own package</span></a>           
                                    </div>
                                </div>
                            </div>		
                        </div>		
                    </form>
                </div>

            </div>

            <script>
                $(document).ready(function () {
                    var date = new Date();
                    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                    $('#start_date').datepicker({
                        format: "mm/dd/yyyy"
                    });
                })
            </script>
            <script>



                        (function ($) {

                            // Simple wrapper around jQuery animate to simplify animating progress from your app

                            // Inputs: Progress as a percent, Callback

                            // TODO: Add options and jQuery UI support.



                            $.fn.animateProgress = function (progress, callback) {
                                return this.each(function () {
                                    $(this).animate({
                                        width: progress + '%'
                                    }, {
                                        duration: 2000,
                                        // swing or linear
                                        easing: 'swing',
                                        // this gets called every step of the animation, and updates the label
                                        step: function (progress) {
                                            var labelEl = $('.ui-label', this),
                                                    valueEl = $('.value', labelEl);
                                            if (Math.ceil(progress) < 20 && $('.ui-label', this).is(":visible")) {
                                                labelEl.hide();
                                            } else {
                                                if (labelEl.is(":hidden")) {
                                                    labelEl.fadeIn();
                                                }
                                                ;
                                            }
                                            if (Math.ceil(progress) == 100) {
                                                labelEl.text('Done');
                                                setTimeout(function () {
                                                    labelEl.fadeOut();
                                                }, 1000);
                                            } else {
                                                valueEl.text(Math.ceil(progress) + '%');
                                            }
                                        },
                                        complete: function (scope, i, elem) {
                                            if (callback) {
                                                callback.call(this, i, elem);
                                            }
                                            ;
                                        }
                                    });
                                });
                            };
                        })(jQuery);



                $(function () {

                    // Hide the label at start
                    $(".clickme").click(function () {
                        $('#progress_bar').show();
                        $('#progress_bar .ui-progress .ui-label').hide();
                        // Set initial value
                        $('#progress_bar .ui-progress').css('width', '7%');
                        // Simulate some progress

                        $('#progress_bar .ui-progress').animateProgress(43, function () {
                            $(this).animateProgress(79, function () {
                                setTimeout(function () {
                                    $('#progress_bar .ui-progress').animateProgress(100, function () {
                                        $('#main_content').slideDown();
                                        $('#fork_me').fadeIn();
                                    });
                                }, 2000);
                            });
                        });
                    });
                });


                //autocomplete for flight city code
                $("#source").autocomplete({
                    source: function (request, response) {
                        console.log($('#Domestic2').is(':checked'));
                        $.ajax({
                            url: "http://kpholidays.com/index.php/flight/get_airport_code",
                            data: {term: request.term, domestic: $('#Domestic2').is(':checked')},

                            dataType: "json",
                            crossDomain: true,
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

                function packagess()
                {
                    var datas = {
                        "start_city": $("#start_city").val(),
                        "start_date": $("#start_date").val(),
                        "source": $("#source").val(),
                        "rooms": $("#rooms").val(),
                        "adult": $("#adult").val(),
                        "child": $("#child").val(),
                        "infants": $("#infants").val(),
                        "email": $("#emails").val(),
                        "number": $("#contact").val()
                    }
                    $("#loader").html("<i class='fa fa-2x fa-spinner fa-spin' aria-hidden='true' ></i>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/User_package/create_package'); ?>",
                        data: datas,
                        success: function (msg)
                        {
                            if (msg == 1)
                            {
                                alert("You package has been submitted.We will contact you soon.");
                                window.location.href = "<?php echo base_url('index.php/home'); ?>";
                            } else
                            {
                                alert("Please try again!");
                                $("#loader").html("<i class='fa fa-check'></i> Make your own package");
                            }
                        }
                    });
                }
            </script>

            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script> 
            <script type="text/javascript" src="<?php echo base_url('assets/js/additional-methods.min.js'); ?>"></script> 
            <script type="text/javascript" src="<?php echo base_url('assets/js/jquery_validation_front.js'); ?>"></script> 
            <?php include(APPPATH . 'views/home/footer.php'); ?>
