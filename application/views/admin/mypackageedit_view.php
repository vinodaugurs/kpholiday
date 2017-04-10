<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Update Package</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!--[if IE]>
        <php? print_r($data);die;?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/validationEngine.jquery.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/MoneAdmin.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/Font-Awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-fileupload.min.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <style>
            body {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 13px;
            }
            div#container {
                height: 300px;
                position: relative;
                width: 100%;
            }
            .image-gallery .col-sm-4 {
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
                height: 40px
            }
            .image-gallery img, .image-gallery a {
                float: left;
            }
            .removeImage {
                cursor: pointer;
                float: left;
                width: 20px;
                height: 20px;
                line-height: 20px;
                text-align: center;
                border-radius: 100%;
                background: red;
                color: #FFF;
                margin: 10px 0 0 20px;
            }
        </style>
    </head>
    <body class="padTop53 " >
        <div id="wrap" >
            <?php
            require_once 'nav.php';
            $info = $info[0];
            ?>
            <div id="content">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <div class="panel panel-primary">
                                <div class="panel-heading">Update Package</div>
                                <div class="panel-body grey-panel">
                                    <div class="table-responsive">
                                        <fieldset>
                                            <?= form_open_multipart('dashboard/update_package', array('class' => 'form-horizontal', 'id' => 'popup-validation')) ?>
                                            <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                                            <div class="control-group">
                                                <label for="pack_name" class="control-label">Package Name *</label>
                                                <div class="controls">
                                                    <input id="pack_name" name="pack_name" type="text" class="form-control" value="<?= $info['pack_name'] ?>">
                                                </div>

                                            </div>
                                            <div class="control-group">
                                                <label for="pack_name" class="control-label">Package Type *</label>
                                                <div class="controls">
                                                    <?= form_dropdown('package_type', array('' => 'Select Package', 'Honeymoon And Romantic Places' => 'Honeymoon And Romantic Places', 'Hill Stations' => 'Hill Stations', 'Beaches' => 'Beaches', 'Adventure' => 'Adventure', 'Historical' => 'Historical', 'Pligrimage' => 'Pligrimage'), $info['package_type'], ' class="form-control validate[required] form-control" id="pack_type" required') ?>
                                                    <?= form_error('package_type'); ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="details" class="control-label">Package Description *</label>
                                                <div class="controls">
                                                    <?= form_textarea(array('name' => 'details', 'id' => 'details', 'rows' => '5', 'class' => 'form-control'), $info['details'], '') ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="col-lg-4" style="padding-left: 0">
                                                    <label for="no_of_people" class="control-label">Number of Person(s)</label>
                                                    <div class="controls">
                                                        <?= form_input(array('type' => 'number', 'name' => 'no_of_people', 'id' => 'no_of_people', 'min' => '1', 'class' => 'form-control'), $info['no_of_people'], '') ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <label for="nights" class="control-label">Nights *</label>
                                                    <div class='controls'>
                                                        <?= form_dropdown('nights', array('' => 'Select Nights', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9'), $info['nights'], ' id="nights" class="form-control validate[required] form-control"') ?>
                                                        <?= form_error('package_type'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4" style="padding-right: 0">
                                                    <label for="days" class="control-label">Days *</label>
                                                    <div class='controls'>
                                                        <?= form_input(array('readonly' => '', 'name' => 'days', 'id' => 'days', 'class' => 'form-control'), $info['days'], '') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group days-desc" style="display: none">
                                                <label for="details" class="control-label">Days Details</label>
                                                <div class='controls' id="output3"></div>
                                            </div>

                                            <div class="control-group">
                                                <label for="hotel" class="control-label">Hotel Info</label>
                                                <div class="controls">
                                                    <?= form_textarea(array('name' => 'hotel', 'id' => 'hotel', 'rows' => '3'), $info['hotel'], "class='form-control validate[required] form-control' placeholder='Enter text'") ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="hotel_website" class="control-label">Hotel Website</label>
                                                <div class="controls">
                                                    <?= form_input('hotel_website', $info['hotel_website'], "class='form-control validate[required]' placeholder='Enter website' id='hotel_website'") ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="transport" class="control-label">Transport *</label>
                                                <div class="controls">
                                                    <?= form_textarea(array('name' => 'transport', 'id' => 'transport', 'rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter text'), $info['transport']) ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="highlights" class="control-label">Tour Highlights *</label>
                                                <div class="controls">
                                                    <?= form_textarea(array('name' => 'highlights', 'id' => 'highlights', 'rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter text'), $info['tour_highlight']) ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="pack_name" class="control-label">Facilities</label>
                                                <div class="controls facilities-container custom-radio-checkbox">
                                                    <?php
                                                    $facilitiesCount = 0;
                                                    $activeFac = explode(',', $info['facilities']);
                                                    ?>
                                                    <?php foreach ($facilities as $key => $value) { ?>
                                                        <?php
                                                        $checked = false;
                                                        if ($facilitiesCount == 0) {
                                                            echo "<div class='row'>";
                                                        } elseif ($facilitiesCount % 6 == 0) {
                                                            echo "</div><div class='row'>";
                                                        }
                                                        if (in_array($key, $activeFac))
                                                            $checked = true;
                                                        ?>
                                                        <div class="col-sm-2">
                                                            <input type="checkbox" value="<?= $key ?>" id="fac<?= $facilitiesCount ?>" name="facilities[]" <?= $checked ? 'checked' : '' ?>>
                                                            <label for="fac<?= $facilitiesCount ?>"><i class="<?= $value ?>"></i><?= $key ?></label>
                                                        </div>

                                                        <?php $facilitiesCount++; ?>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="pack_name" class="control-label">Gallery</label>
                                                <div class="controls image-gallery">
                                                    <?php
                                                    $images = explode(',', $info['gallery']);
                                                    $imgCount = 1;
                                                    for ($i = 0; $i <= 5; $i++) {
                                                        if (isset($images[$i])) {
                                                            ?>
                                                            <div class="col-sm-4">
                                                                <input name="old_image[]" value="<?= $images[$i] ?>" type="hidden" class="form-control">
                                                                <div>
                                                                    <a href="<?= base_url('upload/package/' . $images[$i]) ?>" target="_blank">
                                                                        <img src="<?= base_url('upload/package/' . $images[$i]) ?>" height="40" alt="" />
                                                                    </a>
                                                                    <span class="removeImage">X</span>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col-sm-4">
                                                                <label for=""></label>
                                                                <input name="image_<?= $imgCount ?>" type="file" class="form-control">
                                                            </div>
                                                            <?php
                                                            $imgCount++;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="col-lg-4" style="padding-left: 0">
                                                    <label for="details" class="control-label">Price *</label>
                                                    <div class="controls">
                                                        <?= form_input(array('type' => 'number', 'name' => 'price', 'id' => 'price', 'min' => '1', 'class' => 'form-control'), $info['price']) ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4" style="padding-left: 0">
                                                    <label for="details" class="control-label">Final Price</label>
                                                    <div class="controls">
                                                        <?= form_input(array('type' => 'number', 'name' => 'final_price', 'id' => 'final_price', 'min' => '1', 'class' => 'form-control', 'readonly' => ''), $info['final_price']) ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4" style="padding-left: 0">
                                                    <label for="details" class="control-label">Currency Type *</label>
                                                    <div class="controls">
                                                        <?= form_dropdown('currency', array('' => 'Select Currency', 'INR' => 'INR', 'USD' => 'USD'), $info['currency'], ' id="currency" class="form-control validate[required] form-control"') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="status" class="control-label">Show on Website</label>
                                                <div class="controls custom-radio-checkbox">
                                                    <!-- <div class="col-sm-2"> -->
                                                    <input id="status1" name="status" value="1" type="radio" class="form-control" <?= $info['status'] == 1 ? 'checked' : '' ?>>
                                                    <label for="status1" style="margin-right: 20px">Yes</label>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-sm-2"> -->
                                                    <input id="status2" name="status" value="0" type="radio" class="form-control" <?= $info['status'] == 0 ? 'checked' : '' ?>>
                                                    <label for="status2">No</label>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <br><br>
                                            <input type="submit" class="btn btn-success" value="Submit">
                                            <?php form_close(); ?>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/validationInit.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
        <script  type="text/javascript" src="<?= base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
        <script  type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap-fileupload.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/nicEdit.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                if ($.trim($('#nights').val())) {
                    value1 = parseInt($('#nights').val()) + 1;
                    if (value1) {
                        $('#days').val(value1);
                        $('.days-desc').show();
                        r = '';
                        activities = "<?= $info['activities'] ?>";
                        arr = activities.split("<111>");
                        for ($i = 1; $i <= value1; $i++) {
                            r += "<textarea name='day_detail[]' cols='80' rows='1' class='form-control' placeholder='day " + $i + "'>" + arr[$i - 1] + "</textarea><br>";
                        }
                        $('#output3').html(r);
                    }
                }
                $('#nights').change(function () {
                    value = parseInt($('#nights').val()) + 1;
                    $('#days').val(value);
                    s = '';

                    if ($('#output3').find('textarea').length) {
                        a = $('#output3').find('textarea').length;
                        if (a > value) {
                            $('#output3 textarea').hide();
                            for ($i = 1; $i <= value; $i++) {
                                $('#output3').find('textarea:nth-of-type(' + $i + ')').show();
                            }
                        } else if (a < value) {
                            for ($i = a; $i < value; $i++) {
                                s += "<textarea name='day_detail[]' cols='80' rows='1' class='form-control' placeholder='day " + ($i + 1) + "'></textarea><br>";
                            }
                            $('#output3').append(s);
                        }
                    } else {
                        if (value) {
                            $('.days-desc').show();
                            s = '';
                            for ($i = 1; $i <= value; $i++) {
                                s += "<textarea name='day_detail[]' cols='80' rows='1' class='form-control' placeholder='day " + $i + "'></textarea><br>";
                            }
                            $('#output3').html(s);
                        }
                    }
                });

                $('#price').on('change', function () {
                    price = parseInt($(this).val());
                    vatPercentage = 14;
                    vat = vatPercentage * (price / 100);
                    final_price = price + vat;
                    $('#final_price').val(final_price)
                })

                $('.image-gallery .removeImage').on('click', function () {
                    $(this).closest('.col-sm-4').remove();
                    $imgCount = $('.image-gallery').find('input[type=file]').length + 1;
                    $('.image-gallery').append('<div class="col-sm-4"><label for=""></label><input name="image_' + $imgCount + '" type="file" class="form-control"></div>');
                })
            });

            function valid(f) {
                !(/^[A-z&209;&241;0-9]*$/i).test(f.value) ? f.value = f.value.replace(/[^A-z&209;&241;0-9]/ig, '') : null;
            }

            function showState(sel) {
                var country_id = sel.options[sel.selectedIndex].value;
                //alert(country_id);
                $("#output1").html("");
                $("#output2").html("");
                if (country_id.length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/dashboard/fetchstate",
                        data: "country_id=" + country_id,
                        cache: false,
                        beforeSend: function () {
                            $('#output1').html('<img src="<?php echo base_url(); ?>assets/img/loader.gif" alt="" width="24" height="24">');
                        },
                        success: function (html) {
                            $("#output1").html(html);
                        }
                    });
                }
            }

            function showCity(sel) {
                var state_id = sel.options[sel.selectedIndex].value;
                if (state_id.length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/dashboard/fetchcity",
                        data: "state_id=" + state_id,
                        cache: false,
                        beforeSend: function () {
                            $('#output2').html('<img src="<?php echo base_url(); ?>assets/img/loader.gif" alt="" width="24" height="24">');
                        },
                        success: function (html) {
                            $("#output2").html(html);
                        }
                    });
                } else {
                    $("#output2").html("");
                }
            }

            function find() {
                var x = document.getElementById("price").value;
                var y = x * 10 / 100;
                var sum = +y + +x;
                document.getElementById("act_price").value = sum;
            }

            $(function () {
                formValidation();
            });
            bkLib.onDomLoaded(function () {
                nicEditors.allTextAreas()
            });
        </script>
    </body>
</html>
