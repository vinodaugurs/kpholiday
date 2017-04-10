<div id="wrap">
    <?php require_once 'nav.php'; ?>

    <div id="content">
        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add Package</div>
                        <div class="panel-body grey-panel">
                            <div class="table-responsive">
                                <fieldset>
                                    <?= form_open_multipart('dashboard/addpackage', array('class' => 'form-horizontal', 'id' => 'popup-validation')) ?>
                                    <div class="control-group">
                                        <label for="pack_name" class="control-label">Package Name *</label>
                                        <div class="controls">
                                            <input id="pack_name" name="pack_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="pack_name" class="control-label">Package Type *</label>
                                        <div class="controls">
                                            <?= form_dropdown('package_type', array('' => 'Select Package', 'Honeymoon And Romantic Places' => 'Honeymoon And Romantic Places', 'Hill Stations' => 'Hill Stations', 'Beaches' => 'Beaches', 'Adventure' => 'Adventure', 'Historical' => 'Historical', 'Pligrimage' => 'Pligrimage'), $this->input->post('package_type'), ' class="form-control validate[required] form-control" id="pack_type" required') ?>
                                            <?= form_error('package_type'); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="details" class="control-label">Package Description *</label>
                                        <div class="controls">
                                            <?= form_textarea(array('name' => 'details', 'id' => 'details', 'rows' => '5', 'class' => 'form-control'), '', '') ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-lg-4" style="padding-left: 0">
                                            <label for="no_of_people" class="control-label">Number of Person(s)</label>
                                            <div class="controls">
                                                <?= form_input(array('type' => 'number', 'name' => 'no_of_people', 'id' => 'no_of_people', 'min' => '1', 'class' => 'form-control'), '', '') ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="nights" class="control-label">Nights *</label>
                                            <div class='controls'>
                                                <?= form_dropdown('nights', array('' => 'Select Nights', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9'), $this->input->post('nights'), ' id="nights" class="form-control validate[required] form-control"') ?>
                                                <?= form_error('package_type'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4" style="padding-right: 0">
                                            <label for="days" class="control-label">Days *</label>
                                            <div class='controls'>
                                                <?= form_input(array('readonly' => '', 'name' => 'days', 'id' => 'days', 'class' => 'form-control'), '', '') ?>
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
                                            <?= form_textarea(array('name' => 'hotel', 'id' => 'hotel', 'rows' => '3'), '', "class='form-control validate[required] form-control' placeholder='Enter text'") ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="hotel_website" class="control-label">Hotel Website</label>
                                        <div class="controls">
                                            <?= form_input('hotel_website', '', "class='form-control validate[required]' placeholder='Enter website' id='hotel_website'") ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="transport" class="control-label">Transport *</label>
                                        <div class="controls">
                                            <?= form_textarea(array('name' => 'transport', 'id' => 'transport', 'rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter text')) ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="highlights" class="control-label">Tour Highlights *</label>
                                        <div class="controls">
                                            <?= form_textarea(array('name' => 'highlights', 'id' => 'highlights', 'rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter text')) ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="pack_name" class="control-label">Facilities</label>
                                        <div class="controls facilities-container custom-radio-checkbox">
                                            <?php $facilitiesCount = 0; ?>
                                            <?php foreach ($facilities as $key => $value) { ?>
                                                <?php
                                                if ($facilitiesCount == 0) {
                                                    echo "<div class='row'>";
                                                } elseif ($facilitiesCount % 6 == 0) {
                                                    echo "</div><div class='row'>";
                                                }
                                                ?>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" id="fac<?= $facilitiesCount ?>"
                                                           value="<?= $key ?>" name="facilities[]">
                                                    <label for="fac<?= $facilitiesCount ?>"><i
                                                            class="<?= $value ?>"></i><?= $key ?></label>
                                                </div>

                                                <?php $facilitiesCount++; ?>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="highlights" class="control-label">Exclusions</label>
                                        <div class="controls">
                                            <?= form_textarea(array('name' => 'exclusions', 'id' => 'highlights', 'rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter text')) ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="pack_name" class="control-label">Gallery</label>
                                        <div class="controls image-gallery">
                                            <div class="col-sm-4">
                                                <input name="image_1" type="file" class="form-control">

                                            </div>
                                            <div class="col-sm-4">
                                                <input name="image_2" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="image_3" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="image_4" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="image_5" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="image_6" type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-lg-4" style="padding-left: 0">
                                            <label for="details" class="control-label">Price *</label>
                                            <div class="controls">
                                                <?= form_input(array('type' => 'number', 'name' => 'price', 'id' => 'price', 'min' => '1', 'class' => 'form-control')) ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4" style="padding-left: 0">
                                            <label for="details" class="control-label">Final Price</label>
                                            <div class="controls">
                                                <?= form_input(array('type' => 'number', 'name' => 'final_price', 'id' => 'final_price', 'min' => '1', 'class' => 'form-control', 'readonly' => '')) ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4" style="padding-left: 0">
                                            <label for="details" class="control-label">Currency Type *</label>
                                            <div class="controls">
                                                <?= form_dropdown('currency', array('' => 'Select Currency', 'INR' => 'INR', 'USD' => 'USD'), 'INR', ' id="currency" class="form-control validate[required] form-control"') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="status" class="control-label">Show on Website</label>
                                        <div class="controls custom-radio-checkbox">
                                            <!-- <div class="col-sm-2"> -->
                                            <input id="status1" name="status" value="1" type="radio"
                                                   class="form-control" checked="">
                                            <label for="status1" style="margin-right: 20px">Yes</label>
                                            <!-- </div> -->
                                            <!-- <div class="col-sm-2"> -->
                                            <input id="status2" name="status" value="0" type="radio"
                                                   class="form-control">
                                            <label for="status2">No</label>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <br><br>
                                    <input type="submit" class="btn btn-success" value="Submit">
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
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
                    $('#output1').html('<img src="<?php echo base_url();?>assets/img/loader.gif" alt="" width="24" height="24">');
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
                    $('#output2').html('<img src="<?php echo base_url();?>assets/img/loader.gif" alt="" width="24" height="24">');
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
