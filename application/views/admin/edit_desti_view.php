<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-fileupload.min.css" />
<div id="wrap">  <!-- MAIN WRAPPER -->
    <?php require_once 'nav.php'; ?>
    <div id="content" style="padding-top:10px;">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Add Destination
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table">

                                    <tbody>

                                    <fieldset><legend></legend>
                                        <?php
                                        $ddata = $this->pack_model->getdestibyid($id);

                                        foreach ($ddata as $set_value) {
                                            
                                        }
                                        $attributes = array('class' => 'form-horizontal', 'id' => '');
                                        echo form_open_multipart(base_url() . 'index.php/dashboard/edit_destination?id=' . $id, $attributes);
                                        ?>
                                        <div class="control-group">
                                            <label for="desti_name" class="control-label">Name <span class="required">*</span></label>
                                            <div class='controls'>
                                                <input id="desti_name" type="text" class="form-control" name="desti_name" maxlength="255" value="<?php echo $set_value['name']; ?>"  />
                                                <?php echo form_error('desti_name'); ?>
                                            </div>
                                        </div>
                                        <p></p>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="row"></div>                                                        
                                                </div>                                                
                                            </div>                                                        
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label ">Main Image<span class="required">*</span></label>

                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <?php $mainImg = $set_value['main_image'] ? base_url('upload/destination/' . $set_value['main_image']) : ''; ?>
                                                    <img src="<?= $mainImg ?>" alt="" /></div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                        <input type="hidden" name="old_main_image" value="<?= $set_value['main_image'] ?>">
                                                        <input type="file" name="main_image" /></span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                </div>
                                            </div>
                                            <?php echo form_error('main_image'); ?>
                                        </div>
                                        <div class="control-group">
                                            <label for="description" class="control-label">Description <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => $set_value['description'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('description'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="getting_there" class="control-label">Getting_there <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'getting_there', 'rows' => '5', 'cols' => '80', 'value' => $set_value['getting_there'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('getting_there'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="train" class="control-label">Train <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'train', 'rows' => '5', 'cols' => '80', 'value' => $set_value['train'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('train'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="road" class="control-label">Road <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'road', 'rows' => '5', 'cols' => '80', 'value' => $set_value['road'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('road'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="air" class="control-label">Air <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'air', 'rows' => '5', 'cols' => '80', 'value' => $set_value['air'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('air'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="visit_time" class="control-label">Visit_time <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'visit_time', 'rows' => '5', 'cols' => '80', 'value' => $set_value['visit_time'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('visit_time'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="visit_and_do" class="control-label">Visit and Do <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'visit_and_do', 'rows' => '5', 'cols' => '80', 'value' => $set_value['visit_do'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('visit_and_do'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="accommodation" class="control-label">Accommodation <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'accommodation', 'rows' => '5', 'cols' => '80', 'value' => $set_value['acco'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('accommodation'); ?>
                                            </div>
                                        </div>


                                        <p></p>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label ">Accommodation Image<span class="required">*</span></label>

                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>upload/destination/<?php
                                                                if ($set_value['acco_image_1']) {
                                                                    echo $set_value['acco_image_1'];
                                                                } else {
                                                                    echo "demoUpload.jpg";
                                                                }
                                                                ?>" alt="" /></div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                            <div>
                                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                                    <input type="hidden" name="old_acco_image_1" value="<?= $set_value['acco_image_1'] ?>">
                                                                    <input type="file" name="acco_image_1" /></span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            </div>
                                                        </div>
                                                        <?php echo form_error('acco_image_1'); ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="food" class="control-label">Food <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'food', 'rows' => '5', 'cols' => '80', 'value' => $set_value['food'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('food'); ?>
                                            </div>
                                        </div>
                                        <p></p>


                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label class="control-label ">Food Image<span class="required">*</span></label>

                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>upload/destination/<?php
                                                                if ($set_value['food_image_1']) {
                                                                    echo $set_value['food_image_1'];
                                                                } else {
                                                                    echo "demoUpload.jpg";
                                                                }
                                                                ?>" alt="" /></div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                            <div>
                                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                                    <input type="hidden" name="old_food_image_1" value="<?= $set_value['food_image_1'] ?>">
                                                                    <input type="file" name="food_image_1" /></span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="imp_facts" class="control-label">Imp Facts <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'imp_facts', 'rows' => '5', 'cols' => '80', 'value' => $set_value['imp_facts'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>
                                                <?php echo form_error('imp_facts'); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="places_near_by" class="control-label">Places near By <span class="required">*</span></label>
                                            <div class='controls'>
                                                <?php echo form_textarea(array('name' => 'places_near_by', 'rows' => '5', 'cols' => '80', 'value' => $set_value['places_nearby'], 'class' => 'form-control', 'style' => 'color: black; background-color: lightyellow ')) ?>

                                                <?php echo form_error('places_near_by'); ?>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="col-md-12">
                                            <div class="row">

                                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label ">Other Image <?= $i ?></label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <?php $otherImg = $set_value['other_image_' . $i] ? base_url('upload/destination/' . $set_value['other_image_' . $i]) : ''; ?>
                                                                    <img src="<?= $otherImg ?>" alt="" /></div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                <div>
                                                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                                        <input type="hidden" name="old_other_image_<?= $i ?>" value="<?= $set_value['other_image_' . $i] ?>">
                                                                        <input type="file" name="other_image_<?= $i ?>" /></span>
                                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <?php
                                        $this->load->model('region_model');
                                        $city = $set_value['city'] ? $this->region_model->getcitybyid($set_value['city'])[0]['city'] : '';
                                        $state = $set_value['state'] ? $this->region_model->getstatebyid($set_value['state'])[0]['state'] : '';
                                        $ctry = $set_value['country'] ? $this->region_model->getcntbyid($set_value['country'])[0]['country'] : '';
                                        ?>



                                        <div class="form-group">
                                            <div class="control-group" id="showc">
                                                <label for="country" class="control-label">country <span class="required">*</span></label>
                                                <div class="controls">
                                                    <?php
                                                    $this->load->model('region_model');
                                                    $data = $this->region_model->getcountry();
                                                    $i = 1;
                                                    $options[0] = 'Please Select';
                                                    foreach ($data as $country) {
                                                        $options[$i] = $country['country'];
                                                        $i++;
                                                    }
                                                    ?>
                                                    <?php echo form_dropdown('country', $options, $set_value['country'], 'onChange="showState(this);" class="form-control"') ?>
                                                    <?php echo form_error('country'); ?>
                                                </div>
                                            </div>
                                            <div id="shows" >
                                                <label for='state' class='control-label'>state <span class='required'>*</span></label>
                                                <?php
                                                if ($set_value['country']) {
                                                    $states = $this->region_model->getstate($set_value['country']);
                                                    $i = 1;
                                                    $stateoptions[0] = 'Please Select';
                                                    foreach ($states as $state) {
                                                        $stateoptions[$state['id']] = $state['state'];
                                                        $i++;
                                                    }
                                                    echo form_dropdown('state', $stateoptions, $set_value['state'], 'onChange="showCity(this);" class="form-control" id="output1"');
                                                } else {
                                                    ?>
                                                    <select name='state' value="<?= $set_value['state'] ?>" onchange='showCity(this);' class='form-control' id="output1" >
                                                        <option value=''>Please Select</option>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                            <!-- This will hold city dropdown -->
                                            <div id="showci" >
                                                <label for='city' class='control-label'>city <span class='required'>*</span></label>
                                                <?php
                                                if ($set_value['state']) {
                                                    $cities = $this->region_model->getcity($set_value['state']);
                                                    $i = 1;
                                                    $cityOptions[0] = 'Please Select';
                                                    foreach ($cities as $city) {
                                                        $cityOptions[$city['id']] = $city['city'];
                                                        $i++;
                                                    }
                                                    echo form_dropdown('city', $cityOptions, $set_value['city'], 'class="form-control" id="output2"');
                                                } else {
                                                    ?>
                                                    <select name='city' value="<?= $set_value['city'] ?>" class='form-control' id="output2" >
                                                        <option value=''>Please Select</option>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label></label>
                                            <div class='controls'>
                                                <?php echo form_submit('submit', 'Submit', 'class="btn btn-success"'); ?>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?></fieldset>







                                    </tbody>
                                </table>
                            </div>







                        </div>
                    </div>


                </div>
            </div>

            <hr />




        </div>




    </div>
    <!--END PAGE CONTENT -->


</div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-fileupload.js"></script>
<script>
                                                        function showState(sel) {
                                                            var country_id = sel.options[sel.selectedIndex].value;
                                                            //alert(country_id);
                                                            $("#output1").html("");
                                                            $("#output2").html("");
                                                            selectedState = $('input[name=state]').val();
                                                            if (country_id.length > 0) {

                                                                $("#output1").html('');
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "<?php echo base_url(); ?>index.php/dashboard/fetchstate",
                                                                    data: {country_id: country_id, selectedState: selectedState},
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
                                                                $("#output2").html("");
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
                                                            }
                                                        }
</script>